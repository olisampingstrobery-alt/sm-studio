@extends('layouts.public')
@section('title', $service->title)
@section('content')
<section class="bg-[#0B1D33] text-white">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <a href="{{ route('services') }}" class="text-sm text-white/60 hover:text-white">← Kembali ke Layanan</a>
        <span class="mt-3 inline-flex text-[11px] tracking-widest font-semibold text-white/60">SMK BPPI BALEENDAH • Unit Produksi PPLG</span>
        <h1 class="text-3xl font-bold mt-2">{{ $service->title }}</h1>
        <p class="text-white/70 mt-3 max-w-2xl">{{ $service->description }} — dikerjakan tim siswa, dikurasi mentor, siap pakai untuk Anda.</p>
    </div>
</section>
<section class="py-12">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 p-8">
            <h2 class="font-semibold text-[#0B1D33]">Yang Kamu Dapat</h2>
            <p class="text-slate-600 mt-3 leading-relaxed whitespace-pre-line">{{ $service->detail ?? $service->description }}</p>
            <p class="text-sm text-slate-500 mt-4 bg-slate-50 border border-slate-200 rounded-xl px-4 py-3">Dikerjakan kolaboratif oleh siswa SMK BPPI Baleendah — proses jelas, komunikasi friendly, hasil rapi & siap pakai.</p>
            @if($service->benefits)
            <div class="mt-8">
                <h3 class="font-semibold text-sm text-[#0B1D33]">Kenapa Pilih SM STUDIO</h3>
                <ul class="mt-3 grid sm:grid-cols-2 gap-3">
                    @foreach((array)$service->benefits as $b)<li class="flex gap-2 text-sm text-slate-600"><span class="w-6 h-6 rounded-full bg-emerald-50 text-emerald-600 grid place-items-center shrink-0">✓</span> {{ $b }}</li>@endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="space-y-6">
            <div class="bg-[#EFF6FF] border border-[#BFDBFE] rounded-2xl p-6">
                <h3 class="font-semibold text-[#0B1D33]">Mau mulai layanan ini?</h3>
                <p class="text-sm text-slate-600 mt-2">Konsultasi gratis 30 menit — cerita kebutuhanmu, kita bantu petakan solusi yang paling pas.</p>
                <a href="{{ route('contact') }}" class="mt-4 block text-center py-3 rounded-xl bg-[#0F2A4A] text-white font-semibold">Konsultasi Gratis</a>
            </div>
            <div class="bg-white border border-slate-100 rounded-2xl p-6">
                <div class="text-sm font-semibold text-[#0B1D33]">Kategori</div>
                <div class="mt-2"><span class="px-3 py-1 rounded-full bg-slate-100 text-sm">{{ $service->category->name ?? 'Umum' }}</span></div>
            </div>
        </div>
    </div>
</section>
@endsection
