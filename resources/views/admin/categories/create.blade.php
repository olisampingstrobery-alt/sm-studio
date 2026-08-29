@extends('layouts.admin')
@section('title','Tambah Kategori')
@section('header','Tambah Kategori')
@section('content')
<div class="max-w-xl bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="px-6 py-5 border-b"><h3 class="font-semibold">Kategori Baru</h3></div>
    <form action="{{ route('admin.categories.store') }}" method="POST" class="p-6 space-y-5">
        @csrf
        <div><label class="block text-sm font-semibold mb-1.5">Nama *</label><input type="text" name="name" required placeholder="Contoh: Branding" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]"></div>
        <div><label class="block text-sm font-semibold mb-1.5">Tipe *</label><select name="type" required class="w-full rounded-xl border-slate-200"><option value="service">Service</option><option value="portfolio">Portfolio</option><option value="article">Article</option><option value="general">General</option></select></div>
        <div class="flex justify-end gap-3 pt-4 border-t"><a href="{{ route('admin.categories.index') }}" class="px-5 py-2.5 rounded-xl border">Batal</a><button class="px-6 py-2.5 rounded-xl bg-[#0F2A4A] text-white font-semibold">Simpan</button></div>
    </form>
</div>
@endsection
