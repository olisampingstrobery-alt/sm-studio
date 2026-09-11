@extends('layouts.admin')
@section('title','Tambah Kategori')
@section('header','Tambah Kategori')
@section('content')
<div class="w-full max-w-none">
    <div class="bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden w-full">
        <div class="px-4 sm:px-6 lg:px-8 py-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-gradient-to-r from-[#F8FAFC] to-white">
            <div class="flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-black text-white grid place-items-center shadow">◈</span>
                <div>
                    <h3 class="font-bold text-[#0B1D33]">Kategori Baru</h3>
                    <p class="text-xs text-slate-500 mt-1">Nama kategori jadi <span class="font-mono bg-slate-100 px-1.5 py-0.5 rounded">slug</span> otomatis, tipe menentukan di mana kategori tampil.</p>
                </div>
            </div>
            <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-[#0F2A4A] hover:underline"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m7 7H3"/></svg> Kembali</a>
        </div>
        <form action="{{ route('admin.categories.store') }}" method="POST" class="p-4 sm:p-6 lg:p-8 space-y-6">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-slate-700">Nama Kategori *</label>
                    <input type="text" name="name" required placeholder="Contoh: Website, Branding, Company Profile, Tutorial" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20 text-sm" value="{{ old('name') }}">
                    @error('name')<p class="text-xs text-red-600">{{ $message }}</p>@enderror
                    <p class="text-[11px] text-slate-400">Slug otomatis dari nama: <span class="font-mono bg-slate-100 px-1 py-0.5 rounded">website-development</span>. Bisa diubah nanti.</p>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-slate-700">Tipe *</label>
                    <select name="type" required class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20 text-sm">
                        <option value="portfolio" @selected(old('type')=='portfolio')>Portfolio — tampil di filter /portfolio & badge karya</option>
                        <option value="service" @selected(old('type')=='service')>Service — tampil di layanan & home</option>
                        <option value="article" @selected(old('type')=='article')>Article — tampil di Insights</option>
                        <option value="general" @selected(old('type')=='general')>General — serbaguna</option>
                    </select>
                    @error('type')<p class="text-xs text-red-600">{{ $message }}</p>@enderror
                    <p class="text-[11px] text-slate-400">Pilih yang paling sesuai biar hitungan di index akurat.</p>
                </div>
            </div>

            {{-- Preview chip --}}
            <div class="bg-slate-50 rounded-xl border border-slate-200 p-4">
                <div class="text-xs font-semibold tracking-widest text-slate-500">PREVIEW DI WEBSITE UMUM</div>
                <div class="mt-3 flex flex-wrap gap-2">
                    <span class="px-3 py-1.5 rounded-full bg-[#EFF6FF] text-[#0F2A4A] border border-[#BFDBFE] text-xs font-semibold">Chip Filter • Portfolio</span>
                    <span class="px-3 py-1.5 rounded-full bg-white border border-slate-200 text-xs font-semibold">Badge di Card</span>
                    <span class="px-3 py-1.5 rounded-full bg-black text-white text-xs font-semibold">Halaman Kategori</span>
                </div>
                <p class="text-xs text-slate-500 mt-3">Setelah disimpan, kategori langsung bisa dipilih saat tambah Portfolio/Service/Article dan langsung muncul sebagai chip filter di <span class="font-mono bg-white border px-1 py-0.5 rounded">/portfolio</span> & <span class="font-mono bg-white border px-1 py-0.5 rounded">/kategori/[slug]</span>.</p>
            </div>

            @if($errors->any())
                <div class="rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700"><ul class="list-disc list-inside">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
            @endif

            <div class="flex flex-col sm:flex-row justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="{{ route('admin.categories.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-sm font-medium hover:bg-slate-50 text-center order-2 sm:order-1">Batal</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-black hover:bg-black text-white font-semibold text-sm shadow order-1 sm:order-2">Simpan Kategori</button>
            </div>
        </form>
    </div>
</div>
@endsection
