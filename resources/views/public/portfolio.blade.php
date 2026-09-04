@extends('layouts.public')
@section('title','Portfolio')
@section('content')
<section class="bg-[#0B1D33] text-white">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <span class="text-xs tracking-widest font-semibold text-white/60">PORTFOLIO - KARYA NYATA SISWA SMK BPPI BALEENDAH</span>
        <h1 class="text-3xl font-bold mt-2">Karya Nyata, Hasil Siap Pakai.</h1>
        <p class="text-white/60 mt-3 max-w-xl">Kumpulan project beneran yang dikerjakan siswa SMK BPPI Baleendah - website, branding, dan konten untuk UMKM, sekolah, & komunitas. Bukan dummy, semua dari project nyata.</p>
    </div>
</section>
<section class="py-10 sm:py-12 bg-gradient-to-b from-white to-[#F8FAFC]/30">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Klien chips — sudah bekerja sama dengan siapa saja (manual via admin/clients) --}}
        @if(isset($clients) && $clients->count())
        <div class="bg-white rounded-[20px] border border-slate-200 p-4 sm:p-5 flex flex-col lg:flex-row lg:items-center justify-between gap-4 shadow-sm mb-8">
            <div class="flex items-center gap-3 shrink-0">
                <span class="w-9 h-9 rounded-xl bg-[#0B1D33] text-white grid place-items-center shadow">◈</span>
                <div>
                    <div class="text-sm font-bold text-[#0B1D33]">Sudah Bekerja Sama Dengan</div>
                    <div class="text-xs text-slate-500">{{ $clients->count() }} klien / mitra — data manual via admin</div>
                </div>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('portfolio') }}" class="px-4 py-2 rounded-full bg-[#0F2A4A] text-white text-xs font-bold shadow">Semua ({{ \App\Models\Portfolio::where('status','published')->count() }})</a>
                @foreach($clients as $cl)
                    @php $cnt = $cl->portfolios_count ?? 0; @endphp
                    <a href="{{ route('clients') }}#client-{{ $cl->slug }}" class="group inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#F8FAFC] border border-slate-200 text-xs font-semibold text-slate-700 hover:bg-white hover:border-[#BFDBFE] hover:text-[#0F2A4A] hover:shadow-sm transition">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 group-hover:bg-[#0F2A4A]"></span>
                        {{ $cl->name }}
                        <span class="bg-white border px-1.5 py-0.5 rounded-full text-[10px] font-bold">{{ $cnt }}</span>
                    </a>
                @endforeach
                <a href="{{ route('clients') }}" class="px-4 py-2 rounded-full bg-white border border-[#BFDBFE] text-[#0F2A4A] text-xs font-semibold hover:bg-[#EFF6FF]">Lihat semua klien →</a>
            </div>
        </div>
        @endif
        @if($portfolios->count() || true)
            {{-- React island - filter & search client-side tanpa reload (useDeferredValue + memo) --}}
            @php
                $portfolioPayload = ["portfolios" => $portfolios->getCollection()->map(fn($pf) => ["id"=>$pf->id,"title"=>$pf->title,"slug"=>$pf->slug,"client"=>["name"=>$pf->client->name ?? $pf->client_name ?? "Client","slug"=>$pf->client->slug ?? null],"client_name"=>$pf->client_name ?? $pf->client->name ?? "Client","featured_image"=>$pf->featured_image,"is_featured"=>$pf->is_featured ?? false])->values()];
            @endphp
            <div id="portfolio-root" class="island-loading min-h-[280px]" data-props='@json($portfolioPayload)'>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 opacity-60 animate-pulse">
                    @foreach($portfolios as $pf)
                    <div class="bg-white rounded-[20px] border border-slate-100 overflow-hidden"><div class="h-48 bg-slate-100"></div><div class="p-5"><div class="h-3 w-20 bg-slate-100 rounded"></div><div class="h-4 bg-slate-100 rounded mt-3"></div></div></div>
                    @endforeach
                </div>
            </div>
            {{-- Pagination server - tetap untuk SEO, React akan sembunyikan filter count --}}
            <div class="mt-8" id="portfolio-pagination">
                {{ $portfolios->links() }}
            </div>
            {{-- Fallback no-JS: tampilkan grid biasa bila React gagal --}}
            <noscript>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                    @foreach($portfolios as $pf)
                    <a href="{{ route('portfolio.show', $pf->slug ?? $pf->id) }}" class="group bg-white rounded-[20px] border border-slate-100 overflow-hidden flex flex-col">
                        <div class="h-48 bg-slate-100 overflow-hidden">@if($pf->featured_image)<img src="{{ asset('storage/'.$pf->featured_image) }}" class="w-full h-full object-cover">@elseif(isset($pf->images) && $pf->images->count())<img src="{{ asset('storage/'.$pf->images->first()->image) }}" class="w-full h-full object-cover">@else<div class="w-full h-full grid place-items-center text-slate-400 text-sm">No Image</div>@endif</div>
                        <div class="p-5"><span class="text-xs font-semibold text-[#0F2A4A] bg-[#EFF6FF] px-2.5 py-1 rounded-full">{{ $pf->client->name ?? $pf->client_name ?? 'Client' }}</span><h3 class="font-semibold text-[#0B1D33] mt-3">{{ $pf->title }}</h3></div>
                    </a>
                    @endforeach
                </div>
            </noscript>
        @else
            <div class="bg-white rounded-2xl border border-dashed border-slate-300 p-12 text-center">
                <div class="w-12 h-12 rounded-xl bg-slate-100 grid place-items-center mx-auto text-slate-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/></svg>
                </div>
                <h3 class="font-semibold text-[#0B1D33] mt-4">Belum ada karya tayang</h3>
                <p class="text-sm text-slate-500 mt-1 max-w-md mx-auto">Karya siswa akan tayang di sini setelah dipublish via <span class="font-mono text-xs bg-slate-100 px-1.5 py-0.5 rounded">/admin/portfolio</span></p>
            </div>
        @endif
    </div>
</section>
@endsection
