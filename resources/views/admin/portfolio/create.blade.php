@extends('layouts.admin')
@section('title','Tambah Portfolio')
@section('header','Tambah Portfolio')
@section('content')
<div class="bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden max-w-4xl">
    <div class="px-6 py-5 border-b border-slate-100">
        <h3 class="font-semibold text-[#0B1D33]">Portfolio Baru</h3>
        <p class="text-sm text-slate-500">Isi detail karya — akan tampil di <span class="font-medium text-[#0F2A4A]">/portfolio</span> jika status <b>Published</b>. Upload gambar berdampingan di gallery.</p>
    </div>
    <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
        @csrf
        {{-- Judul & Client berdampingan --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Judul *</label>
                <input type="text" name="title" required value="{{ old('title') }}" placeholder="Contoh: Rebranding Tokopedia" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20 @error('title') border-red-300 @enderror">
                @error('title')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Client (dari daftar klien)</label>
                <select name="client_id" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] @error('client_id') border-red-300 @enderror">
                    <option value="">Pilih client</option>
                    @foreach($clients as $c)<option value="{{ $c->id }}" @selected(old('client_id')==$c->id)>{{ $c->name }} — {{ $c->industry ?? '' }}</option>@endforeach
                </select>
                @error('client_id')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Client Name (manual jika tidak di list)</label>
                <input type="text" name="client_name" value="{{ old('client_name') }}" placeholder="Jika client tidak ada di list" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Kategori</label>
                <select name="category_id" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] @error('category_id') border-red-300 @enderror">
                    <option value="">Pilih kategori</option>
                    @foreach($categories as $cat)<option value="{{ $cat->id }}" @selected(old('category_id')==$cat->id)>{{ $cat->name }}</option>@endforeach
                </select>
            </div>
        </div>

        {{-- Status & Featured + Technology berdampingan --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Status *</label>
                <select name="status" required class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]">
                    <option value="draft" @selected(old('status')=='draft')>Draft — tidak tampil publik</option>
                    <option value="published" @selected(old('status','published')=='published')>Published — tampil di /portfolio</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Technology</label>
                <input type="text" name="technology" value="{{ old('technology') }}" placeholder="Laravel, React, Figma (pisah koma)" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]">
                <p class="text-[11px] text-slate-400 mt-1">Pisah koma, nanti jadi badge berdampingan.</p>
            </div>
            <div class="flex items-end pb-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="hidden" name="is_featured" value="0">
                    <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured')) class="rounded border-slate-300 text-[#0F2A4A] focus:ring-[#0F2A4A]/20">
                    <span class="text-sm font-medium">Featured</span>
                </label>
            </div>
        </div>

        {{-- Gambar berdampingan: Featured + Gallery --}}
        <div class="grid md:grid-cols-2 gap-5">
            <div class="bg-slate-50 rounded-xl border border-slate-200 p-4">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Featured Image *</label>
                <input type="file" name="featured_image" accept="image/*" class="w-full rounded-xl border-slate-200 bg-white file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:bg-[#0F2A4A] file:text-white file:text-sm @error('featured_image') border-red-300 @enderror">
                @error('featured_image')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                <p class="text-xs text-slate-500 mt-2">Cover utama di /portfolio (rasio 16:9 ideal). Max 4MB.</p>
            </div>
            <div class="bg-slate-50 rounded-xl border border-slate-200 p-4">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Gallery (bisa banyak, berdampingan)</label>
                <input type="file" name="gallery_images[]" multiple accept="image/*" class="w-full rounded-xl border-slate-200 bg-white file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:bg-slate-700 file:text-white file:text-sm @error('gallery_images.*') border-red-300 @enderror">
                @error('gallery_images.*')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                <p class="text-xs text-slate-500 mt-2">Pilih 3-6 gambar. Akan tampil berdampingan grid 2 kolom di detail.</p>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Deskripsi</label>
            <textarea name="description" rows="3" placeholder="Ringkasan project..." class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]">{{ old('description') }}</textarea>
        </div>

        {{-- Berdampingan 2 kolom untuk detail --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Challenge</label><textarea name="challenge" rows="3" class="w-full rounded-xl border-slate-200">{{ old('challenge') }}</textarea></div>
            <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Solution</label><textarea name="solution" rows="3" class="w-full rounded-xl border-slate-200">{{ old('solution') }}</textarea></div>
            <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Process</label><textarea name="process" rows="3" class="w-full rounded-xl border-slate-200">{{ old('process') }}</textarea></div>
            <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Result</label><textarea name="result" rows="3" class="w-full rounded-xl border-slate-200">{{ old('result') }}</textarea></div>
        </div>

        @if($errors->any())
            <div class="rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700"><ul class="list-disc list-inside">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
        @endif

        <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
            <a href="{{ route('admin.portfolio.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-sm font-medium hover:bg-slate-50">Batal</a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#0F2A4A] hover:bg-[#162F4A] text-white font-semibold text-sm">Simpan & Publish</button>
        </div>
    </form>
</div>
@endsection
