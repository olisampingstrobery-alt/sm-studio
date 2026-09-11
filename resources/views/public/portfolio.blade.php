@extends('layouts.public')
@section('title','Portfolio')
@section('content')
<section class="relative overflow-hidden bg-gradient-to-br from-black via-zinc-900 to-black text-white border-b border-white/10">
    <div class="absolute inset-0 opacity-[0.07]" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 32px 32px;"></div>
    <div class="absolute -right-24 -top-24 w-[560px] h-[560px] rounded-full bg-[#93C5FD]/12 blur-3xl pointer-events-none"></div>
    <div class="absolute -left-32 bottom-0 w-[480px] h-[480px] rounded-full bg-white/5 blur-3xl pointer-events-none"></div>
    <div class="absolute top-0 left-1/2 w-px h-full bg-gradient-to-b from-transparent via-white/10 to-transparent hidden lg:block pointer-events-none"></div>
    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12 lg:py-14">
        <span class="inline-flex items-center gap-2 text-[11px] sm:text-xs tracking-[0.16em] font-bold text-white/65 bg-white/10 border border-white/15 px-3 py-1.5 rounded-full backdrop-blur">PORTFOLIO • KARYA NYATA SISWA SMK BPPI BALEENDAH</span>
        <h1 class="mt-4 text-[28px] sm:text-[32px] lg:text-[36px] font-bold leading-tight tracking-tight">Karya Nyata, <span class="text-[#93C5FD]">Hasil Siap Pakai.</span></h1>
        <p class="mt-3 text-sm sm:text-[15px] leading-relaxed text-white/65 max-w-2xl">Kumpulan project beneran yang dikerjakan siswa SMK BPPI Baleendah — website, branding, dan konten untuk UMKM, sekolah, & komunitas. Bukan dummy, semua dari project nyata siswa didampingi mentor.</p>
    </div>
</section>
<section class="py-10 sm:py-12 bg-gradient-to-b from-[#F8FAFC] via-[#EFF6FF]/30 to-white border-y border-slate-100 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[520px] h-[320px] bg-[#EFF6FF]/50 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-72 h-72 bg-white/5 rounded-full blur-3xl pointer-events-none hidden lg:block"></div>
    <div class="absolute -left-20 top-24 w-64 h-64 bg-[#C5A880]/[0.04] rounded-full blur-3xl pointer-events-none hidden lg:block"></div>
    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Klien chips — sudah bekerja sama dengan siapa saja (manual via admin/clients) --}}
        @if(isset($clients) && $clients->count())
        <div class="bg-white/90 backdrop-blur rounded-[20px] border border-[#BFDBFE]/40 p-4 sm:p-5 flex flex-col lg:flex-row lg:items-center justify-between gap-4 shadow-soft mb-8">
            <div class="flex items-center gap-3 shrink-0">
                <span class="w-9 h-9 rounded-xl bg-black text-white grid place-items-center shadow">◈</span>
                <div>
                    <div class="text-sm font-bold text-[#0B1D33]">Sudah Bekerja Sama Dengan</div>
                    <div class="text-xs text-slate-500">{{ $clients->count() }} klien / mitra — data manual via admin</div>
                </div>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('portfolio') }}" class="px-4 py-2 rounded-full bg-black text-white text-xs font-bold shadow">Semua ({{ \App\Models\Portfolio::where('status','published')->count() }})</a>
                @foreach($clients as $cl)
                    @php $cnt = $cl->portfolios_count ?? 0; @endphp
                    <a href="{{ route('home') }}#client-{{ $cl->slug }}" class="group inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#F8FAFC] border border-slate-200 text-xs font-semibold text-slate-700 hover:bg-white hover:border-[#BFDBFE] hover:text-[#0F2A4A] hover:shadow-sm transition">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 group-hover:bg-black"></span>
                        {{ $cl->name }}
                        <span class="bg-white border px-1.5 py-0.5 rounded-full text-[10px] font-bold">{{ $cnt }}</span>
                    </a>
                @endforeach
                <a href="{{ route('home') }}#clients" class="px-4 py-2 rounded-full bg-white border border-[#BFDBFE] text-[#0F2A4A] text-xs font-semibold hover:bg-[#EFF6FF]">Lihat semua klien →</a>
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
                    <div class="bg-gradient-to-br from-[#EFF6FF]/40 via-white to-white rounded-[24px] border border-[#BFDBFE]/30 p-[1.2px] overflow-hidden"><div class="rounded-[22px] bg-white overflow-hidden"><div class="h-48 bg-slate-100"></div><div class="p-5 bg-gradient-to-br from-[#EFF6FF]/30 to-white"><div class="h-3 w-20 bg-slate-100 rounded"></div><div class="h-4 bg-slate-100 rounded mt-3"></div></div></div></div>
                    @endforeach
                </div>
            </div>
            {{-- Pagination server - tetap untuk SEO, React akan sembunyikan filter count --}}
            <div class="mt-8" id="portfolio-pagination">
                {{ $portfolios->links() }}
            </div>
            {{-- Fallback no-JS: tampilkan grid biasa bila React gagal — sudah pakai style baru biar konsisten --}}
            <noscript>
                @php
                    $noscriptStyles = [
                        ['grad'=>'from-[#EFF6FF] via-[#F8FAFC] to-white','border'=>'border-[#BFDBFE]/50','blob'=>'bg-blue-500/10'],
                        ['grad'=>'from-violet-50 via-white to-white','border'=>'border-violet-200/40','blob'=>'bg-violet-500/10'],
                        ['grad'=>'from-emerald-50/70 via-white to-white','border'=>'border-emerald-200/40','blob'=>'bg-emerald-500/10'],
                    ];
                @endphp
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                    @foreach($portfolios as $idx=>$pf)
                    @php $nst = $noscriptStyles[$idx % count($noscriptStyles)]; @endphp
                    <a href="{{ route('portfolio.show', $pf->slug ?? $pf->id) }}" class="group relative flex flex-col overflow-hidden rounded-[24px] border {{ $nst['border'] }} bg-gradient-to-br {{ $nst['grad'] }} p-[1.2px] hover:shadow-[0_12px_32px_-12px_rgba(15,42,74,0.18)] hover:-translate-y-1 transition-all duration-300">
                        <div class="relative flex flex-col h-full rounded-[22px] bg-white overflow-hidden">
                            <div class="h-48 bg-slate-100 overflow-hidden relative">@if($pf->featured_image)<img src="{{ asset('storage/'.$pf->featured_image) }}" class="w-full h-full object-cover">@elseif(isset($pf->images) && $pf->images->count())<img src="{{ asset('storage/'.$pf->images->first()->image) }}" class="w-full h-full object-cover">@else<div class="w-full h-full grid place-items-center text-slate-400 text-sm bg-gradient-to-br {{ $nst['grad'] }}">No Image</div>@endif<span class="absolute top-3 left-3 text-xs font-semibold text-[#0F2A4A] bg-white/90 backdrop-blur border border-slate-200 px-2.5 py-1 rounded-full shadow-sm">{{ $pf->client->name ?? $pf->client_name ?? 'Client' }}</span><span class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white border border-slate-200 grid place-items-center text-slate-400 group-hover:bg-black group-hover:text-white transition shadow-sm text-xs">↗</span></div>
                            <div class="p-6 flex-1 flex flex-col bg-gradient-to-br {{ $nst['grad'] }}"><h3 class="font-semibold text-[16px] leading-tight text-[#0B1D33] line-clamp-2">{{ $pf->title }}</h3><p class="text-xs text-slate-500 mt-1.5 truncate">{{ $pf->client_name ?? $pf->client?->name ?? 'Client' }}</p><div class="mt-4 pt-4 border-t border-slate-200/60 flex items-center justify-between"><span class="inline-flex items-center gap-1.5 text-xs font-semibold text-[#0F2A4A]">Lihat detail <span class="w-6 h-6 rounded-full bg-black text-white grid place-items-center text-[10px]">→</span></span><span class="text-[10px] tracking-[0.14em] font-bold text-slate-400">SMK BPPI</span></div></div>
                        </div>
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
