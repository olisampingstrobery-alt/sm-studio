@extends('layouts.admin')
@section('title','Edit Portfolio')
@section('header','Edit Portfolio')
@section('content')
<div class="bg-white rounded-2xl shadow-card border border-slate-100 max-w-4xl overflow-hidden">
    <div class="px-6 py-5 border-b border-slate-100"><h3 class="font-semibold text-[#0B1D33]">Edit: {{ $portfolio->title }}</h3><p class="text-xs text-slate-500">Perubahan langsung berdampingan tampil di /portfolio jika Published.</p></div>
    <form action="{{ route('admin.portfolio.update',$portfolio) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
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
        <div class="grid md:grid-cols-3 gap-5">
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

        <div class="grid md:grid-cols-2 gap-5">
            <div class="bg-slate-50 rounded-xl border border-slate-200 p-4">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Featured Image</label>
                <input type="file" name="featured_image" accept="image/*" class="w-full rounded-xl border-slate-200 bg-white file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:bg-[#0F2A4A] file:text-white file:text-sm @error('featured_image') border-red-300 @enderror">
                @error('featured_image')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                @if($portfolio->featured_image)
                    <div class="mt-3 flex items-center gap-3"><img src="{{ asset('storage/'.$portfolio->featured_image) }}" class="w-24 h-24 rounded-xl object-cover border bg-white"><span class="text-xs text-slate-500">Saat ini — kosongkan jika tidak ganti</span></div>
                @endif
            </div>
            <div class="bg-slate-50 rounded-xl border border-slate-200 p-4">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tambah Gallery (berdampingan)</label>
                <input type="file" name="gallery_images[]" multiple accept="image/*" class="w-full rounded-xl border-slate-200 bg-white file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:bg-slate-700 file:text-white file:text-sm">
                <p class="text-xs text-slate-500 mt-2">Pilih beberapa file sekaligus. Akan berdampingan grid.</p>
            </div>
        </div>

        <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Deskripsi</label><textarea name="description" rows="3" class="w-full rounded-xl border-slate-200">{{ old('description',$portfolio->description) }}</textarea></div>
        <div class="grid md:grid-cols-2 gap-5">
            <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Challenge</label><textarea name="challenge" rows="3" class="w-full rounded-xl border-slate-200">{{ old('challenge',$portfolio->challenge) }}</textarea></div>
            <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Solution</label><textarea name="solution" rows="3" class="w-full rounded-xl border-slate-200">{{ old('solution',$portfolio->solution) }}</textarea></div>
            <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Process</label><textarea name="process" rows="3" class="w-full rounded-xl border-slate-200">{{ old('process',$portfolio->process) }}</textarea></div>
            <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Result</label><textarea name="result" rows="3" class="w-full rounded-xl border-slate-200">{{ old('result',$portfolio->result) }}</textarea></div>
        </div>
        @if($portfolio->images->count())
            <div><h4 class="font-semibold text-sm mb-2">Gallery Saat Ini — berdampingan</h4><div class="grid grid-cols-2 md:grid-cols-4 gap-3">@foreach($portfolio->images as $img)<div class="relative group"><img src="{{ asset('storage/'.$img->image) }}" class="w-full h-28 object-cover rounded-xl border"><form action="{{ route('admin.portfolio.gallery.delete',$img->id) }}" method="POST" class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 grid place-items-center rounded-xl transition">@csrf @method('DELETE')<button class="bg-white text-red-600 px-3 py-1 rounded-full text-xs font-semibold shadow">Hapus</button></form></div>@endforeach</div><p class="text-xs text-slate-500 mt-2">Hapus yang tidak perlu — admin bisa kelola berdampingan mana yang dihapus.</p></div>
        @endif

        @if($errors->any())
            <div class="rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700"><ul class="list-disc list-inside">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
        @endif

        <div class="flex justify-end gap-3 pt-4 border-t border-slate-100"><a href="{{ route('admin.portfolio.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-sm font-medium">Batal</a><button type="submit" class="px-6 py-2.5 rounded-xl bg-[#0F2A4A] text-white font-semibold text-sm">Update & Tampilkan</button></div>
    </form>
</div>
@endsection
