@extends('layouts.admin')
@section('title','Edit Kategori')
@section('header','Edit Kategori')
@section('content')
<div class="w-full max-w-none">
    <div class="bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden w-full">
        <div class="px-4 sm:px-6 lg:px-8 py-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-gradient-to-r from-[#F8FAFC] to-white">
            <div class="flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-amber-500 text-white grid place-items-center shadow">✎</span>
                <div>
                    <h3 class="font-bold text-[#0B1D33]">Edit: {{ $category->name }}</h3>
                    <p class="text-xs text-slate-500 mt-1">Slug: <span class="font-mono bg-slate-100 px-1.5 py-0.5 rounded">{{ $category->slug }}</span> • Tipe: <span class="px-2 py-0.5 rounded-full bg-[#EFF6FF] text-[#0F2A4A] border text-xs font-semibold">{{ ucfirst($category->type) }}</span></p>
                </div>
            </div>
            <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-[#0F2A4A] hover:underline"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m7 7H3"/></svg> Kembali</a>
        </div>
        <form action="{{ route('admin.categories.update',$category) }}" method="POST" class="p-4 sm:p-6 lg:p-8 space-y-6">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-slate-700">Nama Kategori *</label>
                    <input type="text" name="name" value="{{ old('name',$category->name) }}" required class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20 text-sm">
                    @error('name')<p class="text-xs text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-slate-700">Tipe *</label>
                    <select name="type" required class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20 text-sm">
                        <option value="service" @selected(old('type',$category->type)=='service')>Service</option>
                        <option value="portfolio" @selected(old('type',$category->type)=='portfolio')>Portfolio</option>
                        <option value="article" @selected(old('type',$category->type)=='article')>Article</option>
                        <option value="general" @selected(old('type',$category->type)=='general')>General</option>
                    </select>
                    @error('type')<p class="text-xs text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="bg-amber-50/70 rounded-xl border border-amber-200 p-4 flex gap-3">
                <span class="w-8 h-8 rounded-lg bg-amber-500 text-white grid place-items-center shrink-0">!</span>
                <div class="text-sm text-amber-800">
                    <div class="font-semibold">Perhatian saat ganti nama/tipe</div>
                    <p class="text-xs mt-1 text-amber-700 leading-relaxed">Slug akan diperbarui otomatis. Link lama <span class="font-mono bg-white px-1 py-0.5 rounded border">/kategori/{{ $category->slug }}</span> akan 404. Pastikan tidak ada portfolio/service yang masih memakai kategori ini jika ingin hapus tipe.</p>
                </div>
            </div>

            @if($errors->any())
                <div class="rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700"><ul class="list-disc list-inside">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
            @endif

            <div class="flex flex-col sm:flex-row justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="{{ route('admin.categories.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-sm font-medium hover:bg-slate-50 text-center order-2 sm:order-1">Batal</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#0F2A4A] hover:bg-[#162F4A] text-white font-semibold text-sm shadow order-1 sm:order-2">Update Kategori</button>
            </div>
        </form>
    </div>
</div>
@endsection
