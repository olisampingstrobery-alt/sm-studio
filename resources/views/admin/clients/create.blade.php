@extends('layouts.admin')
@section('title','Tambah Client')
@section('header','Tambah Client')
@section('content')
<div class="max-w-2xl bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="px-6 py-5 border-b border-slate-100">
        <h3 class="font-semibold text-[#0B1D33]">Client Baru</h3>
        <p class="text-sm text-slate-500">Tambahkan klien — otomatis muncul di website umum <span class="font-medium text-[#0F2A4A]">/clients</span> & beranda (logo berdampingan). Tidak perlu edit koding.</p>
    </div>
    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
        @csrf

        {{-- Nama --}}
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Client *</label>
            <input type="text" name="name" required value="{{ old('name') }}" placeholder="Contoh: Tokopedia, BRI, Telkomsel" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20 @error('name') border-red-300 @enderror">
            @error('name')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Berdampingan: Industri + Website --}}
        <div class="grid md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Industri</label>
                <input type="text" name="industry" value="{{ old('industry') }}" placeholder="Technology, Finance, dll" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20 @error('industry') border-red-300 @enderror">
                @error('industry')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Website</label>
                <input type="url" name="website" value="{{ old('website') }}" placeholder="https://example.com" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20 @error('website') border-red-300 @enderror">
                @error('website')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                <p class="text-[11px] text-slate-400 mt-1">Bisa link panjang, max 2048 karakter.</p>
            </div>
        </div>

        {{-- Berdampingan: Logo upload + preview --}}
        <div class="grid md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Logo</label>
                <input type="file" name="logo" accept="image/*,.svg" class="w-full rounded-xl border-slate-200 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:bg-slate-100 file:text-sm @error('logo') border-red-300 @enderror">
                @error('logo')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                <p class="text-xs text-slate-500 mt-1">PNG/SVG/WebP, max 2MB. Background transparan lebih baik. <span class="font-medium text-emerald-600">Wajib agar muncul berdampingan rapi di publik.</span></p>
            </div>
            <div class="bg-slate-50 rounded-xl border border-dashed border-slate-200 p-4 flex flex-col justify-center">
                <span class="text-xs font-semibold text-slate-500">Preview di website umum</span>
                <div class="mt-2 flex items-center gap-3">
                    <div class="w-12 h-12 bg-white rounded-xl border flex items-center justify-center text-[10px] text-slate-400">Logo</div>
                    <div><div class="text-sm font-semibold text-[#0B1D33]">Nama Client</div><div class="text-xs text-slate-500">Industri</div></div>
                </div>
                <p class="text-[11px] text-slate-400 mt-2">Grid 4 kolom di /clients, 6 logo di beranda — otomatis berdampingan.</p>
            </div>
        </div>

        {{-- Aktif toggle --}}
        <div class="flex items-center gap-3 bg-slate-50 rounded-xl px-4 py-3 border border-slate-100">
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', true)) class="sr-only peer">
                <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-checked:bg-black after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full"></div>
            </label>
            <div>
                <span class="text-sm font-medium text-slate-700">Aktif — tampilkan di publik</span>
                <p class="text-xs text-slate-500">Nonaktif = sembunyikan tanpa hapus (tidak muncul di /clients & beranda).</p>
            </div>
        </div>

        @if($errors->any())
            <div class="rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700">
                <ul class="list-disc list-inside">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
        @endif

        <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
            <a href="{{ route('admin.clients.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-sm font-medium hover:bg-slate-50">Batal</a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-black hover:bg-black text-white font-semibold text-sm shadow">Simpan & Tampilkan di Publik</button>
        </div>
    </form>
</div>
@endsection
