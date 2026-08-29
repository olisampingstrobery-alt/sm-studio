@extends('layouts.admin')
@section('title','Edit Artikel')
@section('header','Edit Artikel')
@section('content')
<div class="max-w-3xl bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="px-6 py-5 border-b border-slate-100"><h3 class="font-semibold text-[#0B1D33]">Edit: {{ $article->title }}</h3><p class="text-xs text-slate-500">Perubahan langsung di /insights jika Published.</p></div>
    <form action="{{ route('admin.articles.update',$article) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
        @csrf @method('PUT')
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Judul *</label>
            <input type="text" name="title" value="{{ old('title',$article->title) }}" required class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] @error('title') border-red-300 @enderror">
            @error('title')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="grid md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Kategori</label>
                <select name="category_id" class="w-full rounded-xl border-slate-200"><option value="">Pilih</option>@foreach($categories as $c)<option value="{{ $c->id }}" @selected(old('category_id',$article->category_id)==$c->id)>{{ $c->name }}</option>@endforeach</select>
            </div>
            <div class="bg-slate-50 rounded-xl border border-slate-200 p-3">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Cover</label>
                <input type="file" name="featured_image" accept="image/*" class="w-full rounded-xl border-slate-200 bg-white file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:bg-[#0F2A4A] file:text-white file:text-sm @error('featured_image') border-red-300 @enderror">
                @error('featured_image')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                @if($article->featured_image)
                    <div class="mt-3 flex items-center gap-3"><img src="{{ asset('storage/'.$article->featured_image) }}" class="w-32 h-20 rounded-xl object-cover border"><span class="text-xs text-slate-500">Saat ini</span></div>
                @endif
            </div>
        </div>
        <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Excerpt</label><textarea name="excerpt" rows="2" class="w-full rounded-xl border-slate-200">{{ old('excerpt',$article->excerpt) }}</textarea></div>
        <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Konten *</label><textarea name="content" rows="8" required class="w-full rounded-xl border-slate-200 @error('content') border-red-300 @enderror">{{ old('content',$article->content) }}</textarea>@error('content')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror</div>
        <div class="grid md:grid-cols-2 gap-5">
            <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">SEO Title</label><input type="text" name="seo_title" value="{{ old('seo_title',$article->seo_title) }}" class="w-full rounded-xl border-slate-200"></div>
            <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Meta Description</label><input type="text" name="meta_description" value="{{ old('meta_description',$article->meta_description) }}" class="w-full rounded-xl border-slate-200"></div>
        </div>
        <div class="flex items-center gap-3 bg-slate-50 rounded-xl px-4 py-3 border border-slate-100">
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="hidden" name="is_published" value="0">
                <input type="checkbox" name="is_published" value="1" @checked(old('is_published',$article->is_published)) class="sr-only peer">
                <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-checked:bg-[#0F2A4A] after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full"></div>
            </label>
            <span class="text-sm font-medium">Published — tampil di publik</span>
        </div>

        @if($errors->any())
            <div class="rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700"><ul class="list-disc list-inside">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
        @endif

        <div class="flex justify-end gap-3 pt-4 border-t border-slate-100"><a href="{{ route('admin.articles.index') }}" class="px-5 py-2.5 rounded-xl border text-sm font-medium">Batal</a><button type="submit" class="px-6 py-2.5 rounded-xl bg-[#0F2A4A] text-white font-semibold text-sm">Update</button></div>
    </form>
</div>
@endsection
