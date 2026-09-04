@extends('layouts.admin')
@section('title','Edit Portfolio')
@section('header','Edit Portfolio')
@section('content')
<div class="bg-white rounded-2xl shadow-card border border-slate-100 w-full max-w-none overflow-hidden">
    <div class="px-4 sm:px-6 lg:px-8 py-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-2"><div><h3 class="font-semibold text-[#0B1D33] text-base sm:text-lg">Edit: {{ $portfolio->title }}</h3><p class="text-xs sm:text-sm text-slate-500 mt-1">Perubahan langsung berdampingan tampil di /portfolio jika Published.</p></div><a href="{{ route('admin.portfolio.index') }}" class="inline-flex items-center gap-1.5 text-xs font-medium text-[#0F2A4A] hover:underline"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m7 7H3"/></svg> Kembali ke daftar</a></div>
    <form action="{{ route('admin.portfolio.update',$portfolio) }}" method="POST" enctype="multipart/form-data" class="p-4 sm:p-6 lg:p-8 space-y-6">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Judul *</label>
                <input type="text" name="title" value="{{ old('title',$portfolio->title) }}" required class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] @error('title') border-red-300 @enderror">
                @error('title')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Client</label>
                <select name="client_id" class="w-full rounded-xl border-slate-200"><option value="">Pilih</option>@foreach($clients as $c)<option value="{{ $c->id }}" @selected(old('client_id',$portfolio->client_id)==$c->id)>{{ $c->name }}</option>@endforeach</select>
            </div>
            <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Client Name</label><input type="text" name="client_name" value="{{ old('client_name',$portfolio->client_name) }}" class="w-full rounded-xl border-slate-200"></div>
            <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Kategori</label><select name="category_id" class="w-full rounded-xl border-slate-200"><option value="">Pilih</option>@foreach($categories as $cat)<option value="{{ $cat->id }}" @selected(old('category_id',$portfolio->category_id)==$cat->id)>{{ $cat->name }}</option>@endforeach</select></div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Status</label>
                <select name="status" class="w-full rounded-xl border-slate-200"><option value="draft" @selected(old('status',$portfolio->status)=='draft')>Draft</option><option value="published" @selected(old('status',$portfolio->status)=='published')>Published</option></select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Technology</label>
                @php $techVal = old('technology', is_array($portfolio->technology) ? implode(', ', $portfolio->technology) : $portfolio->technology); @endphp
                <input type="text" name="technology" value="{{ $techVal }}" placeholder="Laravel, React, Figma" class="w-full rounded-xl border-slate-200">
            </div>
            <div class="flex items-end pb-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="hidden" name="is_featured" value="0">
                    <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured',$portfolio->is_featured)) class="rounded border-slate-300 text-[#0F2A4A]">
                    <span class="text-sm font-medium">Featured</span>
                </label>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <div class="bg-slate-50 rounded-xl border border-slate-200 p-4 w-full overflow-hidden">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Featured Image</label>
                <input type="file" name="featured_image" accept="image/*" class="w-full rounded-xl border-slate-200 bg-white file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:bg-[#0F2A4A] file:text-white file:text-sm @error('featured_image') border-red-300 @enderror">
                @error('featured_image')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                @if($portfolio->featured_image)
                    <div class="mt-3 flex items-center gap-3"><img src="{{ asset('storage/'.$portfolio->featured_image) }}" class="w-24 h-24 rounded-xl object-cover border bg-white"><span class="text-xs text-slate-500">Saat ini — kosongkan jika tidak ganti</span></div>
                @endif
            </div>
            <div class="bg-slate-50 rounded-xl border border-slate-200 p-4 w-full overflow-hidden">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tambah Gallery (berdampingan)</label>
                <input type="file" name="gallery_images[]" multiple accept="image/*" class="w-full rounded-xl border-slate-200 bg-white file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:bg-slate-700 file:text-white file:text-sm">
                <p class="text-xs text-slate-500 mt-2">Pilih beberapa file sekaligus. Akan berdampingan grid.</p>
            </div>
        </div>

        <div class="w-full"><label class="block text-sm font-semibold text-slate-700 mb-1.5">Deskripsi</label><textarea name="description" rows="3" class="w-full rounded-xl border-slate-200">{{ old('description',$portfolio->description) }}</textarea></div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Challenge</label><textarea name="challenge" rows="3" class="w-full rounded-xl border-slate-200">{{ old('challenge',$portfolio->challenge) }}</textarea></div>
            <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Solution</label><textarea name="solution" rows="3" class="w-full rounded-xl border-slate-200">{{ old('solution',$portfolio->solution) }}</textarea></div>
            <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Process</label><textarea name="process" rows="3" class="w-full rounded-xl border-slate-200">{{ old('process',$portfolio->process) }}</textarea></div>
            <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Result</label><textarea name="result" rows="3" class="w-full rounded-xl border-slate-200">{{ old('result',$portfolio->result) }}</textarea></div>
        </div>
        @if($portfolio->images->count())
            <div class="w-full"><h4 class="font-semibold text-sm mb-2">Gallery Saat Ini — berdampingan</h4><div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">@foreach($portfolio->images as $img)<div class="relative group"><img src="{{ asset('storage/'.$img->image) }}" class="w-full h-28 sm:h-32 object-cover rounded-xl border"><div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 grid place-items-center rounded-xl transition"><button type="submit" form="delete-gallery-{{ $img->id }}" class="bg-white text-red-600 px-3 py-1 rounded-full text-xs font-semibold shadow" onclick="return confirm('Hapus gambar ini?')">Hapus</button></div></div>@endforeach</div><p class="text-xs text-slate-500 mt-2">Hapus yang tidak perlu — admin bisa kelola berdampingan mana yang dihapus.</p></div>
        @endif

        @if($errors->any())
            <div class="rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700"><ul class="list-disc list-inside">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
        @endif

        <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4 border-t border-slate-100"><a href="{{ route('admin.portfolio.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-sm font-medium text-center order-2 sm:order-1">Batal</a><button type="submit" class="px-6 py-2.5 rounded-xl bg-[#0F2A4A] hover:bg-[#162F4A] text-white font-semibold text-sm order-1 sm:order-2">Update & Tampilkan</button></div>
    </form>
    {{-- Form hapus gallery dibuat di luar form update agar tidak nested (nested form = outer form broken & update tidak ter-submit) --}}
    @if($portfolio->images->count())
        @foreach($portfolio->images as $img)
            <form id="delete-gallery-{{ $img->id }}" action="{{ route('admin.portfolio.gallery.delete',$img->id) }}" method="POST" class="hidden">@csrf @method('DELETE')</form>
        @endforeach
    @endif
</div>
@endsection
