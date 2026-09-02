@extends('layouts.public')
@section('title','SM STUDIO — Unit Produksi PPLG SMK BPPI Baleendah')
@section('content')
{{-- HERO --}}
<section id="home" class="scroll-mt-20 relative overflow-hidden bg-[#0B1D33] text-white">
    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 32px 32px;"></div>
    <div class="absolute -right-32 -top-32 w-[520px] h-[520px] rounded-full bg-[#1A3A5C]/40 blur-3xl"></div>
    <div class="absolute -left-20 bottom-0 w-[420px] h-[420px] rounded-full bg-[#0F2440]/60 blur-3xl"></div>
    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-16 lg:py-24">
        <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 items-center">
            <div>
                <span class="inline-flex items-center gap-2 bg-white/10 border border-white/15 text-white/90 px-4 py-1.5 rounded-full text-xs font-semibold tracking-widest">SMK BPPI BALEENDAH • Unit Produksi PPLG</span>
                <h1 class="mt-6 font-display font-bold text-[32px] sm:text-[40px] lg:text-[52px] leading-[0.92] tracking-tight">Dibangun Siswa SMK.<br><span class="text-[#93C5FD]">Siap untuk Kebutuhan Digital Anda.</span></h1>
                <p class="mt-4 sm:mt-5 text-sm sm:text-[15px] text-white/70 leading-relaxed max-w-xl">SM STUDIO adalah studio digital dari <span class="text-white font-semibold">SMK BPPI Baleendah</span>. Kami belajar lewat project nyata — bikin website, branding, dan solusi digital yang cepat, rapi, dan siap pakai untuk UMKM, sekolah, komunitas, dan bisnis yang mau tumbuh.</p>
                <div class="mt-6 sm:mt-8 flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                    <a href="{{ route('contact') }}" class="px-7 py-3.5 rounded-full bg-white text-[#0B1D33] font-semibold text-sm hover:bg-slate-100 transition text-center shadow-lg">Konsultasi Gratis — Mulai Project</a>
                    <a href="#portfolio" class="px-7 py-3.5 rounded-full bg-white/10 border border-white/20 text-white font-semibold text-sm hover:bg-white/15 text-center backdrop-blur">Lihat Karya Nyata</a>
                </div>
                <div class="mt-10 flex flex-wrap items-center gap-6 text-sm">
                    <div class="flex -space-x-2"><img src="https://i.pravatar.cc/100?img=8" class="w-8 h-8 rounded-full border-2 border-[#0B1D33]"><img src="https://i.pravatar.cc/100?img=12" class="w-8 h-8 rounded-full border-2 border-[#0B1D33]"><img src="https://i.pravatar.cc/100?img=22" class="w-8 h-8 rounded-full border-2 border-[#0B1D33]"></div>
                    <div><div class="font-semibold">Project nyata, dibimbing mentor</div><div class="text-white/60 text-xs">Kolaborasi siswa + guru + partner</div></div>
                    <div class="hidden sm:block h-8 w-px bg-white/20"></div>
                    <div class="hidden sm:block"><div class="font-semibold">Respon cepat & transparan</div><div class="text-white/60 text-xs">Proses jelas, hasil siap pakai</div></div>
                </div>
            </div>
            <div class="relative">
                <div class="bg-white rounded-[24px] sm:rounded-[28px] p-2.5 sm:p-3 shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&q=80" alt="hero" class="rounded-[16px] sm:rounded-[20px] w-full h-[280px] sm:h-[360px] lg:h-[420px] object-cover">
                    <div class="absolute -bottom-6 -left-6 bg-white rounded-2xl shadow-xl p-5 border border-slate-100 max-w-[280px] hidden sm:block">
                        <div class="flex items-center gap-3"><span class="w-10 h-10 rounded-xl bg-emerald-500 text-white grid place-items-center">✓</span><div><div class="font-bold text-[#0B1D33] text-sm">Project Selesai ✓</div><div class="text-xs text-slate-500">Website profil UMKM — dikerjakan tim siswa, review bareng guru.</div></div></div>
                    </div>
                    <div class="absolute -top-4 -right-4 bg-[#0F2A4A] text-white rounded-2xl px-5 py-4 shadow-xl hidden sm:block">
                        <div class="text-xs text-white/70">Karya Terbaru</div><div class="font-bold">SMK BPPI • Web & Branding</div><div class="text-xs text-white/60">Siswa + Mentor — siap pakai</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ABOUT PREVIEW — tampil di Home agar bisa scroll, tetap ada halaman /about penuh --}}
<section id="about" class="scroll-mt-20 py-12 sm:py-16 lg:py-20 bg-[#F8FAFC]/50 border-y border-slate-100">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-start gap-6 lg:gap-10 xl:gap-14">
            <span class="lg:hidden inline-flex self-start items-center justify-center text-[11px] font-extrabold tracking-[0.14em] text-[#0F2A4A] bg-white border-2 border-[#BFDBFE] px-4 py-2 rounded-full">TENTANG KAMI</span>
        </div>
        <div class="grid lg:grid-cols-2 gap-8 sm:gap-10 lg:gap-14 items-start">
            <div class="min-w-0">
                <span class="hidden lg:inline-flex items-center justify-center text-xs font-extrabold tracking-[0.14em] text-[#0F2A4A] bg-white border-2 border-[#BFDBFE] px-5 py-2.5 rounded-full">TENTANG KAMI</span>
                <h2 class="mt-3 text-2xl sm:text-3xl lg:text-[32px] font-display font-extrabold leading-[1.1] tracking-tight text-[#0B1D33]">Karya siswa SMK<br class="hidden sm:block">yang profesional & berdampak.</h2>
                <p class="mt-4 text-sm sm:text-[15px] leading-7 text-slate-600">Kami hadir untuk membuktikan bahwa <span class="font-semibold text-[#0B1D33]">karya siswa SMK juga bisa profesional, relevan, dan berdampak nyata</span>. SM STUDIO adalah wadah Unit Produksi PPLG — belajar lewat project nyata, kolaborasi tim, didampingi mentor.</p>
                <div class="mt-6 relative overflow-hidden rounded-[20px] bg-gradient-to-br from-[#0F2A4A] via-[#0F2A4A] to-[#162F4A] p-6 text-white border border-white/10">
                    <div class="absolute -right-10 -top-10 w-40 h-40 rounded-full bg-[#93C5FD]/15 blur-2xl"></div>
                    <div class="flex items-start gap-4 relative"><span class="w-10 h-10 rounded-xl bg-white text-[#0F2A4A] grid place-items-center shrink-0">◎</span><div><div class="text-[11px] tracking-[0.16em] font-bold text-white/60">VISI KAMI</div><p class="mt-2 text-sm leading-relaxed text-white/90">Menjadi <span class="font-semibold text-white">student-led digital studio</span> yang dipercaya UMKM, sekolah, dan bisnis lokal — <span class="font-semibold text-white">kolaboratif, profesional, siap pakai.</span></p></div></div>
                </div>
                <div class="mt-4 flex flex-wrap gap-3">
                    <a href="#portfolio" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-[#0F2A4A] text-white text-sm font-semibold hover:bg-[#162F4A] transition">Lihat karya nyata →</a>
                    <a href="#services" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-white border border-slate-200 text-[#0B1D33] text-sm font-semibold hover:bg-slate-50">Lihat layanan</a>
                </div>
            </div>
            <div class="space-y-4 min-w-0">
                <div class="relative overflow-hidden rounded-[20px] sm:rounded-[24px] border border-slate-200 bg-white p-1.5 sm:p-2 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&q=80" alt="Tim SM Studio" class="rounded-[14px] sm:rounded-[16px] w-full h-[260px] sm:h-[340px] object-cover">
                    <div class="absolute bottom-3 left-3 right-3 sm:bottom-4 sm:left-4 sm:right-4 bg-white/95 backdrop-blur border border-slate-200 rounded-2xl p-3 sm:p-4 shadow-lg flex items-center gap-3">
                        <span class="w-9 h-9 rounded-xl bg-emerald-500 text-white grid place-items-center shrink-0">✓</span>
                        <div class="min-w-0 leading-tight"><div class="text-sm font-bold text-[#0B1D33]">Kolaborasi siswa + mentor</div><div class="text-xs text-slate-500">Review bareng, hasil tetap profesional</div></div>
                        <span class="ml-auto hidden sm:inline-flex text-[11px] font-semibold tracking-widest text-emerald-700 bg-emerald-50 border border-emerald-200 px-2.5 py-1 rounded-full">SIAP PAKAI</span>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-3 text-center">
                    @foreach([['v'=>'Siswa','l'=>'Unit Produksi PPLG'],['v'=>'30+','l'=>'Project nyata'],['v'=>'Siap','l'=>'Pakai & rapi']] as $s)
                        <div class="bg-white border border-slate-200 rounded-2xl p-3.5 sm:p-5"><div class="text-base sm:text-lg font-bold text-[#0F2A4A] leading-none">{{ $s['v'] }}</div><div class="text-[10px] sm:text-xs text-slate-500 mt-1.5 leading-tight">{{ $s['l'] }}</div></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- LOGOS / CLIENTS — ada warnanya dikit (pastel per client) --}}
<section id="clients" class="scroll-mt-20 py-10 sm:py-12 border-y border-[#E2E8F0] bg-gradient-to-r from-[#EFF6FF]/70 via-[#F8FAFC] to-[#DBEAFE]/30 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-10 -right-10 w-40 h-40 rounded-full bg-[#93C5FD]/20 blur-2xl hidden sm:block"></div>
        <div class="absolute -bottom-10 -left-10 w-32 h-32 rounded-full bg-[#C5A880]/15 blur-2xl hidden sm:block"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[120px] bg-[#0F2A4A]/[0.02] rounded-full blur-3xl pointer-events-none"></div>
    </div>
    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-center gap-3">
            <span class="h-px w-8 sm:w-12 bg-[#BFDBFE] hidden sm:block"></span>
            <div class="text-center text-xs tracking-[0.18em] font-semibold text-[#0F2A4A] bg-white border border-[#BFDBFE]/50 px-3 py-1 rounded-full shadow-sm">KOLABORASI NYATA — DARI KELAS KE PROJECT</div>
            <span class="h-px w-8 sm:w-12 bg-[#BFDBFE] hidden sm:block"></span>
        </div>
        @if(isset($clients) && $clients->count())
            <div class="mt-6 flex flex-wrap justify-center items-center gap-3 md:gap-4">
                @foreach($clients as $client)
                    @php
                        $hue = abs(crc32($client->name . ($client->industry ?? ''))) % 360;
                        $bg = "hsl($hue 85% 96%)";
                        $bd = "hsl($hue 60% 86%)";
                        $txt = "hsl($hue 50% 28%)";
                    @endphp
                    @if($client->logo)
                        <div class="flex items-center gap-2 px-3 py-2 rounded-full border shadow-sm bg-white hover:shadow-md transition" style="background: {{ $bg }}; border-color: {{ $bd }};" title="{{ $client->name }} — {{ $client->industry ?? '' }}">
                            <img src="{{ asset('storage/'.$client->logo) }}" alt="{{ $client->name }}" class="h-6 w-auto object-contain">
                            <span class="text-xs font-bold tracking-widest" style="color: {{ $txt }}">{{ strtoupper(Str::limit($client->name, 12)) }}</span>
                        </div>
                    @else
                        <span class="font-bold tracking-widest text-xs border px-4 py-2 rounded-full shadow-sm hover:shadow-md hover:-translate-y-0.5 transition" style="background: {{ $bg }}; border-color: {{ $bd }}; color: {{ $txt }}">{{ strtoupper($client->name) }}</span>
                    @endif
                @endforeach
            </div>
        @else
            <div class="mt-6 flex flex-wrap justify-center gap-3 opacity-60">
                <span class="text-xs text-slate-500 border border-dashed border-[#BFDBFE] bg-white px-4 py-2 rounded-full">Belum ada klien — tambah di /admin/clients</span>
            </div>
        @endif
    </div>
</section>

{{-- SERVICES PREVIEW --}}
<section id="services" class="scroll-mt-20 py-12 sm:py-16 lg:py-20 bg-gradient-to-b from-white via-[#F8FAFC] to-white relative overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-[#0F2A4A]/[0.03] rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-[#C5A880]/10 rounded-full blur-3xl pointer-events-none hidden lg:block"></div>
    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-start gap-5 lg:gap-10 xl:gap-14">
            <div class="flex-shrink-0"><span class="inline-flex items-center gap-2 text-xs tracking-widest font-semibold text-[#0F2A4A] bg-[#EFF6FF] px-3 py-1 rounded-full border border-[#BFDBFE]">APA YANG KAMI BANTU</span><h2 class="mt-3 text-2xl sm:text-3xl font-bold text-[#0B1D33] leading-tight">Kebutuhan Digital<br class="hidden sm:block">yang Siap Pakai.</h2></div>
            <p class="text-sm sm:text-[15px] text-slate-500 max-w-[520px] lg:max-w-[440px] xl:max-w-[480px] leading-relaxed lg:pt-[18px] lg:ml-2">Butuh website, branding, atau konten? Tim siswa SMK BPPI Baleendah siap bantu — kreatif, kolaboratif, dan dibimbing mentor biar hasilnya rapi & profesional.</p>
        </div>
        @php
            $cardStyles = [
                ['icon'=>'💻','grad'=>'from-[#EFF6FF] via-[#F8FAFC] to-white','border'=>'border-[#BFDBFE]/50','iconBg'=>'from-[#0F2A4A] via-[#1A4B7A] to-[#2563EB]','blob'=>'bg-blue-500/10'],
                ['icon'=>'🎨','grad'=>'from-violet-50 via-white to-white','border'=>'border-violet-200/40','iconBg'=>'from-violet-600 to-indigo-600','blob'=>'bg-violet-500/10'],
                ['icon'=>'📈','grad'=>'from-emerald-50/70 via-white to-white','border'=>'border-emerald-200/40','iconBg'=>'from-emerald-600 to-teal-600','blob'=>'bg-emerald-500/10'],
            ];
        @endphp
        <div class="mt-8 sm:mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
            @if(isset($services) && $services->count())
                @foreach($services as $idx=>$svc)
                @php $st = $cardStyles[$idx % count($cardStyles)]; @endphp
                <div class="group relative flex flex-col overflow-hidden rounded-[24px] border {{ $st['border'] }} bg-gradient-to-br {{ $st['grad'] }} p-[1.2px] hover:shadow-[0_12px_32px_-12px_rgba(15,42,74,0.18)] hover:-translate-y-1.5 transition-all duration-300">
                    <div class="relative flex flex-col h-full rounded-[22px] bg-gradient-to-br {{ $st['grad'] }} p-6 sm:p-7 overflow-hidden">
                        <span class="absolute top-5 right-6 font-display font-extrabold text-[44px] leading-none tracking-tight text-slate-900/[0.035] group-hover:text-slate-900/[0.06] transition select-none">{{ str_pad($idx+1, 2, '0', STR_PAD_LEFT) }}</span>
                        <div class="absolute -top-10 -right-10 w-36 h-36 rounded-full {{ $st['blob'] }} blur-2xl group-hover:scale-110 transition duration-500"></div>
                        <div class="relative flex items-start justify-between">
                            <span class="w-[52px] h-[52px] rounded-2xl bg-gradient-to-br {{ $st['iconBg'] }} text-white grid place-items-center text-[20px] shadow-lg shadow-slate-900/10 ring-1 ring-white/20 group-hover:scale-105 group-hover:rotate-[-2deg] transition duration-300">{{ $svc->icon ?? $st['icon'] }}</span>
                            <span class="w-9 h-9 rounded-full bg-white border border-slate-200 grid place-items-center text-slate-400 group-hover:bg-[#0F2A4A] group-hover:text-white group-hover:border-[#0F2A4A] group-hover:rotate-45 transition-all duration-300 shadow-sm">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7"/><path d="M8 7h9v9"/></svg>
                            </span>
                        </div>
                        <h3 class="relative font-semibold text-[17px] leading-tight text-[#0B1D33] mt-5 group-hover:text-[#0F2A4A] transition">{{ $svc->title }}</h3>
                        <p class="relative text-[13.5px] leading-relaxed text-slate-500 mt-2.5 line-clamp-3">{{ $svc->description }}</p>
                        <div class="relative mt-4 inline-flex items-center gap-1.5 text-[11px] font-medium tracking-wide text-slate-500 bg-white/70 border border-slate-200/60 px-2.5 py-1 rounded-full">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Siap pakai & dibimbing mentor
                        </div>
                        <div class="relative mt-6 pt-5 border-t border-slate-200/60 flex items-center justify-between gap-3">
                            <a href="{{ route('services.show', $svc->slug) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-[#0F2A4A] group/link">
                                <span class="relative">Lihat layanan <span class="absolute -bottom-1 left-0 w-0 h-px bg-[#0F2A4A] group-hover/link:w-full transition-all duration-300"></span></span>
                                <span class="w-7 h-7 rounded-full bg-[#0F2A4A] text-white grid place-items-center text-xs group-hover/link:translate-x-0.5 transition">→</span>
                            </a>
                            <span class="hidden sm:inline text-[10px] tracking-[0.14em] font-bold text-slate-400">SMK BPPI</span>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                @foreach([
                    ['icon'=>'🎨','title'=>'Branding & Desain','desc'=>'Logo, visual, dan guideline yang bikin brand kamu lebih kebentuk — bukan sekadar bagus.'],
                    ['icon'=>'💻','title'=>'Website Siap Pakai','desc'=>'Website cepat, responsif, SEO-ready. Dari profil usaha sampai landing page yang konversi.'],
                    ['icon'=>'📈','title'=>'Konten & Digital','desc'=>'Konten, sosial media, dan strategi simple yang bantu kamu lebih kelihatan dan dipercaya.'],
                ] as $idx=>$s)
                @php $st = $cardStyles[$idx % count($cardStyles)]; @endphp
                <div class="group relative flex flex-col overflow-hidden rounded-[24px] border {{ $st['border'] }} bg-gradient-to-br {{ $st['grad'] }} p-[1.2px] hover:shadow-[0_12px_32px_-12px_rgba(15,42,74,0.18)] hover:-translate-y-1.5 transition-all duration-300">
                    <div class="relative flex flex-col h-full rounded-[22px] bg-gradient-to-br {{ $st['grad'] }} p-6 sm:p-7 overflow-hidden">
                        <span class="absolute top-5 right-6 font-display font-extrabold text-[44px] leading-none tracking-tight text-slate-900/[0.035] group-hover:text-slate-900/[0.06] transition select-none">{{ str_pad($idx+1, 2, '0', STR_PAD_LEFT) }}</span>
                        <div class="absolute -top-10 -right-10 w-36 h-36 rounded-full {{ $st['blob'] }} blur-2xl group-hover:scale-110 transition duration-500"></div>
                        <div class="relative flex items-start justify-between">
                            <span class="w-[52px] h-[52px] rounded-2xl bg-gradient-to-br {{ $st['iconBg'] }} text-white grid place-items-center text-[20px] shadow-lg shadow-slate-900/10 ring-1 ring-white/20 group-hover:scale-105 group-hover:rotate-[-2deg] transition duration-300">{{ $s['icon'] }}</span>
                            <span class="w-9 h-9 rounded-full bg-white border border-slate-200 grid place-items-center text-slate-400 group-hover:bg-[#0F2A4A] group-hover:text-white group-hover:border-[#0F2A4A] group-hover:rotate-45 transition-all duration-300 shadow-sm">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7"/><path d="M8 7h9v9"/></svg>
                            </span>
                        </div>
                        <h3 class="relative font-semibold text-[17px] leading-tight text-[#0B1D33] mt-5 group-hover:text-[#0F2A4A] transition">{{ $s['title'] }}</h3>
                        <p class="relative text-[13.5px] leading-relaxed text-slate-500 mt-2">{{ $s['desc'] }}</p>
                        <div class="relative mt-6 pt-5 border-t border-slate-200/60 flex items-center justify-between">
                            <a href="{{ route('services') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-[#0F2A4A] group/link">
                                <span class="relative">Lihat detail <span class="absolute -bottom-1 left-0 w-0 h-px bg-[#0F2A4A] group-hover/link:w-full transition-all duration-300"></span></span>
                                <span class="w-7 h-7 rounded-full bg-[#0F2A4A] text-white grid place-items-center text-xs group-hover/link:translate-x-0.5 transition">→</span>
                            </a>
                            <span class="text-[10px] tracking-[0.14em] font-bold text-slate-400">SMK BPPI</span>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

{{-- PORTFOLIO PREVIEW — sedikit warna biar tidak flat (tetap ada Lihat semua) --}}
<section id="portfolio" class="scroll-mt-20 py-12 sm:py-16 lg:py-20 bg-gradient-to-b from-white via-[#F8FAFC] to-white border-y border-slate-100 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[500px] h-[300px] bg-[#EFF6FF]/40 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-72 h-72 bg-[#DBEAFE]/25 rounded-full blur-3xl pointer-events-none hidden lg:block"></div>
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <span class="inline-flex items-center gap-2 text-xs tracking-widest font-semibold text-[#0F2A4A] bg-[#EFF6FF] px-3 py-1 rounded-full border border-[#BFDBFE]">PORTFOLIO • KARYA NYATA</span>
                <h2 class="mt-3 text-2xl sm:text-3xl font-bold text-[#0B1D33] leading-tight">Karya Nyata, Hasil Siap Pakai.</h2>
                <p class="text-sm sm:text-[15px] text-slate-500 mt-2 max-w-xl">Kumpulan project beneran siswa SMK BPPI Baleendah — website, branding, dan konten untuk UMKM & komunitas.</p>
            </div>
            <a href="{{ route('portfolio') }}" class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-white border border-[#BFDBFE] text-sm font-semibold text-[#0F2A4A] hover:bg-[#EFF6FF] hover:border-[#93C5FD] transition shrink-0 shadow-sm">Lihat semua portfolio →</a>
        </div>
        @php
            $pfStyles = [
                ['grad'=>'from-[#EFF6FF] via-[#F8FAFC] to-white','border'=>'border-[#BFDBFE]/50','blob'=>'bg-blue-500/10'],
                ['grad'=>'from-violet-50 via-white to-white','border'=>'border-violet-200/40','blob'=>'bg-violet-500/10'],
                ['grad'=>'from-emerald-50/70 via-white to-white','border'=>'border-emerald-200/40','blob'=>'bg-emerald-500/10'],
            ];
        @endphp
        <div class="mt-8 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($portfolios ?? [] as $idx=>$pf)
            @php $pst = $pfStyles[$idx % count($pfStyles)]; @endphp
                <a href="{{ route('portfolio.show', $pf->slug ?? $pf->id) }}" class="group relative flex flex-col overflow-hidden rounded-[24px] border {{ $pst['border'] }} bg-gradient-to-br {{ $pst['grad'] }} p-[1.2px] hover:shadow-[0_12px_32px_-12px_rgba(15,42,74,0.18)] hover:-translate-y-1.5 transition-all duration-300">
                    <div class="relative flex flex-col h-full rounded-[22px] bg-white overflow-hidden">
                        <div class="h-48 bg-slate-100 overflow-hidden shrink-0 relative">
                            @if($pf->featured_image)
                                <img src="{{ asset('storage/'.$pf->featured_image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @elseif(isset($pf->images) && $pf->images->count())
                                <img src="{{ asset('storage/'.$pf->images->first()->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <div class="w-full h-full grid place-items-center text-slate-400 text-sm bg-gradient-to-br {{ $pst['grad'] }}">No Image</div>
                            @endif
                            <span class="absolute top-3 left-3 text-xs font-semibold text-[#0F2A4A] bg-white/90 backdrop-blur border border-slate-200 px-2.5 py-1 rounded-full shadow-sm">{{ $pf->category->name ?? 'Umum' }}</span>
                            <span class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white border border-slate-200 grid place-items-center text-slate-400 group-hover:bg-[#0F2A4A] group-hover:text-white group-hover:border-[#0F2A4A] group-hover:rotate-45 transition-all duration-300 shadow-sm text-xs">↗</span>
                            <div class="absolute -top-10 -right-10 w-36 h-36 rounded-full {{ $pst['blob'] }} blur-2xl opacity-60 group-hover:scale-110 transition duration-500 pointer-events-none"></div>
                            <span class="absolute bottom-3 right-3 font-display font-extrabold text-[32px] leading-none tracking-tight text-white/80 drop-shadow select-none">{{ str_pad($idx+1,2,'0',STR_PAD_LEFT) }}</span>
                        </div>
                        <div class="p-6 flex-1 flex flex-col bg-gradient-to-br {{ $pst['grad'] }}">
                            <h3 class="font-semibold text-[16px] leading-tight text-[#0B1D33] line-clamp-2 group-hover:text-[#0F2A4A] transition">{{ $pf->title }}</h3>
                            <p class="text-xs text-slate-500 mt-2">{{ $pf->client_name ?? $pf->client?->name ?? 'Client' }}</p>
                            <div class="mt-4 pt-4 border-t border-slate-200/60 flex items-center justify-between">
                                <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-[#0F2A4A]">Lihat detail <span class="w-6 h-6 rounded-full bg-[#0F2A4A] text-white grid place-items-center text-[10px]">→</span></span>
                                <span class="text-[10px] tracking-[0.14em] font-bold text-slate-400">SMK BPPI</span>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full bg-white rounded-2xl border border-dashed border-slate-300 p-10 text-center">
                    <p class="text-sm text-slate-500">Belum ada portfolio publish — tambah di <span class="font-mono text-xs bg-slate-100 px-1.5 py-0.5 rounded">/admin/portfolio</span></p>
                </div>
            @endforelse
        </div>
        <div class="text-center mt-6 sm:hidden"><a href="{{ route('portfolio') }}" class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-full bg-white border border-[#BFDBFE] text-sm font-semibold text-[#0F2A4A] hover:bg-[#EFF6FF] hover:border-[#93C5FD] transition shadow-sm">Lihat semua portfolio →</a></div>
    </div>
</section>

{{-- INSIGHTS PREVIEW — sedikit warna --}}
<section id="insights" class="scroll-mt-20 py-12 sm:py-16 lg:py-20 bg-gradient-to-b from-[#F8FAFC] via-[#EFF6FF]/20 to-[#F8FAFC]/50 relative overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[250px] bg-[#BFDBFE]/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <span class="inline-flex items-center gap-2 text-xs tracking-widest font-semibold text-[#0F2A4A] bg-white border border-[#BFDBFE] px-3 py-1 rounded-full">INSIGHTS • DARI STUDIO</span>
                <h2 class="mt-3 text-2xl sm:text-3xl font-bold text-[#0B1D33] leading-tight">Belajar, Berbagi, Berkarya.</h2>
                <p class="text-sm sm:text-[15px] text-slate-500 mt-2 max-w-xl">Tips praktis, cerita project, dan wawasan digital dari keseharian SM STUDIO.</p>
            </div>
        </div>
        @php
            $insStyles = [
                ['grad'=>'from-sky-50/60 via-white to-white','border'=>'border-sky-200/40','blob'=>'bg-sky-500/10'],
                ['grad'=>'from-amber-50/60 via-white to-white','border'=>'border-amber-200/40','blob'=>'bg-amber-500/10'],
                ['grad'=>'from-violet-50 via-white to-white','border'=>'border-violet-200/40','blob'=>'bg-violet-500/10'],
            ];
        @endphp
        <div class="mt-8 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($articles ?? [] as $idx=>$a)
            @php $ist = $insStyles[$idx % count($insStyles)]; @endphp
                <a href="{{ route('insights.show', $a->slug) }}" class="group relative flex flex-col overflow-hidden rounded-[24px] border {{ $ist['border'] }} bg-gradient-to-br {{ $ist['grad'] }} p-[1.2px] hover:shadow-[0_12px_32px_-12px_rgba(15,42,74,0.18)] hover:-translate-y-1.5 transition-all duration-300">
                    <div class="relative flex flex-col h-full rounded-[22px] bg-white overflow-hidden">
                        <div class="h-44 bg-slate-100 overflow-hidden shrink-0 relative">
                            @if($a->featured_image)
                                <img src="{{ asset('storage/'.$a->featured_image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <div class="w-full h-full grid place-items-center bg-gradient-to-br {{ $ist['grad'] }} text-slate-400 text-sm">No Cover</div>
                            @endif
                            <span class="absolute top-3 left-3 text-xs font-semibold text-[#0F2A4A] bg-white/90 backdrop-blur border border-slate-200 px-2.5 py-1 rounded-full shadow-sm">{{ $a->category?->name ?? 'Insight' }}</span>
                            <span class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white border border-slate-200 grid place-items-center text-slate-400 group-hover:bg-[#0F2A4A] group-hover:text-white group-hover:border-[#0F2A4A] group-hover:rotate-45 transition-all duration-300 shadow-sm text-xs">↗</span>
                            <div class="absolute -top-10 -right-10 w-36 h-36 rounded-full {{ $ist['blob'] }} blur-2xl opacity-60 group-hover:scale-110 transition duration-500 pointer-events-none"></div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col bg-gradient-to-br {{ $ist['grad'] }}">
                            <h3 class="font-semibold text-[#0B1D33] line-clamp-2 group-hover:text-[#0F2A4A] text-[15px] leading-snug">{{ $a->title }}</h3>
                            <p class="text-sm text-slate-500 mt-2 line-clamp-2">{{ $a->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($a->content),90) }}</p>
                            <div class="mt-4 pt-4 border-t border-slate-200/60 flex items-center justify-between">
                                <span class="text-xs text-slate-400">{{ $a->created_at?->format('d M Y') }} • {{ $a->user?->name ?? 'Admin' }}</span>
                                <span class="inline-flex items-center gap-1 text-xs font-semibold text-[#0F2A4A]">Baca <span class="w-6 h-6 rounded-full bg-[#0F2A4A] text-white grid place-items-center text-[10px]">→</span></span>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                @foreach([
                    ['t'=>'Tips landing page yang convert','d'=>'Struktur simple yang bikin pengunjung langsung paham & klik.'],
                    ['t'=>'Branding UMKM anti ribet','d'=>'Mulai dari warna, font, sampai logo yang konsisten.'],
                    ['t'=>'Cerita dibalik project nyata','d'=>'Gimana siswa SMK kerjain website UMKM dalam 3 minggu.'],
                ] as $idx=>$f)
                @php $ist = $insStyles[$idx % count($insStyles)]; @endphp
                    <div class="group relative flex flex-col overflow-hidden rounded-[24px] border {{ $ist['border'] }} bg-gradient-to-br {{ $ist['grad'] }} p-[1.2px]">
                        <div class="relative flex flex-col h-full rounded-[22px] bg-white overflow-hidden">
                            <div class="h-44 bg-gradient-to-br {{ $ist['grad'] }} grid place-items-center text-slate-400 text-sm relative">
                                No Cover
                                <div class="absolute -top-10 -right-10 w-36 h-36 rounded-full {{ $ist['blob'] }} blur-2xl opacity-60"></div>
                            </div>
                            <div class="p-6 flex-1 flex flex-col bg-gradient-to-br {{ $ist['grad'] }}">
                                <span class="self-start text-xs font-semibold text-[#0F2A4A] bg-white border border-slate-200 px-2.5 py-1 rounded-full shadow-sm">Insight</span>
                                <h3 class="font-semibold text-[#0B1D33] mt-3 text-[15px]">{{ $f['t'] }}</h3>
                                <p class="text-sm text-slate-500 mt-2">{{ $f['d'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforelse
        </div>
    </div>
</section>

{{-- FAQ PREVIEW — diberi warna tipis biar tidak flat --}}
<section id="faq" class="scroll-mt-20 py-12 sm:py-16 lg:py-20 bg-gradient-to-b from-[#F8FAFC] via-[#EFF6FF]/40 to-white border-y border-slate-100 relative overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[320px] bg-[#BFDBFE]/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-[#93C5FD]/10 rounded-full blur-3xl pointer-events-none hidden lg:block"></div>
    <div class="absolute -left-20 top-20 w-64 h-64 bg-[#C5A880]/[0.06] rounded-full blur-3xl pointer-events-none hidden lg:block"></div>
    <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <span class="inline-flex items-center gap-2 text-xs tracking-widest font-semibold text-[#0F2A4A] bg-white border border-[#BFDBFE] px-3 py-1 rounded-full shadow-sm">FAQ • YANG SERING DITANYAKAN</span>
            <h2 class="mt-3 text-2xl sm:text-3xl font-bold text-[#0B1D33]">Yang Sering Ditanyakan.</h2>
            <p class="text-slate-500 mt-2 text-sm sm:text-[15px]">Jujur aja — kami Unit Produksi PPLG, tapi prosesnya profesional.</p>
        </div>
        <div class="mt-8 space-y-3" x-data="{ open: 0 }">
            @forelse($faqs ?? collect() as $i => $faq)
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden hover:border-[#BFDBFE] hover:shadow-md transition">
                    <button @click="open === {{ $i }} ? open=null : open={{ $i }}" class="w-full flex items-center justify-between p-5 text-left">
                        <span class="font-medium text-[#0B1D33] pr-6 text-sm sm:text-[15px]">{{ $faq->question }}</span>
                        <span class="shrink-0 w-8 h-8 rounded-full bg-[#EFF6FF] border border-[#BFDBFE]/50 text-[#0F2A4A] grid place-items-center text-sm">?</span>
                    </button>
                    <div x-show="open === {{ $i }}" x-transition class="px-5 pb-5 text-sm text-slate-600 leading-relaxed bg-[#F8FAFC]/50 border-t border-slate-100">{{ $faq->answer }}</div>
                </div>
            @empty
                @foreach([
                    ['q'=>'SM STUDIO itu siapa? Apakah benar dikelola oleh siswa SMK?','a'=>'Ya, SM STUDIO merupakan Unit Produksi PPLG SMK BPPI Baleendah yang dikelola oleh siswa dengan pendampingan mentor. Kami mengerjakan project nyata dengan menerapkan standar kerja yang relevan dengan dunia industri.'],
                    ['q'=>'Apakah hasil project-nya bisa terlihat profesional?','a'=>'Tentu. Setiap project melalui proses review bersama mentor, quality assurance (QA), serta revisi secara terstruktur untuk memastikan hasil akhir sesuai kebutuhan dan standar yang telah disepakati.'],
                    ['q'=>'Berapa lama waktu pengerjaannya?','a'=>'Untuk project seperti landing page atau company profile, estimasi pengerjaan umumnya sekitar 2–4 minggu, tergantung kompleksitas, jumlah halaman, fitur, dan kebutuhan project.'],
                    ['q'=>'Apakah bisa konsultasi terlebih dahulu secara gratis?','a'=>'Tentu bisa! Kami menyediakan konsultasi awal gratis selama 30 menit melalui WhatsApp atau Zoom untuk memahami kebutuhan, tujuan, dan konsep project Anda sebelum proses pengerjaan dimulai.'],
                ] as $i => $f)
                    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden hover:border-[#BFDBFE] hover:shadow-md transition">
                        <button @click="open === {{ $i }} ? open=null : open={{ $i }}" class="w-full flex items-center justify-between p-5 text-left">
                            <span class="font-medium text-[#0B1D33] pr-6 text-sm sm:text-[15px]">{{ $f['q'] }}</span>
                            <span class="shrink-0 w-8 h-8 rounded-full bg-[#EFF6FF] border border-[#BFDBFE]/50 text-[#0F2A4A] grid place-items-center text-sm">?</span>
                        </button>
                        <div x-show="open === {{ $i }}" class="px-5 pb-5 text-sm text-slate-600 bg-[#F8FAFC]/50 border-t border-slate-100">{{ $f['a'] }}</div>
                    </div>
                @endforeach
            @endforelse
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-8 sm:py-10 bg-[#F8FAFC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-[#0B1D33] via-[#0F2A4A] to-[#162F4A] rounded-[24px] sm:rounded-[28px] p-6 sm:p-8 lg:p-10 flex flex-col lg:flex-row items-center justify-between gap-6 text-white relative overflow-hidden shadow-xl border border-white/10">
            <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-[#C5A880]/20 blur-2xl"></div>
            <div class="absolute -left-20 -bottom-20 w-48 h-48 rounded-full bg-[#93C5FD]/10 blur-2xl"></div>
            <div class="absolute top-0 left-1/2 w-px h-full bg-gradient-to-b from-transparent via-white/10 to-transparent hidden lg:block"></div>
            <div class="relative text-center lg:text-left"><h3 class="text-xl sm:text-2xl font-bold leading-tight">Ada ide? Kami siap bantu wujudkan.</h3><p class="text-white/70 mt-2 text-sm sm:text-[15px] leading-relaxed">SMK BPPI Baleendah • Dibangun siswa, didampingi mentor — konsultasi pertama gratis 30 menit.</p></div>
            <a href="{{ route('contact') }}" class="relative w-full lg:w-auto text-center bg-white text-[#0B1D33] px-7 py-3.5 rounded-full font-semibold hover:bg-[#C5A880] hover:text-white transition shadow-lg whitespace-nowrap">Mulai Konsultasi Gratis</a>
        </div>
    </div>
</section>

{{-- TESTIMONIALS — React Island (performa: memo + lazy image + IO) — tampil di home, no lihat semua --}}
<section id="testimonials" class="scroll-mt-20 py-12 sm:py-16 lg:py-20 bg-gradient-to-b from-white via-[#EFF6FF]/15 to-[#F8FAFC] border-t border-slate-100 relative overflow-hidden">
    <div class="absolute top-0 right-1/3 w-[500px] h-[300px] bg-[#DBEAFE]/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto">
            <span class="inline-flex items-center gap-2 text-xs tracking-widest font-semibold text-[#0F2A4A] bg-[#EFF6FF] px-3 py-1 rounded-full border border-[#BFDBFE]">TESTIMONI • SMK BPPI BALEENDAH</span>
            <h2 class="mt-3 text-2xl sm:text-3xl font-bold text-[#0B1D33] leading-tight">Kata Mereka yang Sudah Kolaborasi.</h2>
            <p class="text-slate-500 mt-3 text-sm sm:text-[15px] leading-relaxed">Bukan sekadar pujian — cerita jujur dari klien yang project-nya dikerjakan tim Siswa SMK BPPI Baleendah, didampingi mentor.</p>
        </div>
        <div class="mt-8 sm:mt-10">
            {{-- React island — tanpa ubah tampilan, sentuhan tipis: lazy + IO, skeleton saat load --}}
            @php
                $testimonialsPayload = ["testimonials" => ($testimonials ?? collect())->map(fn($t) => ["id"=>$t->id,"name"=>$t->name,"position"=>$t->position,"company"=>$t->company,"content"=>$t->content,"rating"=>$t->rating,"photo"=>$t->photo])->values()];
            @endphp
            <div id="testimonials-root" class="island-loading min-h-[220px]" data-props='@json($testimonialsPayload)'>
                {{-- Fallback SSR saat JS nonaktif / sebelum React mount — skeleton tipis --}}
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 opacity-60">
                    @forelse(($testimonials ?? collect())->take(3) as $t)
                    <div class="bg-white rounded-[20px] border border-slate-100 p-7 animate-pulse">
                        <div class="h-4 w-20 bg-amber-100 rounded"></div>
                        <div class="h-4 bg-slate-100 rounded mt-3"></div><div class="h-4 bg-slate-100 rounded mt-2 w-5/6"></div>
                        <div class="flex items-center gap-3 mt-6"><div class="w-10 h-10 rounded-full bg-slate-100"></div><div class="h-3 w-24 bg-slate-100 rounded"></div></div>
                    </div>
                    @empty
                    <div class="col-span-full bg-white rounded-[20px] border border-dashed border-slate-300 p-10 text-center">
                        <div class="w-12 h-12 rounded-full bg-[#EFF6FF] text-[#0F2A4A] grid place-items-center mx-auto">💬</div>
                        <p class="text-sm font-semibold text-[#0B1D33] mt-3">Belum ada testimoni</p>
                        <p class="text-xs sm:text-sm text-slate-500 mt-1">Testimoni hanya ditambahkan manual oleh admin dan akan muncul di sini setelah dipublikasikan.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
