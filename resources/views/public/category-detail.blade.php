@extends('layouts.public')
@section('title', $category->name . ' - Kategori ' . ucfirst($category->type))
@section('meta_description', 'Jelajahi ' . $category->name . ' - kategori ' . $category->type . ' dari SM Studio. Temukan portfolio, layanan, dan artikel terkait.')
@section('content')
@php
    $typeMeta = [
        'portfolio' => ['label'=>'Portfolio','icon'=>'P','grad'=>'from-violet-600 to-indigo-600','light'=>'from-violet-50 via-white to-white','border'=>'border-violet-200/40','blob'=>'bg-violet-500/10','chip'=>'bg-violet-50 text-violet-700 border-violet-200'],
        'service' => ['label'=>'Services','icon'=>'S','grad'=>'from-sky-600 to-blue-600','light'=>'from-sky-50 via-white to-white','border'=>'border-sky-200/40','blob'=>'bg-sky-500/10','chip'=>'bg-sky-50 text-sky-700 border-sky-200'],
        'article' => ['label'=>'Articles','icon'=>'A','grad'=>'from-amber-500 to-orange-500','light'=>'from-amber-50 via-white to-white','border'=>'border-amber-200/40','blob'=>'bg-amber-500/10','chip'=>'bg-amber-50 text-amber-700 border-amber-200'],
        'general' => ['label'=>'General','icon'=>'G','grad'=>'from-slate-700 to-slate-900','light'=>'from-slate-50 via-white to-white','border'=>'border-slate-200/50','blob'=>'bg-slate-500/10','chip'=>'bg-slate-100 text-slate-700 border-slate-200'],
    ];
    $meta = $typeMeta[$category->type] ?? $typeMeta['general'];
    $totalPortfolio = $portfolios->total() ?? $portfolios->count();
    $totalService = $services->count();
    $totalArticle = $articles->total() ?? $articles->count();
    $totalAll = $totalPortfolio + $totalService + $totalArticle;
@endphp

{{-- HERO --}}
<section class="relative overflow-hidden bg-[#0B1D33] text-white">
    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 28px 28px;"></div>
    <div class="absolute -right-24 -top-24 w-[560px] h-[560px] rounded-full bg-[#1A3A5C]/30 blur-3xl pointer-events-none"></div>
    <div class="absolute -left-20 bottom-0 w-[420px] h-[420px] rounded-full bg-[#0F2440]/50 blur-3xl pointer-events-none"></div>
    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <nav class="flex items-center gap-2 text-xs text-white/60">
            <a href="{{ route('home') }}" class="hover:text-white">Home</a><span>/</span>
            <a href="{{ route('categories') }}" class="hover:text-white">Kategori</a><span>/</span>
            <span class="text-white font-semibold">{{ $category->name }}</span>
        </nav>
        <div class="mt-6 flex flex-col lg:flex-row lg:items-end justify-between gap-6">
            <div class="flex gap-5 items-start">
                <span class="w-14 h-14 rounded-2xl bg-gradient-to-br {{ $meta['grad'] }} text-white grid place-items-center text-2xl shadow-xl shrink-0">{{ $meta['icon'] }}</span>
                <div>
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="px-3 py-1 rounded-full bg-white/10 border border-white/15 text-xs font-bold tracking-widest backdrop-blur">{{ strtoupper($category->type) }}</span>
                        <span class="px-3 py-1 rounded-full bg-white text-[#0B1D33] text-xs font-semibold">/{{ $category->slug }}</span>
                        <span class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500 text-white text-xs font-bold"><span class="w-1.5 h-1.5 rounded-full bg-white"></span> {{ $totalAll }} konten</span>
                    </div>
                    <h1 class="mt-3 text-3xl sm:text-4xl lg:text-5xl font-bold leading-[0.95] tracking-tight">{{ $category->name }}</h1>
                    <p class="mt-3 text-sm sm:text-[15px] text-white/70 max-w-2xl leading-relaxed">Kategori <span class="text-white font-semibold">{{ ucfirst($category->type) }}</span> - {{ $category->type=='portfolio' ? 'kumpulan karya nyata siswa SMK BPPI Baleendah yang bisa kamu jadikan referensi.' : ($category->type=='service' ? 'layanan siap pakai yang ditawarkan studio, dibimbing mentor.' : ($category->type=='article' ? 'artikel & wawasan seputar kategori ini.' : 'koleksi lintas konten.')) }}</p>
                </div>
            </div>
            <div class="flex flex-wrap gap-2 shrink-0">
                @if($totalPortfolio>0)<a href="#portfolios" class="px-4 py-2 rounded-full bg-white text-[#0B1D33] text-xs font-bold shadow hover:bg-slate-100">{{ $totalPortfolio }} Portfolio</a>@endif
                @if($totalService>0)<a href="#services" class="px-4 py-2 rounded-full bg-white/10 border border-white/20 text-white text-xs font-semibold backdrop-blur hover:bg-white/15">{{ $totalService }} Service</a>@endif
                @if($totalArticle>0)<a href="#articles" class="px-4 py-2 rounded-full bg-white/10 border border-white/20 text-white text-xs font-semibold backdrop-blur hover:bg-white/15">{{ $totalArticle }} Article</a>@endif
                <a href="{{ route('categories') }}" class="px-4 py-2 rounded-full bg-white/10 border border-white/20 text-white text-xs font-semibold"><- Semua kategori</a>
            </div>
        </div>

        <div class="mt-8 grid grid-cols-3 gap-3 sm:gap-4 max-w-2xl">
            @foreach([
                ['label'=>'Portfolio','value'=>$totalPortfolio,'icon'=>'P'],
                ['label'=>'Services','value'=>$totalService,'icon'=>'S'],
                ['label'=>'Articles','value'=>$totalArticle,'icon'=>'A'],
            ] as $s)
            <div class="bg-white/10 backdrop-blur border border-white/15 rounded-2xl p-4">
                <div class="text-white/60 text-xs tracking-widest font-bold">{{ $s['icon'] }} {{ $s['label'] }}</div>
                <div class="text-2xl font-bold text-white mt-1">{{ $s['value'] }}</div>
                <div class="text-xs text-white/60">konten</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CONTENT --}}
<section class="py-10 sm:py-14 bg-gradient-to-b from-[#F8FAFC] via-white to-[#F8FAFC]/40 relative overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[300px] bg-[#BFDBFE]/12 rounded-full blur-3xl pointer-events-none"></div>
    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

        {{-- Portfolio --}}
        <div id="portfolios" class="scroll-mt-24">
            <div class="flex items-center gap-3 mb-5">
                <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-violet-600 to-indigo-600 text-white grid place-items-center shadow">P</span>
                <div>
                    <h2 class="font-bold text-[#0B1D33] text-lg">Portfolio - {{ $category->name }}</h2>
                    <p class="text-xs text-slate-500">Karya publish di kategori ini</p>
                </div>
                <span class="ml-auto px-3 py-1 rounded-full bg-violet-50 text-violet-700 border border-violet-200 text-xs font-bold">{{ $totalPortfolio }} karya</span>
            </div>
            @if($portfolios->count())
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($portfolios as $idx=>$pf)
                    @php $pst = ['grad'=>'from-violet-50 via-white to-white','border'=>'border-violet-200/40','blob'=>'bg-violet-500/10']; @endphp
                    <a href="{{ route('portfolio.show', $pf->slug) }}" class="group relative flex flex-col overflow-hidden rounded-[24px] border border-violet-200/40 bg-gradient-to-br from-violet-50 via-white to-white p-[1.2px] hover:shadow-[0_12px_32px_-12px_rgba(15,42,74,0.18)] hover:-translate-y-1.5 transition-all duration-300">
                        <div class="relative flex flex-col h-full rounded-[22px] bg-white overflow-hidden">
                            <div class="h-48 bg-slate-100 overflow-hidden shrink-0 relative">
                                @if($pf->featured_image)<img src="{{ asset('storage/'.$pf->featured_image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">@else<div class="w-full h-full grid place-items-center text-slate-400 text-sm">No Image</div>@endif
                                <span class="absolute top-3 left-3 text-xs font-semibold text-[#0F2A4A] bg-white/90 backdrop-blur border border-slate-200 px-2.5 py-1 rounded-full shadow-sm">{{ $category->name }}</span>
                                <span class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white border border-slate-200 grid place-items-center text-slate-400 group-hover:bg-[#0F2A4A] group-hover:text-white group-hover:border-[#0F2A4A] group-hover:rotate-45 transition shadow-sm text-xs">-></span>
                            </div>
                            <div class="p-6 flex-1 flex flex-col">
                                <h3 class="font-semibold text-[#0B1D33] line-clamp-2 group-hover:text-[#0F2A4A]">{{ $pf->title }}</h3>
                                <p class="text-xs text-slate-500 mt-2">{{ $pf->client_name ?? $pf->client?->name ?? 'Client' }} - {{ is_array($pf->technology) ? implode(', ', $pf->technology) : $pf->technology }}</p>
                                <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between">
                                    <span class="text-xs font-semibold text-[#0F2A4A]">Lihat detail -></span>
                                    <span class="text-[10px] tracking-widest font-bold text-slate-400">SMK BPPI</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="mt-6">{{ $portfolios->links() }}</div>
            @else
                <div class="bg-white rounded-2xl border border-dashed border-slate-300 p-8 text-center">
                    <div class="w-12 h-12 rounded-xl bg-violet-50 border border-violet-200 grid place-items-center mx-auto text-violet-600">P</div>
                    <p class="text-sm text-slate-500 mt-3">Belum ada portfolio publish di kategori <span class="font-semibold text-[#0B1D33]">{{ $category->name }}</span>. Tambah via <span class="font-mono text-xs bg-slate-100 px-1 py-0.5 rounded">/admin/portfolio</span> dan pilih kategori ini.</p>
                </div>
            @endif
        </div>

        {{-- Services --}}
        <div id="services" class="scroll-mt-24">
            <div class="flex items-center gap-3 mb-5">
                <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-sky-600 to-blue-600 text-white grid place-items-center shadow">S</span>
                <div>
                    <h2 class="font-bold text-[#0B1D33] text-lg">Services - {{ $category->name }}</h2>
                    <p class="text-xs text-slate-500">Layanan aktif di kategori ini</p>
                </div>
                <span class="ml-auto px-3 py-1 rounded-full bg-sky-50 text-sky-700 border border-sky-200 text-xs font-bold">{{ $totalService }} layanan</span>
            </div>
            @if($services->count())
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($services as $svc)
                    <div class="group relative flex flex-col overflow-hidden rounded-[24px] border border-sky-200/40 bg-gradient-to-br from-sky-50 via-white to-white p-[1.2px] hover:shadow-[0_12px_32px_-12px_rgba(15,42,74,0.18)] hover:-translate-y-1.5 transition">
                        <div class="relative flex flex-col h-full rounded-[22px] bg-white p-6">
                            <div class="absolute -top-10 -right-10 w-36 h-36 rounded-full bg-sky-500/10 blur-2xl pointer-events-none"></div>
                            <span class="w-12 h-12 rounded-2xl bg-gradient-to-br from-sky-600 to-blue-600 text-white grid place-items-center text-xl shadow">{{ $svc->icon ?? 'S' }}</span>
                            <h3 class="font-semibold text-[#0B1D33] mt-4">{{ $svc->title }}</h3>
                            <p class="text-sm text-slate-500 mt-2 line-clamp-3">{{ $svc->description }}</p>
                            <a href="{{ route('services.show', $svc->slug) }}" class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-[#0F2A4A]">Lihat layanan <span class="w-6 h-6 rounded-full bg-[#0F2A4A] text-white grid place-items-center text-[10px]">-></span></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-2xl border border-dashed border-slate-300 p-8 text-center">
                    <p class="text-sm text-slate-500">Belum ada service aktif di kategori ini. Tambah via <span class="font-mono text-xs bg-slate-100 px-1 py-0.5 rounded">/admin/services</span>.</p>
                </div>
            @endif
        </div>

        {{-- Articles --}}
        <div id="articles" class="scroll-mt-24">
            <div class="flex items-center gap-3 mb-5">
                <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-amber-500 to-orange-500 text-white grid place-items-center shadow">A</span>
                <div>
                    <h2 class="font-bold text-[#0B1D33] text-lg">Articles - {{ $category->name }}</h2>
                    <p class="text-xs text-slate-500">Artikel publish di kategori ini</p>
                </div>
                <span class="ml-auto px-3 py-1 rounded-full bg-amber-50 text-amber-700 border border-amber-200 text-xs font-bold">{{ $totalArticle }} artikel</span>
            </div>
            @if($articles->count())
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($articles as $a)
                    <a href="{{ route('insights.show', $a->slug) }}" class="group relative flex flex-col overflow-hidden rounded-[24px] border border-amber-200/40 bg-gradient-to-br from-amber-50 via-white to-white p-[1.2px] hover:shadow-[0_12px_32px_-12px_rgba(15,42,74,0.18)] hover:-translate-y-1.5 transition">
                        <div class="relative flex flex-col h-full rounded-[22px] bg-white overflow-hidden">
                            <div class="h-44 bg-slate-100 overflow-hidden relative">
                                @if($a->featured_image)<img src="{{ asset('storage/'.$a->featured_image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">@else<div class="w-full h-full grid place-items-center bg-gradient-to-br from-amber-50 to-white text-slate-400">No Cover</div>@endif
                                <span class="absolute top-3 left-3 text-xs font-semibold bg-white/90 backdrop-blur border px-2.5 py-1 rounded-full">{{ $category->name }}</span>
                            </div>
                            <div class="p-6 flex-1">
                                <h3 class="font-semibold text-[#0B1D33] line-clamp-2 group-hover:text-[#0F2A4A]">{{ $a->title }}</h3>
                                <p class="text-sm text-slate-500 mt-2 line-clamp-2">{{ $a->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($a->content),100) }}</p>
                                <div class="mt-3 text-xs text-slate-400">{{ $a->created_at?->format('d M Y') }}</div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="mt-6">{{ $articles->links() }}</div>
            @else
                <div class="bg-white rounded-2xl border border-dashed border-slate-300 p-8 text-center">
                    <p class="text-sm text-slate-500">Belum ada artikel di kategori ini. Tambah via <span class="font-mono text-xs bg-slate-100 px-1 py-0.5 rounded">/admin/articles</span>.</p>
                </div>
            @endif
        </div>

        {{-- Related --}}
        @if($relatedCategories->count())
        <div class="bg-white rounded-[24px] border border-slate-200 p-6 sm:p-8 shadow-sm">
            <h3 class="font-bold text-[#0B1D33]">Kategori sejenis - {{ ucfirst($category->type) }}</h3>
            <p class="text-sm text-slate-500 mt-1">Jelajahi kategori lain dengan tipe yang sama.</p>
            <div class="mt-4 flex flex-wrap gap-2">
                @foreach($relatedCategories as $rc)
                <a href="{{ route('categories.show', $rc->slug) }}" class="px-4 py-2 rounded-full bg-[#F8FAFC] border border-slate-200 text-sm font-medium hover:bg-[#0F2A4A] hover:text-white hover:border-[#0F2A4A] transition">{{ $rc->name }}</a>
                @endforeach
            </div>
        </div>
        @endif

        {{-- CTA --}}
        <div class="bg-gradient-to-br from-[#0B1D33] via-[#0F2A4A] to-[#162F4A] rounded-[24px] p-6 sm:p-8 flex flex-col lg:flex-row items-center justify-between gap-6 text-white relative overflow-hidden shadow-xl border border-white/10">
            <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-white/10 blur-3xl pointer-events-none"></div>
            <div class="relative">
                <h3 class="text-xl font-bold">Tertarik kategori {{ $category->name }}?</h3>
                <p class="text-white/70 mt-1 text-sm">Konsultasi gratis 30 menit - tim siswa SMK BPPI siap bantu.</p>
            </div>
            <a href="{{ route('contact') }}" class="relative bg-white text-[#0B1D33] px-7 py-3 rounded-full font-semibold hover:bg-slate-100 transition shrink-0">Konsultasi Gratis -></a>
        </div>
    </div>
</section>
@endsection
