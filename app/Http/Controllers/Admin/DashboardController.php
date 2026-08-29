<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Client;
use App\Models\Inquiry;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'services' => Service::count(),
            'portfolio' => Portfolio::count(),
            'clients' => Client::count(),
            'testimonials' => Testimonial::count(),
            'articles' => Article::count(),
            'inquiries' => Inquiry::count(),
            'pending_inquiries' => Inquiry::where('status','pending')->count(),
        ];
        $recentInquiries = Inquiry::latest()->take(5)->get();
        $recentPortfolio = Portfolio::latest()->take(4)->get();
        return view('admin.dashboard', compact('stats','recentInquiries','recentPortfolio'));
    }
}
