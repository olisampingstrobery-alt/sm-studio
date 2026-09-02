@extends('layouts.public')
@section('title','Kontak')
@section('content')
<section class="bg-[#0B1D33] text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(white 1px, transparent 0); background-size: 28px 28px;"></div>
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16 relative">
        <span class="text-xs tracking-widest font-semibold text-white/60">KONTAK • SMK BPPI BALEENDAH</span>
        <h1 class="mt-3 text-4xl font-bold leading-tight">Mau Bikin Website?<br><span class="text-[#93C5FD]">Cerita Aja Dulu.</span></h1>
        <p class="mt-4 text-white/70 max-w-xl">Isi form singkat — tim Unit Produksi PPLG SMK BPPI Baleendah akan balas dalam 1x24 jam. Konsultasi pertama gratis, santai & tanpa maksa.</p>
    </div>
</section>
<section class="py-12">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-5 gap-10">
        <div class="lg:col-span-3 bg-white rounded-[24px] border border-slate-100 shadow-card p-8">
            @if(session('success'))<div class="mb-6 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 text-sm">{{ session('success') }}</div>@endif
            <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid md:grid-cols-2 gap-5">
                    <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama *</label><input type="text" name="name" required value="{{ old('name') }}" placeholder="Nama kamu / brand" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20"></div>
                    <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Email *</label><input type="email" name="email" required value="{{ old('email') }}" placeholder="email aktif" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]"></div>
                </div>
                <div class="grid md:grid-cols-2 gap-5">
                    <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">WhatsApp</label><input type="text" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="+62..." class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]"></div>
                    <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Butuh bantuan apa?</label><select name="service" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]"><option value="">Pilih</option><option>Website Siap Pakai</option><option>Branding & Desain</option><option>Konten / Sosmed</option><option>Konsultasi dulu</option><option>Lainnya</option></select></div>
                </div>
                <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Budget (opsional)</label><select name="budget" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]"><option value="">Pilih range</option><option>< 5jt (starter UMKM)</option><option>5–15jt</option><option>15–30jt</option><option>> 30jt / diskusi</option></select></div>
                <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Ceritakan kebutuhanmu *</label><textarea name="message" rows="4" required placeholder="Contoh: Mau bikin website profil UMKM, butuh 4 halaman, ada katalog..." class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]">{{ old('message') }}</textarea></div>
                <button type="submit" class="w-full py-3.5 rounded-xl bg-[#0F2A4A] hover:bg-[#162F4A] text-white font-semibold shadow">Kirim — Konsultasi Gratis</button>
                <p class="text-center text-xs text-slate-400">Dibangun siswa SMK BPPI Baleendah • Respon 1x24 jam • Tanpa kewajiban lanjut</p>
            </form>
        </div>
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-[#EFF6FF] border border-[#BFDBFE] rounded-[20px] p-6">
                <h3 class="font-semibold text-[#0B1D33]">Kontak Langsung</h3>
                <div class="mt-4 space-y-3 text-sm">
                    <div class="flex gap-3"><span class="w-9 h-9 rounded-xl bg-white grid place-items-center">📍</span><span>Jl. Adipati Agung No.23, Baleendah, Kec. Baleendah, Kabupaten Bandung, Jawa Barat 40375<br><span class="text-slate-500">Studio siswa — jam sekolah & mentoring</span></span></div>
                    <div class="flex gap-3"><span class="w-9 h-9 rounded-xl bg-white grid place-items-center">✉️</span><span>smstudiobppi@gmail.com<br><span class="text-slate-500">Respon < 1x24 jam</span></span></div>
                    <div class="flex gap-3"><span class="w-9 h-9 rounded-xl bg-white grid place-items-center">📞</span><span>+62 812-3456-7890<br><span class="text-slate-500">WA / Call — chat aja dulu</span></span></div>
                </div>
            </div>
            <div class="bg-[#0B1D33] rounded-[20px] p-6 text-white">
                <h3 class="font-semibold">Kenapa Pilih SM STUDIO?</h3>
                <ul class="mt-3 space-y-2 text-sm text-white/70">
                    <li class="flex gap-2"><span class="text-emerald-400">✓</span> Unit Produksi PPLG, tapi dikurasi mentor — rapi & siap pakai</li>
                    <li class="flex gap-2"><span class="text-emerald-400">✓</span> Proses jelas, komunikasi friendly & transparan</li>
                    <li class="flex gap-2"><span class="text-emerald-400">✓</span> Harga ramah UMKM/sekolah, tetap profesional</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
