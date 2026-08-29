@extends('layouts.admin')
@section('title','Edit Kategori')
@section('header','Edit Kategori')
@section('content')
<div class="max-w-xl bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="px-6 py-5 border-b"><h3 class="font-semibold">Edit: {{ $category->name }}</h3></div>
    <form action="{{ route('admin.categories.update',$category) }}" method="POST" class="p-6 space-y-5">
        @csrf @method('PUT')
        <div><label class="block text-sm font-semibold mb-1.5">Nama *</label><input type="text" name="name" value="{{ old('name',$category->name) }}" required class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]"></div>
        <div><label class="block text-sm font-semibold mb-1.5">Tipe *</label><select name="type" required class="w-full rounded-xl border-slate-200"><option value="service" @selected($category->type=='service')>Service</option><option value="portfolio" @selected($category->type=='portfolio')>Portfolio</option><option value="article" @selected($category->type=='article')>Article</option><option value="general" @selected($category->type=='general')>General</option></select></div>
        <div class="flex justify-end gap-3 pt-4 border-t"><a href="{{ route('admin.categories.index') }}" class="px-5 py-2.5 rounded-xl border">Batal</a><button class="px-6 py-2.5 rounded-xl bg-[#0F2A4A] text-white font-semibold">Update</button></div>
    </form>
</div>
@endsection
