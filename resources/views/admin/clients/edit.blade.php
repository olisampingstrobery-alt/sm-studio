@extends('layouts.admin')
@section('title','Edit Client')
@section('header','Edit Client')
@section('content')
<div class="max-w-2xl bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="px-6 py-5 border-b border-slate-100"><h3 class="font-semibold text-[#0B1D33]">Edit: {{ $client->name }}</h3><p class="text-xs text-slate-500 mt-1">Perubahan langsung berdampingan tampil di /clients & beranda.</p></div>
    <form action="{{ route('admin.clients.update',$client) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
        @csrf @method('PUT')
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama *</label>
            <input type="text" name="name" required value="{{ old('name',$client->name) }}" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20 @error('name') border-red-300 @enderror">
            @error('name')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="grid md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Industri</label>
                <input type="text" name="industry" value="{{ old('industry',$client->industry) }}" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] @error('industry') border-red-300 @enderror">
                @error('industry')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Website</label>
                <input type="url" name="website" value="{{ old('website',$client->website) }}" class="w-full rounded-xl border-slate-200 @error('website') border-red-300 @enderror">
                @error('website')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Logo (ganti jika perlu)</label>
                <input type="file" name="logo" accept="image/*,.svg" class="w-full rounded-xl border-slate-200 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:bg-slate-100 file:text-sm @error('logo') border-red-300 @enderror">
                @error('logo')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                <p class="text-xs text-slate-500 mt-1">Kosongkan jika tidak ganti. PNG/SVG max 2MB.</p>
            </div>
            <div>
                @if($client->logo)
                    <div class="bg-slate-50 rounded-xl border border-slate-200 p-3 flex items-center gap-3">
                        <img src="{{ asset('storage/'.$client->logo) }}" class="w-16 h-16 rounded-xl object-contain border bg-white p-2">
                        <div><div class="text-sm font-medium">Logo saat ini</div><div class="text-xs text-slate-500 truncate max-w-[150px]">{{ $client->logo }}</div></div>
                    </div>
                @else
                    <div class="bg-slate-50 rounded-xl border border-dashed border-slate-200 p-4 text-center text-xs text-slate-400">Belum ada logo</div>
                @endif
            </div>
        </div>
        <div class="flex items-center gap-3 bg-slate-50 rounded-xl px-4 py-3 border border-slate-100">
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" @checked(old('is_active',$client->is_active)) class="sr-only peer">
                <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-checked:bg-black after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full"></div>
            </label>
            <span class="text-sm font-medium">Aktif — tampil di publik</span>
        </div>

        @if($errors->any())
            <div class="rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700"><ul class="list-disc list-inside">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
        @endif

        <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
            <a href="{{ route('admin.clients.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-sm font-medium">Batal</a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-black text-white font-semibold text-sm">Update & Tampilkan</button>
        </div>
    </form>
</div>
@endsection
