@extends('layouts.public')
@section('title', $portfolio->title)
@section('content')
<section class="bg-slate-900 text-white overflow-hidden">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <a href="{{ route('portfolio') }}" class="inline-flex items-center text-sm text-white/60 hover:text-white transition">← Kembali ke Karya</a>
        <div class="mt-4 flex flex-wrap gap-2 gap-y-2.5 items-center max-w-full">
            <span class="inline-flex items-center justify-center px-3.5 py-1.5 rounded-full bg-white/15 backdrop-blur text-xs sm:text-sm font-medium leading-none whitespace-nowrap max-w-full truncate">{{ $portfolio->client->name ?? $portfolio->client_name ?? 'Klien Kami' }}</span>
            @if($portfolio->is_featured)
                <span class="inline-flex items-center justify-center gap-1 px-3.5 py-1.5 rounded-full bg-amber-500 text-white text-xs sm:text-sm font-semibold leading-none whitespace-nowrap shrink-0">★ Karya Unggulan</span>
            @endif
            <span class="inline-flex items-center justify-center px-3.5 py-1.5 rounded-full bg-white/10 text-[11px] sm:text-xs font-medium leading-tight text-center break-words max-w-full">SMK BPPI Baleendah • Unit Produksi PPLG</span>
        </div>
        <h1 class="text-[22px] xs:text-2xl sm:text-3xl lg:text-4xl font-bold mt-4 leading-tight break-words">{{ $portfolio->title }}</h1>
        <p class="text-white/60 mt-2 text-sm sm:text-base leading-relaxed break-words">{{ $portfolio->client_name ?? $portfolio->client?->name ?? 'Kolaborasi Siswa' }} @if($portfolio->technology) • {{ is_array($portfolio->technology) ? implode(', ', $portfolio->technology) : $portfolio->technology }} @endif</p>
    </div>
</section>
@if($portfolio->featured_image)
<section><img src="{{ asset('storage/'.$portfolio->featured_image) }}" class="w-full h-[220px] sm:h-[340px] lg:h-[420px] object-cover"></section>
@endif
<section class="py-6 sm:py-10 lg:py-12 bg-slate-50">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-3 gap-6 lg:gap-8 items-start">
        {{-- Main content --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="h-1 w-full bg-gradient-to-r from-[#0F2A4A] via-sky-500 to-amber-400"></div>
                <div class="p-5 sm:p-6 lg:p-8">
                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="hidden sm:grid w-11 h-11 rounded-xl bg-gradient-to-br from-[#0F2A4A] to-sky-600 text-white place-items-center shrink-0 text-[18px] shadow-md border border-white/10">✦</div>
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
            <div class="relative overflow-hidden bg-gradient-to-br from-[#0F2A4A] via-[#12365f] to-[#0F2A4A] rounded-2xl p-5 sm:p-6 text-white shadow-lg border border-white/10">
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
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0F2A4A]/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
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
