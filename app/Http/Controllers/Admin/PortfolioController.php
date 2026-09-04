<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::with(['client', 'category'])->latest()->paginate(10);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::where('is_active', true)->get();
        $categories = Category::where('type', 'portfolio')->get();
        return view('admin.portfolio.create', compact('clients', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Normalisasi empty string -> null agar tidak gagal foreign key (Incorrect integer value: '' )
        $request->merge([
            'client_id' => $request->filled('client_id') ? $request->client_id : null,
            'category_id' => $request->filled('category_id') ? $request->category_id : null,
        ]);

        $request->validate([
            'title' => 'required|string|max:255',
            'client_id' => 'nullable|exists:clients,id',
            'category_id' => 'nullable|exists:categories,id',
            'client_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'process' => 'nullable|string',
            'result' => 'nullable|string',
            'technology' => 'nullable',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:4096',
            'status' => 'required|in:draft,published',
            'is_featured' => 'nullable|boolean',
        ]);

        $portfolio = new Portfolio();
        $portfolio->title = $request->title;
        $baseSlug = Str::slug($request->title);
        $slug = $baseSlug; $i=1; while(Portfolio::where('slug',$slug)->exists()){ $slug=$baseSlug.'-'.$i++; }
        $portfolio->slug = $slug;
        $portfolio->client_id = $request->client_id;
        $portfolio->category_id = $request->category_id;
        $portfolio->client_name = $request->client_name;
        $portfolio->description = $request->description;
        $portfolio->challenge = $request->challenge;
        $portfolio->solution = $request->solution;
        $portfolio->process = $request->process;
        $portfolio->result = $request->result;
        // technology boleh string koma atau array
        $tech = $request->technology;
        if (is_string($tech)) $tech = array_map('trim', explode(',', $tech));
        if (is_array($tech)) $tech = array_filter(array_map('trim', $tech));
        $portfolio->technology = $tech ?: null;
        $portfolio->is_featured = $request->boolean('is_featured');
        $portfolio->status = $request->status;

        // Upload featured image
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('portfolio/featured', 'public');
            $portfolio->featured_image = $path;
        }

        $portfolio->save();

        // Handle gallery images - multiple
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                if(!$image->isValid()) continue;
                $path = $image->store('portfolio/gallery', 'public');
                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image' => $path,
                    'is_featured' => false,
                ]);
            }
        }

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio berhasil ditambahkan — tampil di /portfolio jika status Published + gambar berdampingan di gallery.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        $portfolio->load(['client', 'category', 'images']);
        return view('admin.portfolio.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        $clients = Client::where('is_active', true)->get();
        $categories = Category::where('type', 'portfolio')->get();
        $portfolio->load('images');
        return view('admin.portfolio.edit', compact('portfolio', 'clients', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        // Normalisasi empty string -> null agar update tidak error 1366 Incorrect integer value
        $request->merge([
            'client_id' => $request->filled('client_id') ? $request->client_id : null,
            'category_id' => $request->filled('category_id') ? $request->category_id : null,
        ]);

        $request->validate([
            'title' => 'required|string|max:255',
            'client_id' => 'nullable|exists:clients,id',
            'category_id' => 'nullable|exists:categories,id',
            'client_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'process' => 'nullable|string',
            'result' => 'nullable|string',
            'technology' => 'nullable',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:4096',
            'status' => 'required|in:draft,published',
            'is_featured' => 'nullable|boolean',
        ]);

        $portfolio->title = $request->title;
        $baseSlug = Str::slug($request->title);
        $slug = $baseSlug; $i=1; while(Portfolio::where('slug',$slug)->where('id','!=',$portfolio->id)->exists()){ $slug=$baseSlug.'-'.$i++; }
        $portfolio->slug = $slug;
        $portfolio->client_id = $request->client_id;
        $portfolio->category_id = $request->category_id;
        $portfolio->client_name = $request->client_name;
        $portfolio->description = $request->description;
        $portfolio->challenge = $request->challenge;
        $portfolio->solution = $request->solution;
        $portfolio->process = $request->process;
        $portfolio->result = $request->result;
        $tech = $request->technology;
        if (is_string($tech)) $tech = array_map('trim', explode(',', $tech));
        if (is_array($tech)) $tech = array_filter(array_map('trim', $tech));
        $portfolio->technology = $tech ?: null;
        $portfolio->is_featured = $request->boolean('is_featured');
        $portfolio->status = $request->status;

        // Update featured image
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($portfolio->featured_image) {
                Storage::disk('public')->delete($portfolio->featured_image);
            }
            $path = $request->file('featured_image')->store('portfolio/featured', 'public');
            $portfolio->featured_image = $path;
        }

        $portfolio->save();

        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                if(!$image->isValid()) continue;
                $path = $image->store('portfolio/gallery', 'public');
                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image' => $path,
                    'is_featured' => false,
                ]);
            }
        }

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio berhasil diupdate — perubahan langsung di /portfolio.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        // Delete featured image
        if ($portfolio->featured_image) {
            Storage::disk('public')->delete($portfolio->featured_image);
        }

        // Delete gallery images
        foreach ($portfolio->images as $image) {
            Storage::disk('public')->delete($image->image);
            $image->delete();
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio deleted successfully.');
    }

    /**
     * Delete gallery image
     */
    public function deleteGalleryImage($id)
    {
        $image = PortfolioImage::findOrFail($id);
        Storage::disk('public')->delete($image->image);
        $image->delete();

        return redirect()->back()
            ->with('success', 'Gallery image deleted successfully.');
    }
}