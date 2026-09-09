<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES — Website Umum (Tanpa Login)
| Semua halaman publik menggunakan prefix "/" dan view di resources/views/public/*
| Warna tema: Biru Tua #0F2A4A
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    // Semua halaman tampil di home — tanpa batas ketat, kecuali portfolio tetap preview 3 (ada halaman terpisah)
    // Klien terintegrasi di home (tidak pisah halaman) — withCount agar badge portfolio muncul
    $clients = \App\Models\Client::where('is_active', true)->withCount(['portfolios' => fn($q)=> $q->where('status','published')])->latest()->get();
    $portfolios = \App\Models\Portfolio::where('status','published')->with(['category','client'])->latest()->take(6)->get();
    $services = \App\Models\Service::where('is_active', true)->latest()->get();
    $faqs = \App\Models\Faq::where('is_active', true)->orderBy('order')->get();
    $articles = \App\Models\Article::where('is_published', true)->latest()->take(6)->get();
    $testimonials = \App\Models\Testimonial::where('is_active', true)->latest()->get();
    return view('public.home', compact('clients','portfolios','services','faqs','articles','testimonials'));
})->name('home');

Route::get('/about', function () {
    return view('public.about');
})->name('about');

Route::get('/services', function () {
    $services = \App\Models\Service::where('is_active', true)->latest()->take(6)->get();
    return view('public.services', compact('services'));
})->name('services');

Route::get('/services/{slug}', function ($slug) {
    $service = \App\Models\Service::where('slug', $slug)->firstOrFail();
    return view('public.service-detail', compact('service'));
})->name('services.show');

Route::get('/portfolio', function () {
    $portfolios = \App\Models\Portfolio::where('status','published')->with(['client'])->latest()->paginate(9);
    $clients = \App\Models\Client::where('is_active', true)->withCount(['portfolios' => fn($q)=> $q->where('status','published')])->orderByDesc('portfolios_count')->get();
    // keep $categories for backward compatibility if view still expects it, but primary is $clients
    $categories = \App\Models\Category::where('type','portfolio')->withCount(['portfolios' => fn($q)=> $q->where('status','published')])->orderByDesc('portfolios_count')->get();
    return view('public.portfolio', compact('portfolios','clients','categories'));
})->name('portfolio');

Route::get('/portfolio/{slug}', function ($slug) {
    $portfolio = \App\Models\Portfolio::where('slug', $slug)->with(['client','images'])->firstOrFail();
    return view('public.portfolio-detail', compact('portfolio'));
})->name('portfolio.show');

Route::get('/clients', function () {
    // Klien kini terintegrasi di Home (#clients) agar semua terhubung — redirect permanen ke home anchor
    // Halaman lama /clients tetap support (301) tapi tidak tampil terpisah lagi
    return redirect()->to(route('home').'#clients', 301);
})->name('clients');

Route::get('/testimonials', function () {
    $testimonials = \App\Models\Testimonial::where('is_active', true)->latest()->get();
    return view('public.testimonials', compact('testimonials'));
})->name('testimonials');

// DISEMBUNYIKAN SEMENTARA — Insights tidak tampil di website umum (hapus abort & uncomment untuk tampilkan lagi)
Route::get('/insights', function () {
    abort(404);
    // $articles = \App\Models\Article::where('is_published', true)->latest()->paginate(9);
    // return view('public.insights', compact('articles'));
})->name('insights');

Route::get('/insights/{slug}', function ($slug) {
    abort(404);
    // $article = \App\Models\Article::where('slug', $slug)->firstOrFail();
    // return view('public.insights-detail', compact('article'));
})->name('insights.show');

Route::get('/faq', function () {
    $faqs = \App\Models\Faq::where('is_active', true)->orderBy('order')->get()->groupBy('category');
    return view('public.faq', compact('faqs'));
})->name('faq');

Route::get('/contact', function () {
    return view('public.contact');
})->name('contact');

Route::post('/contact', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'name'=>'required|string|max:255',
        'email'=>'required|email',
        'whatsapp'=>'nullable|string',
        'service'=>'nullable|string',
        'budget'=>'nullable|string',
        'message'=>'required|string',
    ]);
    \App\Models\Inquiry::create($request->only(['name','email','whatsapp','service','budget','message']) + ['status'=>'pending']);
    return back()->with('success','Pesan Anda telah terkirim! Kami akan segera menghubungi Anda.');
})->name('contact.store');

// KATEGORI dialihkan ke KLIEN — kini Klien terintegrasi di Home (#clients), tidak pisah halaman
// Tetap support URL lama /kategori agar tidak 404, tapi redirect permanen ke home#clients
Route::get('/kategori', function () {
    return redirect()->to(route('home').'#clients', 301);
})->name('categories');

Route::get('/kategori/{slug}', function ($slug) {
    $client = \App\Models\Client::where('slug', $slug)->where('is_active', true)->first();
    if ($client) {
        return redirect()->to(route('home').'#client-'.$client->slug, 301);
    }
    return redirect()->to(route('home').'#clients', 301);
})->name('categories.show');

/*
|--------------------------------------------------------------------------
| ADMIN AUTH ROUTES — TERPISAH dari Public (Beda URL & Tampilan)
| Login admin HANYA di /admin/login (biru tua, modern)
| Public tidak memiliki link login; hanya admin yang tahu alamat ini.
| Route /login tetap ada untuk kompatibilitas Breeze, tapi redirect ke /admin/login
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest — belum login bisa akses login admin
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    });

    // Authenticated — harus login + role admin
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::resource('services', ServiceController::class);
        Route::post('services/{service}/toggle-status', [ServiceController::class, 'toggleStatus'])->name('services.toggle-status');

        Route::resource('portfolio', PortfolioController::class);
        Route::delete('portfolio/gallery/{id}', [PortfolioController::class, 'deleteGalleryImage'])->name('portfolio.gallery.delete');

        Route::resource('clients', ClientController::class);
        Route::post('clients/{client}/toggle-status', [ClientController::class, 'toggleStatus'])->name('clients.toggle-status');

        Route::resource('testimonials', TestimonialController::class);

        Route::resource('articles', ArticleController::class);

        Route::resource('faqs', FaqController::class);

        Route::resource('categories', CategoryController::class)->except(['show']);

        Route::get('inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
        Route::get('inquiries/{inquiry}', [InquiryController::class, 'show'])->name('inquiries.show');
        Route::patch('inquiries/{inquiry}', [InquiryController::class, 'update'])->name('inquiries.update');
        Route::delete('inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');

        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::match(['post','put'], 'settings', [SettingController::class, 'update'])->name('settings.update');
    });
});

// Auth routes Breeze (login umum di /login, register, dll)
// Catatan: Login admin TERPISAH di /admin/login dengan tampilan biru tua modern.
// Publik tidak menampilkan link login; hanya admin yang mengetahui /admin/login
// Ini memenuhi: "bedakan alamat login dan buat umum agar beda tidak di satu halaman atau beda routes"
require __DIR__.'/auth.php';

// Breeze compatibility: dashboard untuk Feature tests & navigation.blade.php
// Dashboard umum (auth saja) — admin tetap pakai /admin terpisah
Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Profile (untuk admin yang sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
