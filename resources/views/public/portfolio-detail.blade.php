@extends('layouts.public')
@section('title', $portfolio->title)
@section('content')
<section class="bg-slate-900 text-white">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <a href="{{ route('portfolio') }}" class="text-sm text-white/60 hover:text-white">← Kembali ke Karya</a>
        <div class="mt-4 inline-flex gap-2"><span class="px-3 py-1 rounded-full bg-white/15 text-sm">{{ $portfolio->category?->name ?? 'Karya Siswa' }}</span>@if($portfolio->is_featured)<span class="px-3 py-1 rounded-full bg-amber-500 text-white text-sm">★ Karya Unggulan</span>@endif <span class="px-3 py-1 rounded-full bg-white/10 text-xs">SMK BPPI Baleendah • Unit Produksi PPLG</span></div>
        <h1 class="text-3xl font-bold mt-3">{{ $portfolio->title }}</h1>
        <p class="text-white/60 mt-2">{{ $portfolio->client_name ?? $portfolio->client?->name ?? 'Kolaborasi Siswa' }} @if($portfolio->technology) • {{ is_array($portfolio->technology) ? implode(', ', $portfolio->technology) : $portfolio->technology }} @endif</p>
    </div>
</section>
@if($portfolio->featured_image)
<section><img src="{{ asset('storage/'.$portfolio->featured_image) }}" class="w-full h-[420px] object-cover"></section>
@endif
<section class="py-12">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">
                <h2 class="font-semibold text-[#0B1D33]">Tentang Project Ini</h2>
                <p class="text-xs text-slate-500 -mt-1 mb-3">Dikerjakan siswa SMK BPPI Baleendah — kolaborasi tim & mentor</p>
                <p class="text-slate-600 mt-3 leading-relaxed whitespace-pre-line">{{ $portfolio->description }}</p>
                @foreach(['challenge'=>'Challenge','solution'=>'Solution','process'=>'Process','result'=>'Result'] as $k=>$label)
                    @if($portfolio->$k)<h3 class="font-semibold text-[#0B1D33] mt-8">{{ $label }}</h3><p class="text-slate-600 mt-2 whitespace-pre-line">{{ $portfolio->$k }}</p>@endif
                @endforeach
            </div>
        </div>
        <div class="space-y-6">
            <div class="bg-[#0F2A4A] rounded-2xl p-6 text-white">
                <h3 class="font-semibold">Mau project serupa?</h3>
                <p class="text-white/70 text-sm mt-2">Tim siswa SMK BPPI Baleendah siap bantu wujudkan — konsultasi dulu gratis.</p>
                <a href="{{ route('contact') }}" class="mt-4 block text-center py-3 rounded-xl bg-white text-[#0B1D33] font-semibold">Konsultasi Gratis</a>
            </div>
            <div class="bg-white border border-slate-200 shadow-sm rounded-2xl p-6">
                <h4 class="font-semibold text-sm">Info Project</h4>
                <dl class="mt-4 space-y-3 text-sm"><div class="flex justify-between"><dt class="text-slate-500">Client</dt><dd class="font-medium">{{ $portfolio->client_name ?? $portfolio->client?->name ?? '-' }}</dd></div><div class="flex justify-between"><dt class="text-slate-500">Status</dt><dd class="font-medium">{{ ucfirst($portfolio->status) }}</dd></div></dl>
            </div>
        </div>
    </div>
    {{-- Gallery — full layar (di luar grid 2:1 agar tidak ada space kanan) --}}
    @if($portfolio->images->count())
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
            <h3 class="font-semibold text-[#0B1D33] mb-4">Gallery</h3>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">@foreach($portfolio->images as $img)<img src="{{ asset('storage/'.$img->image) }}" class="rounded-xl h-48 w-full object-cover border border-slate-200">@endforeach</div>
        </div>
    </div>
    @endif
</section>
@endsection
