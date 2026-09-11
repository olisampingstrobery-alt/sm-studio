@extends('layouts.admin')
@section('title','Tulis Artikel')
@section('header','Tulis Artikel')
@section('content')
<div class="w-full max-w-none bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="px-4 sm:px-6 lg:px-8 py-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-2"><div><h3 class="font-semibold text-[#0B1D33] text-base sm:text-lg">Artikel Baru</h3><p class="text-xs sm:text-sm text-slate-500 mt-1">Buat insight — tampil di <span class="font-medium text-[#0F2A4A]">/insights</span> & <span class="font-medium text-[#0F2A4A]">Home #insights</span> jika <b>Publish</b> dicentang. Cover berdampingan grid 3 kolom.</p></div><a href="{{ route('admin.articles.index') }}" class="inline-flex items-center gap-1.5 text-xs font-medium text-[#0F2A4A] hover:underline"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m7 7H3"/></svg> Kembali</a></div>
    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="p-4 sm:p-6 lg:p-8 space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Judul *</label>
            <input type="text" name="title" required value="{{ old('title') }}" placeholder="Judul artikel..." class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20 @error('title') border-red-300 @enderror">
            @error('title')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        {{-- Berdampingan: Kategori + Cover - responsif full --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Kategori</label>
                <select name="category_id" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] @error('category_id') border-red-300 @enderror">
                    <option value="">Pilih</option>
                    @foreach($categories as $c)<option value="{{ $c->id }}" @selected(old('category_id')==$c->id)>{{ $c->name }}</option>@endforeach
                </select>
            </div>
            <div class="bg-slate-50 rounded-xl border border-slate-200 p-3">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Cover Image</label>
                <input type="file" name="featured_image" accept="image/*" class="w-full rounded-xl border-slate-200 bg-white file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:bg-black file:text-white file:text-sm @error('featured_image') border-red-300 @enderror">
                @error('featured_image')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                <p class="text-[11px] text-slate-500 mt-1">Rasio 16:9, max 4MB. Tampil cover di /insights berdampingan.</p>
            </div>
        </div>
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Excerpt (ringkasan)</label>
            <textarea name="excerpt" rows="2" placeholder="Ringkasan 1-2 kalimat, max 500" class="w-full rounded-xl border-slate-200 @error('excerpt') border-red-300 @enderror">{{ old('excerpt') }}</textarea>
            @error('excerpt')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Konten *</label>
            <textarea name="content" rows="8" required placeholder="Tulis konten lengkap..." class="w-full rounded-xl border-slate-200 @error('content') border-red-300 @enderror">{{ old('content') }}</textarea>
            @error('content')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        {{-- Berdampingan SEO --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">SEO Title</label><input type="text" name="seo_title" value="{{ old('seo_title') }}" placeholder="Judul SEO" class="w-full rounded-xl border-slate-200"></div>
            <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Meta Description</label><input type="text" name="meta_description" value="{{ old('meta_description') }}" placeholder="Deskripsi SEO" class="w-full rounded-xl border-slate-200"></div>
        </div>
        <div class="flex items-center gap-3 bg-slate-50 rounded-xl px-4 py-3 border border-slate-100">
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="hidden" name="is_published" value="0">
                <input type="checkbox" name="is_published" value="1" @checked(old('is_published', true)) class="sr-only peer">
                <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-checked:bg-black after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full"></div>
            </label>
            <div>
                <span class="text-sm font-medium">Publish langsung — tampil di publik</span>
                <p class="text-xs text-slate-500">Jika tidak dicentang, jadi Draft (tidak muncul di /insights).</p>
            </div>
        </div>

        @if($errors->any())
            <div class="rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700"><ul class="list-disc list-inside">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
        @endif

        <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4 border-t border-slate-100">
            <a href="{{ route('admin.articles.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-sm font-medium hover:bg-slate-50 text-center order-2 sm:order-1">Batal</a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-black hover:bg-black text-white font-semibold text-sm shadow order-1 sm:order-2">Simpan Artikel</button>
        </div>
    </form>
</div>
@endsection
