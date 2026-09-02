@extends('layouts.admin')
@section('title','Settings')
@section('header','Settings')
@section('content')
<div class="max-w-4xl space-y-6">
    <div class="bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
        <div class="px-6 py-5 border-b"><h3 class="font-semibold text-[#0B1D33]">Pengaturan Website</h3><p class="text-sm text-slate-500">Kelola informasi umum yang tampil di website publik.</p></div>
        <form action="{{ route('admin.settings.update') }}" method="POST" class="p-6 space-y-6">
            @csrf
            <div class="grid md:grid-cols-2 gap-6">
                <div><label class="block text-sm font-semibold mb-1.5">Nama Website</label><input type="text" name="site_name" value="{{ $settings['general']->where('key','site_name')->first()?->value ?? 'SM Studio' }}" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]"></div>
                <div><label class="block text-sm font-semibold mb-1.5">Tagline</label><input type="text" name="site_tagline" value="{{ $settings['general']->where('key','site_tagline')->first()?->value ?? 'Unit Produksi PPLG SMK BPPI Baleendah — Dibangun siswa, siap bantu digital Anda' }}" class="w-full rounded-xl border-slate-200"></div>
                <div><label class="block text-sm font-semibold mb-1.5">Email</label><input type="email" name="contact_email" value="{{ $settings['contact']->where('key','contact_email')->first()?->value ?? 'smstudiobppi@gmail.com' }}" placeholder="smstudiobppi@gmail.com" class="w-full rounded-xl border-slate-200"></div>
                <div><label class="block text-sm font-semibold mb-1.5">WhatsApp</label><input type="text" name="contact_whatsapp" value="{{ $settings['contact']->where('key','contact_whatsapp')->first()?->value ?? '' }}" placeholder="+62..." class="w-full rounded-xl border-slate-200"></div>
                <div class="md:col-span-2"><label class="block text-sm font-semibold mb-1.5">Alamat</label><input type="text" name="contact_address" value="{{ $settings['contact']->where('key','contact_address')->first()?->value ?? '' }}" placeholder="Jl. Contoh No. 123, Jakarta" class="w-full rounded-xl border-slate-200"></div>
                <div class="md:col-span-2"><label class="block text-sm font-semibold mb-1.5">Deskripsi Singkat (About)</label><textarea name="site_description" rows="3" class="w-full rounded-xl border-slate-200">{{ $settings['general']->where('key','site_description')->first()?->value ?? '' }}</textarea></div>
            </div>
            <div class="flex justify-end pt-4 border-t"><button class="px-6 py-2.5 rounded-xl bg-[#0F2A4A] text-white font-semibold">Simpan Pengaturan</button></div>
        </form>
    </div>
    <div class="bg-[#0B1D33] rounded-2xl p-6 text-white flex items-center gap-4">
        <span class="w-10 h-10 rounded-xl bg-white/15 grid place-items-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></span>
        <div><div class="font-semibold">Tips</div><div class="text-sm text-white/70">Perubahan akan langsung tampil di website publik setelah disimpan.</div></div>
    </div>
</div>
@endsection
