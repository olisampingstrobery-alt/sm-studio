@extends('layouts.public')
@section('title','Layanan')
@section('content')
{{-- HEADER --}}
<section class="relative overflow-hidden bg-gradient-to-b from-[#F8FAFC] via-white to-[#EFF6FF]/40 border-b border-slate-200/60">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute inset-0 opacity-[0.04]" style="background-image: radial-gradient(circle at 1px 1px, #0F2A4A 1px, transparent 0); background-size: 28px 28px;"></div>
        <div class="absolute -top-24 -right-24 w-[520px] h-[520px] rounded-full bg-[#93C5FD]/15 blur-3xl"></div>
        <div class="absolute -bottom-32 -left-32 w-[420px] h-[420px] rounded-full bg-[#C5A880]/10 blur-3xl"></div>
    </div>
    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14 lg:py-16">
        <div class="grid lg:grid-cols-[1.15fr_0.85fr] gap-8 lg:gap-12 items-center">
            <div>
                <span class="inline-flex items-center gap-2 text-[11px] tracking-[0.18em] font-bold text-[#0F2A4A] bg-white border border-[#BFDBFE] px-3.5 py-1.5 rounded-full shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    LAYANAN — SMK BPPI BALEENDAH
                </span>
                <h1 class="mt-4 font-display font-extrabold text-[30px] sm:text-[38px] lg:text-[44px] leading-[0.95] tracking-tight text-[#0B1D33]">
                    Butuh Bantuan Digital?<br>
                    <span class="bg-gradient-to-r from-[#0F2A4A] via-[#1A4B7A] to-[#93C5FD] bg-clip-text text-transparent">Kami Siap.</span>
                </h1>
                <p class="mt-4 text-sm sm:text-[15px] leading-relaxed text-slate-500 max-w-[56ch]">
                    Pilih layanan yang kamu butuh — website, branding, sampai konten. Dikerjakan tim siswa <span class="font-semibold text-slate-700">SMK BPPI Baleendah</span> yang kolaboratif, dibimbing mentor, dan fokus ke hasil yang rapi & siap pakai.
                </p>
                <div class="mt-6 flex flex-wrap gap-2.5">
                    <span class="inline-flex items-center gap-2 bg-[#0F2A4A] text-white text-xs font-semibold px-3.5 py-2 rounded-full shadow-sm"><span class="w-5 h-5 rounded-full bg-white/15 grid place-items-center text-[10px]">✓</span> 6 Layanan siap pakai</span>
                    <span class="inline-flex items-center gap-2 bg-white border border-slate-200 text-slate-700 text-xs font-semibold px-3.5 py-2 rounded-full">Kolaborasi Siswa + Mentor</span>
                    <span class="inline-flex items-center gap-2 bg-white border border-slate-200 text-slate-700 text-xs font-semibold px-3.5 py-2 rounded-full">Revisi & support ramah</span>
                </div>
            </div>
            {{-- mini highlight card stack (desktop) --}}
            <div class="hidden lg:block relative">
                <div class="relative bg-white rounded-[24px] border border-slate-200 p-4 shadow-soft">
                    <div class="rounded-[16px] bg-gradient-to-br from-[#0B1D33] via-[#0F2A4A] to-[#162F4A] p-5 text-white relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 w-40 h-40 rounded-full bg-white/10 blur-2xl"></div>
                        <div class="absolute -left-10 -bottom-10 w-32 h-32 rounded-full bg-[#C5A880]/20 blur-2xl"></div>
                        <div class="relative flex items-center gap-3">
                            <span class="w-10 h-10 rounded-xl bg-white text-[#0F2A4A] grid place-items-center font-bold shadow">✦</span>
                            <div>
                                <div class="text-xs text-white/60 tracking-widest font-semibold">PROSES KAMI</div>
                                <div class="font-bold leading-tight">Konsultasi → Eksekusi → Serah Terima</div>
                            </div>
                        </div>
                        <div class="relative mt-5 grid grid-cols-3 gap-3 text-center">
                            <div class="bg-white/10 rounded-xl py-3 border border-white/10 backdrop-blur"><div class="font-extrabold text-lg leading-none">1</div><div class="text-[11px] text-white/70 mt-1">Konsultasi</div></div>
                            <div class="bg-white text-[#0F2A4A] rounded-xl py-3 shadow"><div class="font-extrabold text-lg leading-none">2</div><div class="text-[11px] text-slate-500 mt-1">Dikerjakan</div></div>
                            <div class="bg-white/10 rounded-xl py-3 border border-white/10 backdrop-blur"><div class="font-extrabold text-lg leading-none">3</div><div class="text-[11px] text-white/70 mt-1">Siap Pakai</div></div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <div class="flex items-center gap-2 text-xs text-slate-500"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> Respon cepat • Estimasi transparan</div>
                        <a href="{{ route('contact') }}" class="text-xs font-semibold text-[#0F2A4A] hover:underline">Konsultasi gratis →</a>
                    </div>
                </div>
                {{-- floating badge --}}
                <div class="absolute -bottom-4 -left-4 bg-white border border-slate-200 rounded-2xl shadow-lg px-4 py-3 flex items-center gap-3">
                    <span class="w-9 h-9 rounded-xl bg-emerald-500 text-white grid place-items-center">✓</span>
                    <div class="leading-tight"><div class="text-xs font-bold text-[#0B1D33]">Siap bantu UMKM & Sekolah</div><div class="text-[11px] text-slate-500">Mulai dari landing page sampai branding</div></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SERVICES GRID --}}
<section class="py-10 sm:py-14 lg:py-16 bg-white relative overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[720px] h-[320px] bg-[#0F2A4A]/[0.03] rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-[#C5A880]/[0.07] rounded-full blur-3xl pointer-events-none hidden lg:block"></div>

    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        @php
            $cardStyles = [
                ['icon'=>'💻','grad'=>'from-[#EFF6FF] via-[#F8FAFC] to-white','border'=>'border-[#BFDBFE]/50','iconBg'=>'from-[#0F2A4A] via-[#1A4B7A] to-[#2563EB]','blob'=>'bg-blue-500/10'],
                ['icon'=>'🎨','grad'=>'from-violet-50 via-white to-white','border'=>'border-violet-200/40','iconBg'=>'from-violet-600 to-indigo-600','blob'=>'bg-violet-500/10'],
                ['icon'=>'📈','grad'=>'from-emerald-50/70 via-white to-white','border'=>'border-emerald-200/40','iconBg'=>'from-emerald-600 to-teal-600','blob'=>'bg-emerald-500/10'],
                ['icon'=>'🛠️','grad'=>'from-amber-50/70 via-white to-white','border'=>'border-amber-200/40','iconBg'=>'from-amber-500 to-orange-600','blob'=>'bg-amber-500/10'],
                ['icon'=>'📸','grad'=>'from-rose-50/60 via-white to-white','border'=>'border-rose-200/40','iconBg'=>'from-rose-500 to-pink-600','blob'=>'bg-rose-500/10'],
                ['icon'=>'💬','grad'=>'from-sky-50/60 via-white to-white','border'=>'border-sky-200/40','iconBg'=>'from-sky-600 to-cyan-600','blob'=>'bg-sky-500/10'],
            ];
            $fallback = [
                ['t'=>'Website Siap Pakai','d'=>'Profil usaha, landing page, sampai company profile — cepat, responsif, gampang dikelola.','hint'=>'Paling populer • SEO-ready'],
                ['t'=>'Branding & Desain','d'=>'Logo dan visual yang bikin brand kamu lebih kebentuk dan dipercaya.','hint'=>'Logo • Brand guide'],
                ['t'=>'Konten & Sosmed','d'=>'Desain feed, konten, dan strategi ringan biar makin kelihatan.','hint'=>'Feed • Konten rutin'],
                ['t'=>'Digital Support','d'=>'Bantuan update, perawatan, dan optimasi biar website tetap jalan mulus.','hint'=>'Maintenance • Optimasi'],
                ['t'=>'Foto & Video Simple','d'=>'Dokumentasi & visual pendukung biar brand makin hidup.','hint'=>'Dokumentasi singkat'],
                ['t'=>'Konsultasi Gratis','d'=>'Bingung mulai dari mana? Ngobrol dulu, kita bantu petakan kebutuhanmu.','hint'=>'Gratis 30 menit'],
            ];
        @endphp

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
            @forelse($services ?? [] as $idx => $svc)
                @php $st = $cardStyles[$idx % count($cardStyles)]; @endphp
                <div class="group relative flex flex-col overflow-hidden rounded-[24px] border {{ $st['border'] }} bg-gradient-to-br {{ $st['grad'] }} p-[1.2px] hover:shadow-[0_12px_32px_-12px_rgba(15,42,74,0.18)] hover:-translate-y-1.5 transition-all duration-300">
                    <div class="relative flex flex-col h-full rounded-[22px] bg-gradient-to-br {{ $st['grad'] }} p-6 sm:p-7 overflow-hidden">
                        {{-- watermark number --}}
                        <span class="absolute top-5 right-6 font-display font-extrabold text-[44px] leading-none tracking-tight text-slate-900/[0.035] group-hover:text-slate-900/[0.06] transition select-none">{{ str_pad($idx+1, 2, '0', STR_PAD_LEFT) }}</span>
                        {{-- soft blob --}}
                        <div class="absolute -top-10 -right-10 w-36 h-36 rounded-full {{ $st['blob'] }} blur-2xl group-hover:scale-110 transition duration-500"></div>
                        {{-- top row --}}
                        <div class="relative flex items-start justify-between">
                            <span class="w-[52px] h-[52px] rounded-2xl bg-gradient-to-br {{ $st['iconBg'] }} text-white grid place-items-center text-[20px] shadow-lg shadow-slate-900/10 ring-1 ring-white/20 group-hover:scale-105 group-hover:rotate-[-2deg] transition duration-300">
                                {{ $svc->icon ?? $st['icon'] }}
                            </span>
                            <span class="w-9 h-9 rounded-full bg-white border border-slate-200 grid place-items-center text-slate-400 group-hover:bg-[#0F2A4A] group-hover:text-white group-hover:border-[#0F2A4A] group-hover:rotate-45 transition-all duration-300 shadow-sm">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7"/><path d="M8 7h9v9"/></svg>
                            </span>
                        </div>

                        <h3 class="relative font-semibold text-[17px] leading-tight text-[#0B1D33] mt-5 group-hover:text-[#0F2A4A] transition">{{ $svc->title }}</h3>
                        <p class="relative text-[13.5px] leading-relaxed text-slate-500 mt-2.5 line-clamp-3">{{ $svc->description }}</p>

                        @if(!empty($svc->benefits) && is_array($svc->benefits))
                            <ul class="relative mt-4 space-y-1.5">
                                @foreach(array_slice((array)$svc->benefits,0,2) as $b)
                                    <li class="flex items-center gap-2 text-xs text-slate-600"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 grid place-items-center shrink-0 text-[10px]">✓</span> <span class="line-clamp-1">{{ $b }}</span></li>
                                @endforeach
                            </ul>
                        @else
                            <div class="relative mt-4 inline-flex items-center gap-1.5 text-[11px] font-medium tracking-wide text-slate-500 bg-white/70 border border-slate-200/60 px-2.5 py-1 rounded-full">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Siap pakai & dibimbing mentor
                            </div>
                        @endif

                        <div class="relative mt-6 pt-5 border-t border-slate-200/60 flex items-center justify-between gap-3">
                            <a href="{{ route('services.show', $svc->slug) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-[#0F2A4A] group/link">
                                <span class="relative">Lihat detail <span class="absolute -bottom-1 left-0 w-0 h-px bg-[#0F2A4A] group-hover/link:w-full transition-all duration-300"></span></span>
                                <span class="w-7 h-7 rounded-full bg-[#0F2A4A] text-white grid place-items-center text-xs group-hover/link:translate-x-0.5 transition">→</span>
                            </a>
                            <span class="hidden sm:inline text-[10px] tracking-[0.14em] font-bold text-slate-400">SMK BPPI</span>
                        </div>
                    </div>
                </div>
            @empty
                @foreach($fallback as $i => $f)
                    @php $st = $cardStyles[$i % count($cardStyles)]; @endphp
                    <div class="group relative flex flex-col overflow-hidden rounded-[24px] border {{ $st['border'] }} bg-gradient-to-br {{ $st['grad'] }} p-[1.2px] hover:shadow-[0_12px_32px_-12px_rgba(15,42,74,0.18)] hover:-translate-y-1.5 transition-all duration-300">
                        <div class="relative flex flex-col h-full rounded-[22px] bg-gradient-to-br {{ $st['grad'] }} p-6 sm:p-7 overflow-hidden">
                            <span class="absolute top-5 right-6 font-display font-extrabold text-[44px] leading-none tracking-tight text-slate-900/[0.035] group-hover:text-slate-900/[0.06] transition select-none">{{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}</span>
                            <div class="absolute -top-10 -right-10 w-36 h-36 rounded-full {{ $st['blob'] }} blur-2xl group-hover:scale-110 transition duration-500"></div>

                            <div class="relative flex items-start justify-between">
                                <span class="w-[52px] h-[52px] rounded-2xl bg-gradient-to-br {{ $st['iconBg'] }} text-white grid place-items-center text-[20px] shadow-lg shadow-slate-900/10 ring-1 ring-white/20 group-hover:scale-105 group-hover:rotate-[-2deg] transition duration-300">{{ $st['icon'] }}</span>
                                <span class="w-9 h-9 rounded-full bg-white border border-slate-200 grid place-items-center text-slate-400 group-hover:bg-[#0F2A4A] group-hover:text-white group-hover:border-[#0F2A4A] group-hover:rotate-45 transition-all duration-300 shadow-sm">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7"/><path d="M8 7h9v9"/></svg>
                                </span>
                            </div>

                            <div class="relative mt-5">
                                <span class="inline-flex text-[11px] font-semibold tracking-wide text-[#0F2A4A] bg-white border border-slate-200 px-2.5 py-1 rounded-full shadow-sm">{{ $f['hint'] }}</span>
                            </div>
                            <h3 class="relative font-semibold text-[17px] leading-tight text-[#0B1D33] mt-3 group-hover:text-[#0F2A4A] transition">{{ $f['t'] }}</h3>
                            <p class="relative text-[13.5px] leading-relaxed text-slate-500 mt-2">{{ $f['d'] }}</p>

                            <div class="relative mt-6 pt-5 border-t border-slate-200/60 flex items-center justify-between">
                                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-[#0F2A4A] group/link">
                                    <span class="relative">Konsultasi <span class="absolute -bottom-1 left-0 w-0 h-px bg-[#0F2A4A] group-hover/link:w-full transition-all duration-300"></span></span>
                                    <span class="w-7 h-7 rounded-full bg-[#0F2A4A] text-white grid place-items-center text-xs group-hover/link:translate-x-0.5 transition">→</span>
                                </a>
                                <span class="text-[10px] tracking-[0.14em] font-bold text-slate-400">SMK BPPI</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforelse
        </div>

        {{-- bottom note --}}
        <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3 text-xs text-slate-500">
            <span class="inline-flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> Semua layanan bisa custom sesuai kebutuhan</span>
            <span class="hidden sm:block w-1 h-1 rounded-full bg-slate-300"></span>
            <span>Harga pelajar, kualitas profesional</span>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="pb-10 sm:pb-14 bg-white">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative overflow-hidden rounded-[24px] sm:rounded-[28px] bg-gradient-to-br from-[#0B1D33] via-[#0F2A4A] to-[#162F4A] p-[1px]">
            <div class="rounded-[23px] sm:rounded-[27px] bg-gradient-to-br from-[#0B1D33] via-[#0F2A4A] to-[#162F4A] p-6 sm:p-8 lg:p-10 relative overflow-hidden">
                <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-[#C5A880]/15 blur-2xl"></div>
                <div class="absolute -left-20 -bottom-20 w-48 h-48 rounded-full bg-[#93C5FD]/10 blur-2xl"></div>
                <div class="absolute top-0 left-1/2 w-px h-full bg-gradient-to-b from-transparent via-white/10 to-transparent hidden lg:block"></div>
                <div class="relative flex flex-col lg:flex-row items-center justify-between gap-6 text-white">
                    <div class="text-center lg:text-left">
                        <div class="inline-flex items-center gap-2 bg-white/10 border border-white/15 px-3 py-1 rounded-full text-[11px] tracking-widest font-semibold text-white/80">KONSULTASI GRATIS 30 MENIT</div>
                        <h3 class="mt-3 text-xl sm:text-2xl font-bold leading-tight">Belum nemu yang pas? Ngobrol dulu aja.</h3>
                        <p class="text-white/70 mt-2 text-sm sm:text-[15px] leading-relaxed max-w-xl">Cerita kebutuhanmu — website, branding, atau konten. Kita bantu petakan opsi paling pas, tanpa maksa harus lanjut.</p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                        <a href="{{ route('contact') }}" class="text-center bg-white text-[#0B1D33] px-7 py-3.5 rounded-full font-semibold hover:bg-[#C5A880] hover:text-white transition shadow-lg">Mulai Konsultasi Gratis</a>
                        <a href="{{ route('portfolio') }}" class="text-center bg-white/10 border border-white/20 text-white px-7 py-3.5 rounded-full font-semibold hover:bg-white/15 transition backdrop-blur">Lihat Karya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
