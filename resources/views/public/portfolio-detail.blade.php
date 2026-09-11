@extends('layouts.public')
@section('title', $portfolio->title)
@section('content')
{{-- HEADER — inspired Image 1: Structured. Automated. Delivered. — Rapi & Responsif, hanya bagian ini yang diubah --}}
<section class="bg-black text-white overflow-hidden">
    <div class="max-w-[1120px] mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 lg:py-10">
        {{-- Top bar: Kembali --}}
        <a href="{{ route('portfolio') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm text-white/50 hover:text-white transition">
            <span class="text-sm leading-none">←</span> Kembali ke Karya
        </a>

        {{-- Eyebrow + Heading Center seperti Image 1 --}}
        <div class="mt-6 sm:mt-8 text-center max-w-2xl mx-auto">
            <span class="inline-flex items-center px-2.5 py-1 rounded bg-white/10 border border-white/10 text-[10px] tracking-[0.14em] font-semibold text-white/60">OUR WORKS</span>
            <h1 class="mt-3 font-semibold tracking-tight leading-[0.95] text-[28px] sm:text-[36px] lg:text-[42px]">
                Terstruktur. Otomatis.<br>
                <span class="text-white">Siap Pakai.</span>
            </h1>
            <p class="mt-3 text-xs sm:text-sm leading-relaxed text-white/45 max-w-xl mx-auto">
                Transformasi workflow terpilih — website, branding, dan sistem internal oleh siswa SMK BPPI Baleendah.
            </p>
        </div>

        {{-- Stacked Card — Image kiri / Detail kanan — responsif --}}
        <div class="relative mt-8 sm:mt-10 lg:mt-12 max-w-[980px] mx-auto">
            {{-- layered cards behind (dekstop only) --}}
            <div class="hidden sm:block absolute inset-x-8 -top-3 h-6 bg-[#1a1a1e] rounded-t-xl border border-white/[0.06]"></div>
            <div class="hidden sm:block absolute inset-x-4 -top-1.5 h-6 bg-[#232326] rounded-t-xl border border-white/[0.08]"></div>

            @php
                $yearLabel = $portfolio->created_at ? $portfolio->created_at->format('Y') : date('Y');
                $clientLabel = $portfolio->client->name ?? $portfolio->client_name ?? 'SMK BPPI Baleendah';
                $techList = $portfolio->technology ? (is_array($portfolio->technology) ? $portfolio->technology : explode(',', $portfolio->technology)) : [];
                $techList = array_values(array_filter(array_map('trim', $techList)));
                $techCount = count($techList);
            @endphp

            <div class="relative bg-[#1E1E22] rounded-xl sm:rounded-2xl overflow-hidden border border-white/10 shadow-[0_24px_64px_-16px_rgba(0,0,0,0.7)] flex flex-col lg:flex-row">
                {{-- Left: Image --}}
                <div class="relative w-full lg:w-[52%] xl:w-[53%] bg-[#0f0f10] shrink-0 overflow-hidden">
                    @if($portfolio->featured_image)
                        <img src="{{ asset('storage/'.$portfolio->featured_image) }}" alt="{{ $portfolio->title }}" class="w-full h-[260px] sm:h-[340px] lg:h-full lg:min-h-[460px] object-cover">
                    @elseif($portfolio->images && $portfolio->images->count())
                        <img src="{{ asset('storage/'.$portfolio->images->first()->image) }}" alt="{{ $portfolio->title }}" class="w-full h-[260px] sm:h-[340px] lg:h-full lg:min-h-[460px] object-cover">
                    @else
                        <div class="w-full h-[260px] sm:h-[340px] lg:h-full lg:min-h-[460px] bg-gradient-to-br from-zinc-900 to-zinc-800 grid place-items-center">
                            <div class="text-center p-8">
                                <div class="w-14 h-14 rounded-2xl bg-white/10 border border-white/10 grid place-items-center mx-auto text-white/50 text-xl">◈</div>
                                <p class="text-sm text-white/40 mt-3">No Preview</p>
                            </div>
                        </div>
                    @endif
                    {{-- subtle gradient overlay bottom for depth (mobile) --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent pointer-events-none lg:hidden"></div>
                </div>

                {{-- Right: Content --}}
                <div class="flex-1 flex flex-col p-5 sm:p-7 lg:p-8 bg-[#1E1E22] min-w-0">
                    {{-- top meta --}}
                    <div class="flex items-center justify-between gap-3 text-[10px] tracking-[0.14em] font-semibold text-white/30 border-b border-white/10 pb-3 sm:pb-4">
                        <span>{{ $yearLabel }}&nbsp;&nbsp;•&nbsp;&nbsp;{{ strtoupper($clientLabel) }}</span>
                        @if($portfolio->is_featured)
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-amber-500 text-white text-[10px] tracking-wide font-bold leading-none">★ UNGGULAN</span>
                        @endif
                    </div>

                    {{-- client brand --}}
                    <div class="mt-4 sm:mt-5 flex items-center gap-2.5 min-w-0">
                        @if($portfolio->client && $portfolio->client->logo)
                            <img src="{{ asset('storage/'.$portfolio->client->logo) }}" alt="{{ $clientLabel }}" class="w-8 h-8 rounded-full object-contain bg-white p-1 shrink-0">
                        @else
                            <div class="w-8 h-8 rounded-full bg-white text-black grid place-items-center text-xs font-bold shrink-0">{{ strtoupper(substr($clientLabel,0,1)) }}</div>
                        @endif
                        <span class="font-semibold text-white text-sm sm:text-[15px] truncate">{{ $clientLabel }}</span>
                    </div>

                    {{-- Title --}}
                    <h2 class="mt-4 sm:mt-5 text-[22px] sm:text-[26px] lg:text-[30px] font-semibold leading-[0.95] tracking-tight text-white break-words">
                        {{ $portfolio->title }}
                    </h2>

                    {{-- Description excerpt --}}
                    <p class="mt-3 text-[13px] sm:text-[13.5px] leading-relaxed text-white/45 line-clamp-3 sm:line-clamp-none break-words">
                        {{ \Illuminate\Support\Str::limit(strip_tags($portfolio->description ?? ''), 140) ?: 'Karya nyata siswa SMK BPPI Baleendah — dikerjakan kolaboratif bersama mentor, rapi, responsif, dan siap pakai untuk kebutuhan UMKM & komunitas.' }}
                    </p>

                    {{-- badges teknologi (chips) --}}
                    @if($techCount)
                        <div class="mt-3 flex flex-wrap gap-1.5">
                            @foreach(array_slice($techList, 0, 4) as $tech)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-white/8 border border-white/10 text-[11px] font-medium text-white/70">{{ trim($tech) }}</span>
                            @endforeach
                            @if($techCount > 4)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-white/5 border border-white/10 text-[11px] text-white/40">+{{ $techCount - 4 }} lagi</span>
                            @endif
                        </div>
                    @endif

                    {{-- CTA --}}
                    <div class="mt-5 sm:mt-6">
                        <a href="#tentang-project" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full bg-white text-black text-xs sm:text-sm font-semibold hover:bg-zinc-100 transition">
                            View Case Study
                            <span class="w-6 h-6 rounded-full bg-black text-white grid place-items-center text-xs leading-none">→</span>
                        </a>
                    </div>

                    {{-- Stats — seperti Image 1: 2 kolom --}}
                    <div class="mt-6 sm:mt-auto pt-6 border-t border-white/10 grid grid-cols-2 gap-6">
                        <div>
                            <div class="text-[26px] sm:text-[30px] font-light leading-none tracking-tight text-white">{{ $techCount ? $techCount.'+' : 'Siap' }}</div>
                            <div class="mt-1.5 text-[10px] tracking-[0.14em] font-semibold text-white/30 leading-tight">{{ $techCount ? 'TEKNOLOGI DIGUNAKAN' : 'SIAP PAKAI & RAPI' }}</div>
                        </div>
                        <div>
                            <div class="text-[26px] sm:text-[30px] font-light leading-none tracking-tight text-white">{{ $portfolio->images ? $portfolio->images->count().'+' : $yearLabel }}</div>
                            <div class="mt-1.5 text-[10px] tracking-[0.14em] font-semibold text-white/30 leading-tight">{{ $portfolio->images && $portfolio->images->count() ? 'ASSETS / GALLERY' : 'TAHUN RILIS' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="tentang-project" class="py-6 sm:py-10 lg:py-12 bg-slate-50 scroll-mt-6">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-3 gap-6 lg:gap-8 items-start">
        {{-- Main content --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="h-1 w-full bg-gradient-to-r from-black via-sky-500 to-amber-400"></div>
                <div class="p-5 sm:p-6 lg:p-8">
                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="hidden sm:grid w-11 h-11 rounded-xl bg-gradient-to-br from-black to-sky-600 text-white place-items-center shrink-0 text-[18px] shadow-md border border-white/10">✦</div>
                        <div class="min-w-0 flex-1">
                            <h2 class="font-bold text-[#0B1D33] text-[16px] sm:text-lg leading-tight">Tentang Project Ini</h2>
                            <p class="text-xs sm:text-sm text-slate-500 mt-1">Dikerjakan siswa SMK BPPI Baleendah — kolaborasi tim & mentor</p>
                        </div>
                        @if($portfolio->is_featured)
                            <span class="hidden sm:inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-gradient-to-r from-amber-400 to-orange-400 text-white border border-amber-300 text-[11px] font-bold tracking-wide whitespace-nowrap shrink-0 shadow-sm">★ UNGGULAN</span>
                        @endif
                    </div>

                    <div class="mt-5">
                        <p class="text-slate-600 leading-relaxed whitespace-pre-line text-[14px] sm:text-[15px] break-words">{{ $portfolio->description }}</p>
                    </div>

                    @php
                        $details = [
                            'challenge' => ['label'=>'Challenge','icon'=>'🎯','num'=>'01','desc'=>'Tantangan yang dihadapi','bg'=>'bg-amber-50/60','border'=>'border-amber-100','borderLeft'=>'border-l-amber-400','iconBg'=>'bg-amber-100','iconBorder'=>'border-amber-200','numColor'=>'text-amber-600'],
                            'solution' => ['label'=>'Solution','icon'=>'💡','num'=>'02','desc'=>'Ide & pendekatan','bg'=>'bg-emerald-50/60','border'=>'border-emerald-100','borderLeft'=>'border-l-emerald-400','iconBg'=>'bg-emerald-100','iconBorder'=>'border-emerald-200','numColor'=>'text-emerald-600'],
                            'process' => ['label'=>'Process','icon'=>'⚙️','num'=>'03','desc'=>'Alur pengerjaan','bg'=>'bg-sky-50/60','border'=>'border-sky-100','borderLeft'=>'border-l-sky-400','iconBg'=>'bg-sky-100','iconBorder'=>'border-sky-200','numColor'=>'text-sky-600'],
                            'result' => ['label'=>'Result','icon'=>'🏆','num'=>'04','desc'=>'Hasil akhir','bg'=>'bg-violet-50/60','border'=>'border-violet-100','borderLeft'=>'border-l-violet-400','iconBg'=>'bg-violet-100','iconBorder'=>'border-violet-200','numColor'=>'text-violet-600'],
                        ];
                        $hasDetails = collect(array_keys($details))->contains(fn($k) => !empty($portfolio->$k));
                    @endphp
                    @if($hasDetails)
                    <div class="mt-7 sm:mt-8 pt-6 sm:pt-7 border-t border-slate-100">
                        <div class="grid gap-3.5 sm:gap-4">
                            @foreach($details as $key => $meta)
                                @if(!empty($portfolio->$key))
                                <div class="group relative rounded-xl sm:rounded-2xl border {{ $meta['border'] }} {{ $meta['bg'] }} border-l-4 {{ $meta['borderLeft'] }} p-4 sm:p-5 hover:bg-white hover:shadow-sm hover:-translate-y-0.5 transition-all">
                                    <div class="flex items-start gap-3">
                                        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl {{ $meta['iconBg'] }} {{ $meta['iconBorder'] }} border shadow-sm grid place-items-center text-[16px] sm:text-[18px] shrink-0 group-hover:scale-105 transition-transform">{{ $meta['icon'] }}</div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center gap-2 flex-wrap">
                                                <h3 class="font-bold text-[#0B1D33] text-sm sm:text-[15px] leading-none">{{ $meta['label'] }}</h3>
                                                <span class="text-[10px] font-bold tracking-widest {{ $meta['numColor'] }} bg-white px-1.5 py-0.5 rounded border {{ $meta['border'] }}">{{ $meta['num'] }}</span>
                                                <span class="hidden sm:inline text-slate-300">•</span>
                                                <span class="hidden sm:inline text-xs text-slate-500">{{ $meta['desc'] }}</span>
                                            </div>
                                            <p class="text-slate-600 mt-2 whitespace-pre-line text-[13.5px] sm:text-sm leading-relaxed break-words">{{ $portfolio->$key }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-4 sm:space-y-6 lg:sticky lg:top-6">
            {{-- CTA Card --}}
            <div class="relative overflow-hidden bg-gradient-to-br from-black via-[#12365f] to-black rounded-2xl p-5 sm:p-6 text-white shadow-lg border border-white/10">
                <div class="absolute -top-10 -right-10 w-36 h-36 bg-sky-400/20 rounded-full blur-2xl"></div>
                <div class="absolute -bottom-10 -left-10 w-28 h-28 bg-amber-400/15 rounded-full blur-2xl"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-48 h-48 bg-white/[0.03] rounded-full blur-3xl"></div>
                <div class="relative">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-400 to-orange-500 grid place-items-center text-lg shadow-md border border-white/20">💬</div>
                    <h3 class="font-bold text-[16px] sm:text-[18px] mt-3 leading-tight">Mau project serupa?</h3>
                    <p class="text-white/75 text-[13px] sm:text-sm mt-2 leading-relaxed">Tim siswa SMK BPPI Baleendah siap bantu wujudkan — konsultasi dulu gratis, no hard selling.</p>
                    <a href="{{ route('contact') }}" class="mt-5 flex items-center justify-center gap-2 w-full py-3 sm:py-3.5 rounded-xl bg-white text-[#0B1D33] font-bold text-sm sm:text-[15px] shadow-md hover:bg-amber-50 hover:text-amber-900 active:scale-[0.98] transition-all">
                        Konsultasi Gratis
                        <span class="text-base leading-none">→</span>
                    </a>
                    <p class="text-center text-[11px] text-white/50 mt-2.5">Respon cepat • Estimasi gratis ✨</p>
                </div>
            </div>

            {{-- Info Project Card --}}
            <div class="bg-white border border-slate-200 shadow-sm rounded-2xl overflow-hidden">
                <div class="h-1 w-full bg-gradient-to-r from-sky-400 via-violet-400 to-amber-400"></div>
                <div class="px-5 sm:px-6 pt-5 sm:pt-6 pb-4 bg-gradient-to-r from-sky-50/50 via-transparent to-violet-50/30">
                    <h4 class="font-bold text-[#0B1D33] text-sm flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-gradient-to-br from-sky-500 to-violet-500 text-white grid place-items-center text-xs shadow-sm">≡</span>
                        Info Project
                    </h4>
                </div>
                <dl class="px-5 sm:px-6 pb-5 sm:pb-6 space-y-0 text-sm divide-y divide-slate-100 border-t border-slate-100">
                    <div class="flex justify-between gap-4 py-3.5 group hover:bg-sky-50/40 -mx-2 px-2 rounded-lg transition-colors">
                        <dt class="text-slate-500 flex items-center gap-2 text-[13px] sm:text-sm shrink-0"><span class="w-6 h-6 rounded-md bg-sky-100 border border-sky-200 text-sky-600 grid place-items-center text-xs">👤</span> Client</dt>
                        <dd class="font-semibold text-[#0B1D33] text-right break-words text-[13px] sm:text-sm max-w-[60%]">{{ $portfolio->client_name ?? $portfolio->client?->name ?? '-' }}</dd>
                    </div>
                    <div class="flex justify-between gap-4 py-3.5 group hover:bg-emerald-50/40 -mx-2 px-2 rounded-lg transition-colors">
                        <dt class="text-slate-500 flex items-center gap-2 text-[13px] sm:text-sm shrink-0"><span class="w-6 h-6 rounded-md bg-emerald-100 border border-emerald-200 text-emerald-600 grid place-items-center text-xs">●</span> Status</dt>
                        <dd class="font-semibold text-right">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold shadow-sm {{ $portfolio->status === 'published' ? 'bg-emerald-500 text-white border border-emerald-600' : 'bg-slate-100 text-slate-600 border border-slate-200' }}">{{ ucfirst($portfolio->status) }}</span>
                        </dd>
                    </div>
                    @if($portfolio->technology)
                    <div class="py-3.5">
                        <dt class="text-slate-500 flex items-center gap-2 text-[13px] sm:text-sm mb-2.5"><span class="w-6 h-6 rounded-md bg-amber-100 border border-amber-200 text-amber-600 grid place-items-center text-xs">⚡</span> Teknologi</dt>
                        <dd class="flex flex-wrap gap-1.5">
                            @php
                                $techColors = [
                                    'bg-slate-900 text-white border-slate-800',
                                    'bg-sky-500 text-white border-sky-600',
                                    'bg-violet-500 text-white border-violet-600',
                                    'bg-amber-500 text-white border-amber-600',
                                    'bg-emerald-500 text-white border-emerald-600',
                                ];
                            @endphp
                            @foreach((is_array($portfolio->technology) ? $portfolio->technology : explode(',', $portfolio->technology)) as $i => $tech)
                                <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-semibold leading-none border shadow-sm {{ $techColors[$i % count($techColors)] }}">{{ trim($tech) }}</span>
                            @endforeach
                        </dd>
                    </div>
                    @endif
                    @if($portfolio->category)
                    <div class="flex justify-between gap-4 py-3.5 group hover:bg-violet-50/40 -mx-2 px-2 rounded-lg transition-colors">
                        <dt class="text-slate-500 flex items-center gap-2 text-[13px] sm:text-sm shrink-0"><span class="w-6 h-6 rounded-md bg-violet-100 border border-violet-200 text-violet-600 grid place-items-center text-xs">📁</span> Kategori</dt>
                        <dd class="font-medium text-[#0B1D33] text-right text-[13px] sm:text-sm">{{ $portfolio->category->name }}</dd>
                    </div>
                    @endif
                </dl>
            </div>
        </div>
    </div>

    {{-- Gallery --}}
    @if($portfolio->images->count())
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 mt-6 sm:mt-8">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="h-1 w-full bg-gradient-to-r from-violet-400 via-sky-400 to-amber-400"></div>
            <div class="px-4 sm:px-6 py-4 sm:py-5 border-b border-slate-100 flex items-center justify-between gap-4 bg-gradient-to-r from-violet-50/60 via-transparent to-amber-50/40">
                <h3 class="font-bold text-[#0B1D33] text-sm sm:text-base flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-violet-500 to-sky-500 text-white grid place-items-center text-sm shadow-sm">🖼️</span>
                    Gallery
                </h3>
                <span class="text-xs font-bold px-3 py-1.5 rounded-full bg-gradient-to-r from-violet-500 to-sky-500 text-white border border-violet-400 shadow-sm">{{ $portfolio->images->count() }} foto</span>
            </div>
            <div class="p-3 sm:p-4 lg:p-6 bg-slate-50/30">
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4">
                    @foreach($portfolio->images as $img)
                        <div class="group relative overflow-hidden rounded-xl bg-white border border-slate-200 aspect-[4/3] shadow-sm hover:shadow-md hover:border-sky-200 transition-all">
                            <img src="{{ asset('storage/'.$img->image) }}" alt="Gallery" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="absolute bottom-2 right-2 w-6 h-6 rounded-full bg-white/90 backdrop-blur grid place-items-center text-[10px] opacity-0 group-hover:opacity-100 transition-opacity shadow-sm">↗</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection
