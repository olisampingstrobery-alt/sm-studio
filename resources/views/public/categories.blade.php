@extends('layouts.public')
@section('title','Kategori - Jelajahi Karya & Layanan')
@section('meta_description','Jelajahi kategori Services, Portfolio, dan Articles dari SM Studio - Unit Produksi PPLG SMK BPPI Baleendah. Temukan karya berdasarkan keahlian.')
@section('content')

{{-- HERO DARK — minimal, rapi, spacious --}}
<section class="relative overflow-hidden bg-[#0B1D33] text-white">
    <div class="absolute inset-0 bg-gradient-to-br from-[#0B1D33] via-[#0F2440] to-[#0B1D33]"></div>
    <div class="absolute -right-40 -top-40 w-[640px] h-[640px] rounded-full bg-[#1E3A5F]/25 blur-[80px] pointer-events-none"></div>
    <div class="absolute -left-32 bottom-[-60px] w-[520px] h-[520px] rounded-full bg-[#0F3050]/30 blur-[70px] pointer-events-none"></div>

    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 pt-14 pb-12 sm:pt-20 sm:pb-14 lg:pt-24 lg:pb-16">
        <div class="max-w-3xl">
            <span class="inline-flex items-center gap-2 bg-white/[0.08] border border-white/15 px-3.5 py-1.5 rounded-full text-[11px] font-bold tracking-[0.16em] text-white/90 backdrop-blur mt-3 sm:mt-4">
                KATEGORI — TAXONOMI KONTEN — SM STUDIO
            </span>
            <h1 class="mt-6 font-display font-extrabold text-[32px] sm:text-[42px] lg:text-[46px] leading-[1.0] tracking-[-0.02em]">
                <span class="block text-white">Jelajahi</span>
                <span class="block bg-gradient-to-r from-[#93C5FD] to-[#BFDBFE] bg-clip-text text-transparent">Kategori Karya.</span>
            </h1>
            <p class="mt-5 text-[15px] sm:text-[16px] leading-[1.75] text-white/65 max-w-[58ch] font-light">
                Setiap kategori mengelompokkan <span class="text-white font-medium">Services, Portfolio, dan Articles</span> agar kamu mudah menemukan yang paling relevan — dari <span class="text-white/90">Website & Branding</span> hingga <span class="text-white/90">Tutorial</span>.
            </p>
        </div>

        <div class="mt-8 flex flex-wrap items-center gap-3">
            <span class="inline-flex items-center gap-2.5 bg-white text-[#0B1D33] pl-2 pr-5 py-2.5 rounded-full text-sm font-bold shadow-lg">
                <span class="w-7 h-7 rounded-full bg-[#0B1D33] text-white grid place-items-center text-xs font-black">{{ $stats['total'] }}</span>
                Total {{ $stats['total'] }} Kategori
            </span>
            <a href="#type-portfolio" class="inline-flex items-center gap-2 bg-white/[0.07] border border-white/15 px-4 py-2.5 rounded-full text-sm font-medium text-white/80 hover:bg-white/10 backdrop-blur transition">
                <span class="w-2 h-2 rounded-full bg-violet-400"></span> {{ $stats['portfolio'] }} Portfolio
            </a>
            <a href="#type-service" class="inline-flex items-center gap-2 bg-white/[0.07] border border-white/15 px-4 py-2.5 rounded-full text-sm font-medium text-white/80 hover:bg-white/10 backdrop-blur transition">
                <span class="w-2 h-2 rounded-full bg-sky-400"></span> {{ $stats['service'] }} Service
            </a>
            <a href="#type-article" class="inline-flex items-center gap-2 bg-white/[0.07] border border-white/15 px-4 py-2.5 rounded-full text-sm font-medium text-white/80 hover:bg-white/10 backdrop-blur transition">
                <span class="w-2 h-2 rounded-full bg-amber-400"></span> {{ $stats['article'] }} Article
            </a>
            <span class="hidden sm:inline-flex items-center gap-1.5 text-xs text-white/40 ml-1">Klik untuk lompat →</span>
        </div>

        <div class="mt-8 flex flex-col sm:flex-row gap-3 max-w-xl">
            <a href="{{ route('portfolio') }}" class="inline-flex items-center justify-center gap-2 flex-1 px-6 py-3.5 rounded-full bg-white text-[#0B1D33] font-semibold text-sm hover:bg-slate-100 transition shadow-lg">
                Lihat Portfolio
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="M12 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('services') }}" class="inline-flex items-center justify-center gap-2 flex-1 px-6 py-3.5 rounded-full bg-white/10 border border-white/20 text-white font-semibold text-sm hover:bg-white/15 backdrop-blur transition">
                Lihat Services
            </a>
        </div>
    </div>
</section>

{{-- STATS STRIP — terpisah dari hero, lebih rapi & tidak menumpuk --}}
<section class="bg-[#F8FAFC] border-y border-slate-200/70">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-7">
        @php
            $miniStats = [
                ['label'=>'Kategori','value'=>$stats['total'],'sub'=>'Total kategori','dot'=>'bg-[#0F2A4A]','icon'=>'M4 6h16M4 12h16M4 18h7'],
                ['label'=>'Portfolio','value'=>\App\Models\Portfolio::where('status','published')->count(),'sub'=>'Karya publish','dot'=>'bg-violet-500','icon'=>'M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5z'],
                ['label'=>'Services','value'=>\App\Models\Service::where('is_active',true)->count(),'sub'=>'Layanan aktif','dot'=>'bg-sky-500','icon'=>'M11.42 15.148L17.25 21A2.5 2.5 0 0021 17.25l-5.652-5.652M11.42 15.148L21 3l-3-3L4.5 13.5 2 21l8.5-2L14 12.75l-2.58-2.58z'],
                ['label'=>'Articles','value'=>\App\Models\Article::where('is_published',true)->count(),'sub'=>'Artikel tayang','dot'=>'bg-amber-500','icon'=>'M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h2.25'],
            ];
        @endphp
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
            @foreach($miniStats as $st)
            <div class="bg-white border border-slate-200 rounded-2xl p-5 flex items-center gap-4 hover:shadow-sm hover:border-slate-300 transition">
                <span class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-200 grid place-items-center text-slate-600 shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $st['icon'] }}"/></svg>
                </span>
                <div>
                    <div class="flex items-center gap-2 text-[10px] tracking-[0.14em] font-bold text-slate-400">
                        <span class="w-1.5 h-1.5 rounded-full {{ $st['dot'] }}"></span> {{ strtoupper($st['label']) }}
                    </div>
                    <div class="text-2xl font-black leading-none text-[#0B1D33] mt-1">{{ $st['value'] }}</div>
                    <div class="text-xs text-slate-500 mt-0.5">{{ $st['sub'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- KONTEN KATEGORI --}}
<section class="py-8 sm:py-12 lg:py-14 bg-[#F8FAFC] relative overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[760px] h-[320px] bg-[#BFDBFE]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        @if($allCategories->isEmpty())
            <div class="bg-white rounded-[24px] border border-dashed border-slate-300 p-10 sm:p-14 text-center shadow-sm max-w-2xl mx-auto">
                <div class="w-14 h-14 rounded-2xl bg-[#EFF6FF] border border-[#BFDBFE] grid place-items-center mx-auto text-[#0F2A4A] font-bold">K</div>
                <h3 class="font-bold text-[#0B1D33] mt-4 text-lg">Belum ada kategori</h3>
                <p class="text-sm text-slate-500 mt-2 max-w-md mx-auto leading-relaxed">Admin belum membuat kategori. Kategori akan muncul di sini setelah dibuat via <span class="font-mono text-xs bg-slate-100 px-1.5 py-0.5 rounded border">/admin/categories</span> dan otomatis jadi filter di portfolio & layanan.</p>
                <a href="{{ route('admin.categories.create') }}" class="mt-6 inline-flex items-center gap-2 bg-[#0F2A4A] text-white px-6 py-3 rounded-full text-sm font-semibold hover:bg-[#162F4A] transition">Buat kategori pertama <span>→</span></a>
            </div>
        @else
            @php
                $typeMeta = [
                    'portfolio' => ['label'=>'Portfolio','desc'=>'Karya nyata siswa — website, branding, konten UMKM','border'=>'border-violet-200/50','iconBg'=>'from-violet-600 to-indigo-600','accent'=>'bg-violet-600','soft'=>'bg-violet-50','chip'=>'bg-violet-50 text-violet-700 border-violet-200'],
                    'service' => ['label'=>'Services','desc'=>'Layanan yang ditawarkan studio — siap pakai & dibimbing mentor','border'=>'border-sky-200/50','iconBg'=>'from-sky-600 to-blue-600','accent'=>'bg-sky-600','soft'=>'bg-sky-50','chip'=>'bg-sky-50 text-sky-700 border-sky-200'],
                    'article' => ['label'=>'Articles','desc'=>'Tutorial, cerita project, dan wawasan digital dari studio','border'=>'border-amber-200/50','iconBg'=>'from-amber-500 to-orange-500','accent'=>'bg-amber-500','soft'=>'bg-amber-50','chip'=>'bg-amber-50 text-amber-700 border-amber-200'],
                    'general' => ['label'=>'General','desc'=>'Kategori serbaguna lintas konten','border'=>'border-slate-200','iconBg'=>'from-slate-700 to-slate-900','accent'=>'bg-slate-700','soft'=>'bg-slate-50','chip'=>'bg-slate-100 text-slate-700 border-slate-200'],
                ];
                // Icon per kategori (Heroicons outline) — bukan P/S/A
                $categoryIcons = [
                    'website' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 100-18 9 9 0 000 18z"/><path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M12 3a15.3 15.3 0 010 18M12 3a15.3 15.3 0 000 18"/>',
                    'branding' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 104.5 0 3 3 0 015.78-1.128M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"/>',
                    'company-profile' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18M8.25 3v18M11.25 3v18M14.25 3v18M17.25 3v18M3.75 9h16.5M3.75 15h16.5"/>',
                    'e-commerce' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.67-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z"/>',
                    'landing-page' => '<path stroke-linecap="round" stroke-linejoin="round" d="M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z"/><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5M9 3.75v16.5"/>',
                    'web-development' => '<path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/>',
                    'brand-identity' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"/><path stroke-linecap="round" stroke-linejoin="round" d="M18.25 12.75l1.5 1.5 1.5-1.5-1.5-1.5-1.5 1.5z"/>',
                    'uiux-design' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c1.036 0 2.03.41 2.763 1.142l6.401 6.402a3.75 3.75 0 010 5.304l-2.121 2.121a3.75 3.75 0 01-5.304 0L4.098 19.902z"/>',
                    'digital-marketing' => '<path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09s-1.402.03-2.09.09l-.82 1.68c-.3.62-.89 1.04-1.57 1.12l-1.1.13c-.48.06-.95-.17-1.2-.59l-.65-1.1c-.25-.42-.23-.95.05-1.35l.73-1.05c-.2-.66-.35-1.35-.44-2.06l-1.68-.82a1.5 1.5 0 01-.88-1.39V9.25c0-.62.36-1.18.92-1.43l1.68-.82c.09-.71.24-1.4.44-2.06l-.73-1.05a1.5 1.5 0 01-.05-1.35l.65-1.1c.25-.42.72-.65 1.2-.59l1.1.13c.68.08 1.27.5 1.57 1.12l.82 1.68c.68.06 1.38.09 2.09.09s1.4-.03 2.09-.09l.82-1.68c.3-.62.89-1.04 1.57-1.12l1.1-.13c.48-.06.95.17 1.2.59l.65 1.1c.25.42.23.95-.05 1.35l-.73 1.05c.2.66.35 1.35.44 2.06l1.68.82c.56.27.92.83.92 1.43v1.5c0 .6-.36 1.16-.92 1.43l-1.68.82c-.09.71-.24 1.4-.44 2.06l.73 1.05c.28.4.3.93.05 1.35l-.65 1.1c-.25.42-.72.65-1.2.59l-1.1-.13a1.88 1.88 0 00-1.57-1.12l-.82-1.68z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>',
                    'tutorial' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>',
                    'tips-digital' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.94 12.94 0 01-4.5 0m3.75 2.383a14.76 14.76 0 01-4.5 0M12 6a3.75 3.75 0 00-3.75 3.75c0 1.6 1.05 2.95 2.45 3.4.65.21 1.3.64 1.3 1.6v1.5m0-6.75h.008v.008H12V6z"/>',
                    'cerita-project' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h2.25M6 12h2.25m-2.25 4.5H18"/>',
                    'default' => '<path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m5.671 3L12 17.25 2.25 12l3.375-1.5"/>',
                ];
                $typeHeaderIcons = [
                    'portfolio' => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>',
                    'service' => '<path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.148L17.25 21A2.5 2.5 0 0021 17.25l-5.652-5.652M11.42 15.148L21 3l-3-3L4.5 13.5 2 21l8.5-2L14 12.75l-2.58-2.58z"/>',
                    'article' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h2.25"/>',
                    'general' => '<path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m5.671 3L12 17.25 2.25 12l3.375-1.5"/>',
                ];
            @endphp

            {{-- Filter tabs: scrollable di mobile, centered di desktop --}}
            <div class="flex justify-center mb-8 sm:mb-10">
                <div class="inline-flex items-center gap-1.5 p-1.5 bg-white border border-slate-200 rounded-full shadow-sm overflow-x-auto max-w-full scrollbar-thin">
                    @foreach(['all'=>'Semua','portfolio'=>'Portfolio','service'=>'Services','article'=>'Articles'] as $k=>$v)
                        <a href="#type-{{ $k }}" class="shrink-0 px-4 sm:px-5 py-2 rounded-full text-sm font-semibold transition whitespace-nowrap {{ $k==='all' ? 'bg-[#0F2A4A] text-white shadow' : 'text-slate-600 hover:bg-slate-50 hover:text-[#0B1D33]' }}">{{ $v }}</a>
                    @endforeach
                </div>
            </div>

            <div class="space-y-20 sm:space-y-24 lg:space-y-28">
            @foreach(['portfolio','service','article','general'] as $type)
                @if(isset($categories[$type]) && $categories[$type]->count())
                    @php $meta = $typeMeta[$type]; $list = $categories[$type]; $totalType = $list->sum(fn($c)=> $c->services_count + $c->portfolios_count + $c->articles_count); @endphp
                    <div id="type-{{ $type }}" class="scroll-mt-28 pt-8 sm:pt-10">
                        {{-- Header tipe: rapi dengan border bottom + jarak LEGA atas-bawah (fix dempet) --}}
                        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 pb-6 border-b border-slate-200/70 mb-8 sm:mb-10 mt-2 sm:mt-4">
                            <div class="flex gap-3.5 sm:gap-4 items-start min-w-0">
                                <span class="w-11 h-11 sm:w-12 sm:h-12 rounded-2xl bg-gradient-to-br {{ $meta['iconBg'] }} text-white grid place-items-center shadow-lg shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">{!! $typeHeaderIcons[$type] ?? $typeHeaderIcons['general'] !!}</svg>
                                </span>
                                <div class="min-w-0">
                                    <div class="inline-flex items-center gap-2 text-[11px] tracking-[0.14em] font-bold text-slate-600 bg-white border border-slate-200 px-3 py-1 rounded-full">{{ strtoupper($meta['label']) }} • {{ $list->count() }} KATEGORI</div>
                                    <h2 class="text-[20px] sm:text-[22px] font-bold text-[#0B1D33] mt-2 leading-tight">{{ $meta['label'] }}</h2>
                                    <p class="text-sm text-slate-500 mt-1 leading-relaxed max-w-xl">{{ $meta['desc'] }}</p>
                                </div>
                            </div>
                            <span class="hidden sm:inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 bg-white border border-slate-200 px-3.5 py-2 rounded-full whitespace-nowrap">
                                <span class="w-2 h-2 rounded-full {{ $meta['accent'] }}"></span> {{ $totalType }} konten terhubung
                            </span>
                        </div>

                        {{-- Grid cards — jarak antar kartu lebih lega + bawah beri napas untuk header berikutnya --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-7 lg:gap-6 pb-2">
                            @foreach($list as $cat)
                                @php $total = $cat->services_count + $cat->portfolios_count + $cat->articles_count; $catIcon = $categoryIcons[$cat->slug] ?? $categoryIcons['default']; @endphp
                                <a href="{{ route('categories.show', $cat->slug) }}" class="group flex flex-col bg-white rounded-2xl border border-slate-200 hover:border-slate-300 hover:shadow-[0_8px_28px_-12px_rgba(15,42,74,0.15)] hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                                    {{-- Card top --}}
                                    <div class="p-5 sm:p-6 flex flex-col flex-1">
                                        <div class="flex items-start justify-between gap-3">
                                            <span class="w-11 h-11 rounded-xl bg-gradient-to-br {{ $meta['iconBg'] }} text-white grid place-items-center shadow-sm ring-1 ring-black/5">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">{!! $catIcon !!}</svg>
                                            </span>
                                            <span class="w-8 h-8 rounded-full bg-slate-50 border border-slate-200 grid place-items-center text-slate-400 group-hover:bg-[#0F2A4A] group-hover:text-white group-hover:border-[#0F2A4A] group-hover:rotate-45 transition-all duration-300 shrink-0">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7"/><path d="M8 7h9v9"/></svg>
                                            </span>
                                        </div>

                                        <h3 class="font-semibold text-[#0B1D33] mt-4 text-[15px] leading-tight line-clamp-2 group-hover:text-[#0F2A4A] transition">{{ $cat->name }}</h3>
                                        <p class="font-mono text-xs text-slate-400 mt-1 truncate">/{{ $cat->slug }}</p>

                                        <div class="mt-3 flex flex-wrap gap-1.5 min-h-[28px] content-start">
                                            @if($cat->services_count)<span class="inline-flex items-center text-[11px] font-semibold px-2.5 py-1 rounded-full bg-sky-50 text-sky-700 border border-sky-200">{{ $cat->services_count }} service</span>@endif
                                            @if($cat->portfolios_count)<span class="inline-flex items-center text-[11px] font-semibold px-2.5 py-1 rounded-full bg-violet-50 text-violet-700 border border-violet-200">{{ $cat->portfolios_count }} portfolio</span>@endif
                                            @if($cat->articles_count)<span class="inline-flex items-center text-[11px] font-semibold px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 border border-amber-200">{{ $cat->articles_count }} article</span>@endif
                                            @if($total==0)<span class="inline-flex items-center text-[11px] font-medium px-2.5 py-1 rounded-full bg-slate-100 text-slate-500 border border-slate-200">Belum dipakai</span>@endif
                                        </div>

                                        <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between gap-3">
                                            <span class="inline-flex items-center gap-2 text-xs font-semibold text-[#0B1D33]">
                                                Lihat kategori
                                                <span class="w-6 h-6 rounded-full bg-[#0F2A4A] text-white grid place-items-center group-hover:translate-x-0.5 transition">
                                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14"/><path d="M12 5l7 7-7 7"/></svg>
                                                </span>
                                            </span>
                                            <span class="text-[10px] tracking-[0.12em] font-bold text-slate-400">{{ $total }} KONTEN</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
            </div>

            {{-- Semua kategori grid kompak — jarak SANGAT lega dari grid di atas (fix dempet bawah) --}}
            <div class="mt-20 sm:mt-24 lg:mt-28 bg-white rounded-[20px] sm:rounded-[24px] border border-slate-200 p-6 sm:p-8 shadow-sm">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-3">
                    <div>
                        <h3 class="font-bold text-[#0B1D33] text-[16px]">Semua Kategori — akses cepat</h3>
                        <p class="text-sm text-slate-500 mt-1 leading-relaxed">Klik untuk lompat ke halaman detail kategori. Cocok untuk share link ke klien.</p>
                    </div>
                    <span class="hidden sm:inline-flex text-xs font-medium text-slate-400 bg-slate-50 border border-slate-200 px-3 py-1.5 rounded-full whitespace-nowrap">{{ $allCategories->count() }} kategori</span>
                </div>
                <div class="mt-5 flex flex-wrap gap-2">
                    @foreach($allCategories as $cat)
                        <a href="{{ route('categories.show', $cat->slug) }}" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-full bg-[#F8FAFC] border border-slate-200 text-sm font-medium text-slate-700 hover:bg-[#0F2A4A] hover:text-white hover:border-[#0F2A4A] hover:shadow-sm transition">
                            <span class="w-2 h-2 rounded-full shrink-0 {{ $cat->type=='portfolio' ? 'bg-violet-500' : ($cat->type=='service' ? 'bg-sky-500' : ($cat->type=='article' ? 'bg-amber-500' : 'bg-slate-400')) }}"></span>
                            <span class="truncate max-w-[14ch] sm:max-w-none">{{ $cat->name }}</span>
                            <span class="text-xs font-semibold opacity-60 bg-white/70 border border-slate-200 group-hover:bg-white/20 px-1.5 py-0.5 rounded-full">{{ $cat->services_count + $cat->portfolios_count + $cat->articles_count }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
