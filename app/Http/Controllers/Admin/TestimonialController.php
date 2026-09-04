<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('client')->latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        $clients = Client::where('is_active', true)->get();
        return view('admin.testimonials.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->merge(['client_id' => $request->filled('client_id') ? $request->client_id : null]);
        $request->validate([
            'name' => 'required|string|max:255',
            'client_id' => 'nullable|exists:clients,id',
            'position' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'content' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
        ]);

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->client_id = $request->client_id;
        $testimonial->position = $request->position;
        $testimonial->company = $request->company;
        $testimonial->content = $request->content;
        $testimonial->rating = $request->rating;
        $testimonial->is_active = $request->is_active ?? true;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('testimonials', 'public');
            $testimonial->photo = $path;
        }

        $testimonial->save();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function edit(Testimonial $testimonial)
    {
        $clients = Client::where('is_active', true)->get();
        return view('admin.testimonials.edit', compact('testimonial', 'clients'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->merge(['client_id' => $request->filled('client_id') ? $request->client_id : null]);
        $request->validate([
            'name' => 'required|string|max:255',
            'client_id' => 'nullable|exists:clients,id',
            'position' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'content' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
        ]);

        $testimonial->name = $request->name;
        $testimonial->client_id = $request->client_id;
        $testimonial->position = $request->position;
        $testimonial->company = $request->company;
        $testimonial->content = $request->content;
        $testimonial->rating = $request->rating;
        $testimonial->is_active = $request->is_active ?? true;

        if ($request->hasFile('photo')) {
            if ($testimonial->photo) {
                Storage::disk('public')->delete($testimonial->photo);
            }
            $path = $request->file('photo')->store('testimonials', 'public');
            $testimonial->photo = $path;
        }

        $testimonial->save();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->photo) {
            Storage::disk('public')->delete($testimonial->photo);
        }
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}
