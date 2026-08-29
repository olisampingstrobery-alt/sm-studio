<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'industry' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:2048',
            'logo' => 'nullable|file|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $client = new Client();
        $client->name = $request->name;
        // generate unique slug agar tidak bentrok & tidak bingung admin mana yang harus dihapus
        $baseSlug = Str::slug($request->name);
        $slug = $baseSlug;
        $i = 1;
        while (Client::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $i++;
        }
        $client->slug = $slug;
        $client->industry = $request->industry;
        $client->website = $request->website;
        $client->is_active = $request->boolean('is_active', true);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('clients', 'public');
            $client->logo = $path;
        }

        $client->save();

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client berhasil ditambahkan — sudah tampil di website umum /clients & beranda.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'industry' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:2048',
            'logo' => 'nullable|file|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $client->name = $request->name;
        // keep slug unique, exclude self
        $baseSlug = Str::slug($request->name);
        $slug = $baseSlug;
        $i = 1;
        while (Client::where('slug', $slug)->where('id','!=',$client->id)->exists()) {
            $slug = $baseSlug . '-' . $i++;
        }
        $client->slug = $slug;
        $client->industry = $request->industry;
        $client->website = $request->website;
        $client->is_active = $request->boolean('is_active', true);

        if ($request->hasFile('logo')) {
            if ($client->logo) {
                Storage::disk('public')->delete($client->logo);
            }
            $path = $request->file('logo')->store('clients', 'public');
            $client->logo = $path;
        }

        $client->save();

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client berhasil diupdate — perubahan langsung tampil di website.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        if ($client->logo) {
            Storage::disk('public')->delete($client->logo);
        }
        $client->delete();

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client deleted successfully.');
    }

    /**
     * Toggle status
     */
    public function toggleStatus(Client $client)
    {
        $client->update(['is_active' => !$client->is_active]);
        return redirect()->back()
            ->with('success', 'Client status updated successfully.');
    }
}