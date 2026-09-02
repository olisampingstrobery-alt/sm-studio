@extends('layouts.public')
@section('title','Tentang Kami')
@section('content')
<section class="bg-[#0B1D33] text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(white 1px, transparent 0); background-size: 28px 28px;"></div>
    <div class="absolute -right-32 -top-32 w-[520px] h-[520px] rounded-full bg-[#1A3A5C]/30 blur-3xl pointer-events-none"></div>
    <div class="absolute -left-20 bottom-0 w-[420px] h-[420px] rounded-full bg-[#0F2440]/50 blur-3xl pointer-events-none"></div>
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20 relative">
        <span class="inline-flex items-center gap-2 bg-white/10 border border-white/15 px-3.5 py-1.5 rounded-full text-xs font-semibold tracking-widest text-white/80">TENTANG SM STUDIO • SMK BPPI BALEENDAH</span>
        <h1 class="mt-4 text-[30px] sm:text-4xl lg:text-5xl font-display font-bold leading-[0.95] text-pretty">Dibangun Siswa SMK.<br><span class="text-[#93C5FD]">Dibuat untuk Kebutuhan Nyata.</span></h1>
        <p class="mt-4 sm:mt-5 text-[14px] sm:text-[15px] leading-relaxed text-white/70 max-w-2xl text-pretty">SM STUDIO lahir di <span class="text-white font-semibold">SMK BPPI Baleendah</span> — tempat siswa belajar lewat project beneran, bukan cuma tugas. Kolaborasi, teknologi, dan kreativitas anak muda — dikurasi mentor biar hasilnya rapi, cepat, dan siap pakai.</p>
    </div>
</section>

<section class="py-10 sm:py-16 lg:py-20 bg-[#F8FAFC]/50">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-8 sm:gap-10 lg:gap-10 xl:gap-14 items-start">
        {{-- KIRI: Pengertian SM STUDIO --}}
        <div class="min-w-0">
            {{-- BADGE: dibesarin biar jelas --}}
            <span class="inline-flex items-center justify-center text-[13px] sm:text-sm font-extrabold tracking-[0.12em] sm:tracking-[0.14em] text-[#0F2A4A] bg-white border-2 border-[#BFDBFE] px-5 sm:px-6 py-2.5 sm:py-3 rounded-full shadow-sm leading-none">KENAPA SM STUDIO ADA?</span>
            <h2 class="mt-4 sm:mt-5 text-[24px] sm:text-[30px] lg:text-[32px] font-display font-extrabold leading-[1.1] tracking-tight text-[#0B1D33] text-balance">Karya siswa SMK yang profesional & berdampak.</h2>

            <div class="mt-4 sm:mt-5 space-y-3.5 text-[13.5px] sm:text-[15px] leading-7 text-slate-600 text-pretty max-w-[62ch]">
                <p>Kami hadir untuk membuktikan bahwa <span class="font-semibold text-[#0B1D33]">karya siswa SMK juga bisa profesional, relevan, dan memberikan dampak nyata</span> bagi bisnis lokal.</p>
                <p>SM STUDIO menjadi wadah bagi siswa PPLG untuk belajar melalui <span class="font-medium text-slate-700">project nyata</span>, berkolaborasi dengan tim, serta membantu UMKM, sekolah, dan bisnis lokal memenuhi kebutuhan digital mereka dengan proses yang jelas dan hasil yang dapat diandalkan.</p>
            </div>

            <div class="mt-7 sm:mt-8 space-y-5">
                {{-- VISI --}}
                <div class="relative overflow-hidden rounded-[20px] sm:rounded-[24px] bg-gradient-to-br from-[#0F2A4A] via-[#0F2A4A] to-[#162F4A] p-6 sm:p-7 text-white border border-white/10 shadow-soft">
                    <div class="absolute -right-10 -top-10 w-40 h-40 rounded-full bg-[#93C5FD]/15 blur-2xl pointer-events-none"></div>
                    <div class="absolute -left-10 -bottom-10 w-32 h-32 rounded-full bg-[#C5A880]/10 blur-2xl pointer-events-none"></div>
                    <div class="relative flex items-start gap-4">
                        <span class="w-10 h-10 rounded-xl bg-white text-[#0F2A4A] grid place-items-center shrink-0 shadow-md text-[15px] leading-none">◎</span>
                        <div class="min-w-0 flex-1 pt-0.5">
                            <div class="text-[11px] tracking-[0.16em] font-bold text-white/60 leading-none">VISI KAMI</div>
                            <p class="mt-2.5 text-[14px] sm:text-[14.5px] leading-[1.7] text-white/90 text-pretty">
                                Menjadi <span class="font-semibold text-white">student-led digital studio</span> yang dipercaya untuk membantu UMKM, sekolah, dan bisnis lokal berkembang di dunia digital melalui karya siswa yang <span class="font-semibold text-white">kolaboratif, profesional, dan siap digunakan.</span>
                            </p>
                        </div>
                    </div>
                </div>

                {{-- CARA KERJA --}}
                <div class="bg-white border border-slate-200 rounded-[20px] sm:rounded-[24px] p-5 sm:p-6 lg:p-7 shadow-card">
                    <div class="flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-lg bg-[#EFF6FF] border border-[#BFDBFE]/50 grid place-items-center text-[#0F2A4A] shrink-0 text-sm">✦</span>
                        <h3 class="font-bold text-[#0B1D33] text-[15px] sm:text-[16px]">Cara Kerja Kami</h3>
                        <span class="ml-auto hidden sm:inline-flex text-[11px] font-semibold text-slate-500 bg-slate-50 border border-slate-200 px-2.5 py-1 rounded-full">1 — 4</span>
                    </div>
                    <div class="relative mt-6">
                        <div class="hidden sm:block absolute left-[15px] top-[14px] bottom-[14px] w-px bg-slate-200"></div>
                        <ul class="relative space-y-5">
                        <li class="flex gap-4 items-start">
                            <span class="w-8 h-8 rounded-xl bg-[#0F2A4A] text-white grid place-items-center shrink-0 text-[13px] font-bold shadow-sm mt-[2px] leading-none ring-4 ring-white">1</span>
                            <div class="min-w-0 flex-1">
                                <div class="font-bold text-[13.5px] sm:text-sm text-[#0B1D33] leading-snug">Belajar melalui project nyata</div>
                                <p class="text-[13px] sm:text-[13.5px] leading-relaxed text-slate-600 mt-1.5 text-pretty">Siswa mengembangkan kemampuan dengan mengerjakan kebutuhan nyata bersama tim, dengan pendampingan guru dan partner.</p>
                            </div>
                        </li>
                        <li class="flex gap-4 items-start">
                            <span class="w-8 h-8 rounded-xl bg-[#0F2A4A] text-white grid place-items-center shrink-0 text-[13px] font-bold shadow-sm mt-[2px] leading-none ring-4 ring-white">2</span>
                            <div class="min-w-0 flex-1">
                                <div class="font-bold text-[13.5px] sm:text-sm text-[#0B1D33] leading-snug">Menggabungkan desain, teknologi, dan komunikasi</div>
                                <p class="text-[13px] sm:text-[13.5px] leading-relaxed text-slate-600 mt-1.5 text-pretty">Setiap project dikerjakan dengan pendekatan yang kreatif, fungsional, dan mudah dipahami.</p>
                            </div>
                        </li>
                        <li class="flex gap-4 items-start">
                            <span class="w-8 h-8 rounded-xl bg-[#0F2A4A] text-white grid place-items-center shrink-0 text-[13px] font-bold shadow-sm mt-[2px] leading-none ring-4 ring-white">3</span>
                            <div class="min-w-0 flex-1">
                                <div class="font-bold text-[13.5px] sm:text-sm text-[#0B1D33] leading-snug">Berorientasi pada kebutuhan klien</div>
                                <p class="text-[13px] sm:text-[13.5px] leading-relaxed text-slate-600 mt-1.5 text-pretty">Kami tidak hanya membuat karya, tetapi memahami kebutuhan dan tujuan setiap project.</p>
                            </div>
                        </li>
                        <li class="flex gap-4 items-start">
                            <span class="w-8 h-8 rounded-xl bg-[#0F2A4A] text-white grid place-items-center shrink-0 text-[13px] font-bold shadow-sm mt-[2px] leading-none ring-4 ring-white">4</span>
                            <div class="min-w-0 flex-1">
                                <div class="font-bold text-[13.5px] sm:text-sm text-[#0B1D33] leading-snug">Mengutamakan hasil yang rapi dan siap digunakan</div>
                                <p class="text-[13px] sm:text-[13.5px] leading-relaxed text-slate-600 mt-1.5 text-pretty">Setiap pekerjaan dikerjakan dengan proses yang terarah agar menghasilkan solusi digital yang relevan dan dapat diandalkan.</p>
                            </div>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- KANAN: Gambar --}}
        <div class="space-y-4 sm:space-y-6 lg:sticky lg:top-24 min-w-0">
            <div class="relative overflow-hidden rounded-[20px] sm:rounded-[24px] border border-slate-200 bg-white p-1.5 sm:p-2 shadow-soft">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&q=80" alt="Tim SM Studio" class="rounded-[14px] sm:rounded-[16px] w-full h-[240px] sm:h-[340px] lg:h-[360px] object-cover object-center">
                <div class="absolute bottom-3 left-3 right-3 sm:bottom-4 sm:left-4 sm:right-4 bg-white/95 backdrop-blur border border-slate-200 rounded-2xl p-3 sm:p-4 shadow-lg flex items-center gap-3">
                    <span class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-emerald-500 text-white grid place-items-center shrink-0">✓</span>
                    <div class="min-w-0 leading-tight">
                        <div class="text-[13px] sm:text-sm font-bold text-[#0B1D33] truncate">Kolaborasi siswa + mentor</div>
                        <div class="text-[11px] sm:text-xs text-slate-500 truncate">Review bareng, hasil tetap profesional</div>
                    </div>
                    <span class="ml-auto hidden sm:inline-flex text-[11px] font-semibold tracking-widest text-emerald-700 bg-emerald-50 border border-emerald-200 px-2.5 py-1 rounded-full shrink-0">SIAP PAKAI</span>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-3 sm:gap-4 text-center">
                @foreach([['v'=>'Siswa','l'=>'Unit Produksi PPLG'],['v'=>'30+','l'=>'Project nyata'],['v'=>'Siap','l'=>'Pakai & rapi']] as $s)
                    <div class="bg-white border border-slate-200 rounded-2xl p-3.5 sm:p-5 shadow-sm">
                        <div class="text-[16px] sm:text-lg font-bold text-[#0F2A4A] leading-none">{{ $s['v'] }}</div>
                        <div class="text-[10px] sm:text-xs text-slate-500 mt-1.5 leading-tight">{{ $s['l'] }}</div>
                    </div>
                @endforeach
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5 flex gap-3.5 items-start shadow-sm">
                <span class="w-9 h-9 rounded-xl bg-[#0F2A4A] text-white grid place-items-center shrink-0 leading-none">“</span>
                <p class="text-[13px] sm:text-sm leading-relaxed text-slate-600 text-pretty">
                    <span class="font-semibold text-[#0B1D33]">Bukan “masih belajar”, tapi “sudah berkarya”.</span> Setiap project direview bareng mentor — biar kualitas tetap profesional dan kamu nyaman kolaborasi dengan kami.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
