@extends('layouts.public')
@section('title','SM STUDIO — Unit Produksi PPLG SMK BPPI Baleendah')
@section('content')
{{-- HERO --}}
<section id="home" class="scroll-mt-20 relative overflow-hidden bg-[#0B1D33] text-white">
    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 32px 32px;"></div>
    <div class="absolute -right-32 -top-32 w-[520px] h-[520px] rounded-full bg-white/5 blur-3xl"></div>
    <div class="absolute -left-20 bottom-0 w-[420px] h-[420px] rounded-full bg-white/5 blur-3xl"></div>
    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-16 lg:py-24">
        <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 items-center">
            <div>
                <span class="inline-flex items-center gap-2 bg-white/10 border border-white/15 text-white/90 px-4 py-1.5 rounded-full text-xs font-semibold tracking-widest">SMK BPPI BALEENDAH • Unit Produksi PPLG</span>
                <h1 class="mt-6 font-display font-bold text-[32px] sm:text-[40px] lg:text-[52px] leading-[0.92] tracking-tight">Dibangun Siswa SMK.<br><span class="text-[#93C5FD]">Siap untuk Kebutuhan Digital Anda.</span></h1>
                <p class="mt-4 sm:mt-5 text-sm sm:text-[15px] text-white/70 leading-relaxed max-w-xl">SM STUDIO adalah studio digital dari <span class="text-white font-semibold">SMK BPPI Baleendah</span>. Kami belajar lewat project nyata — bikin website, branding, dan solusi digital yang cepat, rapi, dan siap pakai untuk UMKM, sekolah, komunitas, dan bisnis yang mau tumbuh.</p>
                <div class="mt-6 sm:mt-8 flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                    <a href="#contact" class="px-7 py-3.5 rounded-full bg-white text-[#0B1D33] font-semibold text-sm hover:bg-slate-100 transition text-center shadow-lg">Konsultasi Gratis — Mulai Project</a>
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
                        <div class="flex items-center gap-3"><span class="w-10 h-10 rounded-xl bg-[#0F2A4A] text-white grid place-items-center">✓</span><div><div class="font-bold text-[#0B1D33] text-sm">Project Selesai ✓</div><div class="text-xs text-slate-500">Website profil UMKM — dikerjakan tim siswa, review bareng guru.</div></div></div>
                    </div>
                    <div class="absolute -top-4 -right-4 bg-[#0B1D33] text-white rounded-2xl px-5 py-4 shadow-xl hidden sm:block">
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
                <div class="mt-6 relative overflow-hidden rounded-[20px] bg-gradient-to-br from-[#0F2A4A] via-[#0B1D33] to-[#071425] p-6 text-white border border-white/10">
                    <div class="absolute -right-10 -top-10 w-40 h-40 rounded-full bg-white/5 blur-2xl"></div>
                    <div class="flex items-start gap-4 relative"><span class="w-10 h-10 rounded-xl bg-white text-[#0F2A4A] grid place-items-center shrink-0">◎</span><div><div class="text-[11px] tracking-[0.16em] font-bold text-white/60">VISI KAMI</div><p class="mt-2 text-sm leading-relaxed text-white/90">Menjadi <span class="font-semibold text-white">student-led digital studio</span> yang dipercaya UMKM, sekolah, dan bisnis lokal — <span class="font-semibold text-white">kolaboratif, profesional, siap pakai.</span></p></div></div>
                </div>
                <div class="mt-4 flex flex-wrap gap-3">
                    <a href="#portfolio" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-[#0B1D33] text-white text-sm font-semibold hover:bg-[#0B1D33] transition">Lihat karya nyata →</a>
                    <a href="#services" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-white border border-slate-200 text-[#0B1D33] text-sm font-semibold hover:bg-slate-50">Lihat layanan</a>
                </div>
            </div>
            <div class="space-y-4 min-w-0">
                <div class="relative overflow-hidden rounded-[20px] sm:rounded-[24px] border border-slate-200 bg-white p-1.5 sm:p-2 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&q=80" alt="Tim SM Studio" class="rounded-[14px] sm:rounded-[16px] w-full h-[260px] sm:h-[340px] object-cover">
                    <div class="absolute bottom-3 left-3 right-3 sm:bottom-4 sm:left-4 sm:right-4 bg-white/95 backdrop-blur border border-slate-200 rounded-2xl p-3 sm:p-4 shadow-lg flex items-center gap-3">
                        <span class="w-9 h-9 rounded-xl bg-[#0F2A4A] text-white grid place-items-center shrink-0">✓</span>
                        <div class="min-w-0 leading-tight"><div class="text-sm font-bold text-[#0B1D33]">Kolaborasi siswa + mentor</div><div class="text-xs text-slate-500">Review bareng, hasil tetap profesional</div></div>
                        <span class="ml-auto hidden sm:inline-flex text-[11px] font-semibold tracking-widest text-[#0F2A4A] bg-[#EFF6FF] border border-[#BFDBFE] px-2.5 py-1 rounded-full">SIAP PAKAI</span>
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

{{-- KLIEN & KOLABORASI — terintegrasi di Home, tidak terpotong: 1 section menyatu (header jadi card rounded inset, bukan blok full-width) --}}
<section id="clients" class="scroll-mt-20 py-12 sm:py-16 lg:py-20 bg-gradient-to-b from-white via-[#F8FAFC] to-white border-y border-slate-100 relative overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[300px] bg-white/[0.04] rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-white/5 rounded-full blur-3xl pointer-events-none hidden lg:block"></div>
    <div class="absolute -left-20 top-20 w-64 h-64 bg-[#93C5FD]/[0.06] rounded-full blur-3xl pointer-events-none hidden lg:block"></div>
    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        {{-- header dark — kini jadi card rounded inset biar tidak kesannya kepotong — force hitam solid biar teks putih kebaca --}}
        <div class="relative overflow-hidden rounded-[24px] sm:rounded-[28px] bg-[#0B1D33] bg-gradient-to-br from-[#0F2A4A] via-[#0B1D33] to-[#071425] border border-white/10 shadow-xl p-6 sm:p-8 lg:p-10 text-white" style="background-color:#0B1D33">
            <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-white/5 blur-3xl pointer-events-none"></div>
            <div class="absolute -left-20 -bottom-20 w-48 h-48 rounded-full bg-[#93C5FD]/15 blur-3xl pointer-events-none"></div>
            <div class="absolute top-0 left-1/2 w-px h-full bg-gradient-to-b from-transparent via-white/10 to-transparent hidden lg:block pointer-events-none"></div>
            <div class="relative">
                <span class="inline-flex items-center gap-2 text-[11px] sm:text-xs tracking-[0.16em] font-bold text-white/60 bg-white/10 border border-white/15 px-3 py-1 rounded-full backdrop-blur">KLIEN & KOLABORASI • SMK BPPI BALEENDAH</span>
                <h2 class="text-2xl sm:text-3xl lg:text-[32px] font-bold mt-3 leading-tight tracking-tight">Kolaborasi Nyata, Kepercayaan Nyata.</h2>
                <p class="text-white/65 mt-3 max-w-2xl text-sm sm:text-[15px] leading-relaxed">Dari UMKM lokal sampai komunitas sekolah — kami dipercaya bantu kebutuhan digital lewat project nyata siswa. Semua klien di sini adalah kolaborasi beneran yang dikerjakan bareng mentor.</p>
            </div>
        </div>
        {{-- grid kartu klien — tetap pastel per client, kini menyatu di 1 section (tidak ada blok putih terpisah yang kepotong) --}}
        <div class="mt-8 sm:mt-10">
            @if(isset($clients) && $clients->count())
                <div class="grid grid-cols-1 min-[360px]:grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6 auto-rows-fr">
                    @foreach($clients as $client)
                    @php
                        // Biru tua seragam
                        $bgOuter = "#EFF6FF";
                        $bgInner = "#DBEAFE";
                        $bdOuter = "#BFDBFE";
                        $bdInner = "#BFDBFE";
                        $txt = "#0F2A4A";
                        $portfolioCount = $client->portfolios_count ?? ($client->portfolios ? $client->portfolios->where('status','published')->count() : 0);
                    @endphp
                    <div id="client-{{ $client->slug }}" class="rounded-xl sm:rounded-2xl p-4 sm:p-5 lg:p-6 xl:p-8 flex flex-col items-center justify-center text-center hover:shadow-soft hover:-translate-y-0.5 transition-all duration-300 group border shadow-sm scroll-mt-24 min-h-[180px] sm:min-h-[200px]"
                         style="background: {{ $bgOuter }}; border-color: {{ $bdOuter }};" data-client-box>
                        <div class="w-14 h-14 sm:w-16 sm:h-16 lg:w-20 lg:h-20 rounded-lg sm:rounded-xl flex items-center justify-center overflow-hidden border shrink-0"
                             style="background: {{ $bgInner }}; border-color: {{ $bdInner }};" data-client-inner>
                            @if($client->logo)
                                <img src="{{ asset('storage/'.$client->logo) }}" alt="{{ $client->name }}" class="w-full h-full object-contain p-2 sm:p-3 bg-white/80" crossorigin="anonymous" data-client-logo>
                            @else
                                <span class="font-bold text-base sm:text-lg" style="color: {{ $txt }}">{{ strtoupper(substr($client->name,0,2)) }}</span>
                            @endif
                        </div>
                        <div class="font-semibold mt-3 sm:mt-4 text-[13px] sm:text-sm text-center line-clamp-2 leading-tight px-1" style="color: #0B1D33">{{ $client->name }}</div>
                        <div class="text-[11px] sm:text-xs text-center mt-0.5 line-clamp-1" style="color: {{ $txt }}; opacity:.7">{{ $client->industry ?? '—' }}</div>
                        @if($client->website)
                            <a href="{{ $client->website }}" target="_blank" class="text-[10px] sm:text-[11px] hover:underline mt-1 truncate max-w-full px-2 block" style="color: {{ $txt }}">{{ parse_url($client->website, PHP_URL_HOST) ?? $client->website }}</a>
                        @endif
                        @if($portfolioCount > 0)
                            <span class="mt-2 inline-flex items-center gap-1 sm:gap-1.5 text-[10px] sm:text-[11px] font-semibold px-2 sm:px-2.5 py-1 rounded-full bg-white border shadow-sm" style="color: {{ $txt }}; border-color: {{ $bdOuter }}">📁 {{ $portfolioCount }} portfolio</span>
                        @endif
                    </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-2xl border border-dashed border-slate-300 p-8 sm:p-12 text-center">
                    <div class="w-12 h-12 rounded-xl bg-slate-100 grid place-items-center mx-auto text-slate-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19.128a9.38 9.38 0 002.625.374 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                    </div>
                    <h3 class="font-semibold text-[#0B1D33] mt-4">Belum ada klien</h3>
                    <p class="text-sm text-slate-500 mt-1 max-w-md mx-auto">Admin belum menambahkan klien. Silakan tambah via <span class="font-mono text-xs bg-slate-100 px-1.5 py-0.5 rounded">/admin/clients</span> — data akan otomatis muncul di sini.</p>
                </div>
            @endif
        </div>
    </div>
</section>
@push('scripts')
<script>
// Warna box sesuai foto — ekstrak warna dominan logo biar box matching foto (khusus section home)
document.addEventListener('DOMContentLoaded', () => {
    const boxes = document.querySelectorAll('#clients [data-client-box]');
    boxes.forEach(box => {
        const img = box.querySelector('[data-client-logo]');
        if (!img) return;
        const apply = () => {
            try {
                const c = document.createElement('canvas');
                const x = c.getContext('2d');
                c.width = 24; c.height = 24;
                x.drawImage(img, 0, 0, 24, 24);
                const d = x.getImageData(0, 0, 24, 24).data;
                let r=0,g=0,b=0,cnt=0;
                for(let i=0;i<d.length;i+=4){
                    if(d[i]>250 && d[i+1]>250 && d[i+2]>250) continue;
                    if(d[i+3]<30) continue;
                    r+=d[i]; g+=d[i+1]; b+=d[i+2]; cnt++;
                }
                if(!cnt) return;
                r=Math.round(r/cnt); g=Math.round(g/cnt); b=Math.round(b/cnt);
                box.style.background = '#EFF6FF';
                box.style.borderColor = '#BFDBFE';
                const inner = box.querySelector('[data-client-inner]');
                if(inner){
                    inner.style.background = '#DBEAFE';
                    inner.style.borderColor = '#BFDBFE';
                }
            }
            } catch(e){}
        };
        if(img.complete) apply(); else img.addEventListener('load', apply, {once:true});
        img.addEventListener('error', () => {}, {once:true});
    });
});
</script>
@endpush

{{-- SERVICES PREVIEW --}}
<section id="services" class="scroll-mt-20 py-12 sm:py-16 lg:py-20 bg-gradient-to-b from-white via-[#F8FAFC] to-white relative overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-white/[0.03] rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-[#93C5FD]/10 rounded-full blur-3xl pointer-events-none hidden lg:block"></div>
    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-start gap-5 lg:gap-10 xl:gap-14">
            <div class="flex-shrink-0"><span class="inline-flex items-center gap-2 text-xs tracking-widest font-semibold text-[#0F2A4A] bg-[#EFF6FF] px-3 py-1 rounded-full border border-[#BFDBFE]">APA YANG KAMI BANTU</span><h2 class="mt-3 text-2xl sm:text-3xl font-bold text-[#0B1D33] leading-tight">Kebutuhan Digital<br class="hidden sm:block">yang Siap Pakai.</h2></div>
            <p class="text-sm sm:text-[15px] text-slate-500 max-w-[520px] lg:max-w-[440px] xl:max-w-[480px] leading-relaxed lg:pt-[18px] lg:ml-2">Butuh website, branding, atau konten? Tim siswa SMK BPPI Baleendah siap bantu — kreatif, kolaboratif, dan dibimbing mentor biar hasilnya rapi & profesional.</p>
        </div>
        @php
            $cardStyles = [
                ['icon'=>'💻','grad'=>'from-[#EFF6FF] via-[#F8FAFC] to-white','border'=>'border-[#BFDBFE]/50','iconBg'=>'from-[#0F2A4A] via-[#0F2A4A] to-[#071425]','blob'=>'bg-[#0F2A4A]/10'],
                ['icon'=>'🎨','grad'=>'from-[#EFF6FF] via-white to-white','border'=>'border-[#BFDBFE]/40','iconBg'=>'from-[#0F2A4A] to-[#0F2A4A]','blob'=>'bg-[#0F2A4A]/10'],
                ['icon'=>'📈','grad'=>'from-[#EFF6FF]/70 via-white to-white','border'=>'border-[#BFDBFE]/40','iconBg'=>'from-[#0F2A4A] to-[#0F2A4A]','blob'=>'bg-[#0F2A4A]/10'],
                ['icon'=>'🛠️','grad'=>'from-[#EFF6FF]/70 via-white to-white','border'=>'border-[#BFDBFE]/40','iconBg'=>'from-[#0F2A4A] to-[#0F2A4A]','blob'=>'bg-[#0F2A4A]/10'],
                ['icon'=>'📸','grad'=>'from-[#EFF6FF]/60 via-white to-white','border'=>'border-[#BFDBFE]/40','iconBg'=>'from-[#0F2A4A] to-[#0F2A4A]','blob'=>'bg-[#0F2A4A]/10'],
                ['icon'=>'💬','grad'=>'from-[#EFF6FF]/60 via-white to-white','border'=>'border-[#BFDBFE]/40','iconBg'=>'from-[#0F2A4A] to-[#0F2A4A]','blob'=>'bg-[#0F2A4A]/10'],
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
        <div class="mt-8 sm:mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
            @if(isset($services) && $services->count())
                @foreach($services->take(6) as $idx=>$svc)
                @php $st = $cardStyles[$idx % count($cardStyles)]; $hint = $fallback[$idx % count($fallback)]['hint'] ?? 'Siap pakai'; @endphp
                <div class="group relative flex flex-col overflow-hidden rounded-[24px] border {{ $st['border'] }} bg-gradient-to-br {{ $st['grad'] }} p-[1.2px] hover:shadow-[0_12px_32px_-12px_rgba(15,42,74,0.18)] hover:-translate-y-1.5 transition-all duration-300">
                    <div class="relative flex flex-col h-full rounded-[22px] bg-gradient-to-br {{ $st['grad'] }} p-6 sm:p-7 overflow-hidden">
                        <span class="absolute top-5 right-6 font-display font-extrabold text-[44px] leading-none tracking-tight text-slate-900/[0.035] group-hover:text-slate-900/[0.06] transition select-none">{{ str_pad($idx+1, 2, '0', STR_PAD_LEFT) }}</span>
                        <div class="absolute -top-10 -right-10 w-36 h-36 rounded-full {{ $st['blob'] }} blur-2xl group-hover:scale-110 transition duration-500"></div>
                        <div class="relative flex items-start justify-between">
                            <span class="w-[52px] h-[52px] rounded-2xl bg-gradient-to-br {{ $st['iconBg'] }} text-white grid place-items-center text-[20px] shadow-lg shadow-slate-900/10 ring-1 ring-white/20 group-hover:scale-105 group-hover:rotate-[-2deg] transition duration-300">{{ $svc->icon ?? $st['icon'] }}</span>
                            <span class="w-9 h-9 rounded-full bg-white border border-slate-200 grid place-items-center text-slate-400 group-hover:bg-[#0B1D33] group-hover:text-white group-hover:border-[#0B1D33] group-hover:rotate-45 transition-all duration-300 shadow-sm">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7"/><path d="M8 7h9v9"/></svg>
                            </span>
                        </div>
                        <div class="relative mt-5">
                            <span class="inline-flex text-[11px] font-semibold tracking-wide text-[#0F2A4A] bg-white border border-slate-200 px-2.5 py-1 rounded-full shadow-sm">{{ $hint }}</span>
                        </div>
                        <h3 class="relative font-semibold text-[17px] leading-tight text-[#0B1D33] mt-3 group-hover:text-[#0F2A4A] transition">{{ $svc->title }}</h3>
                        <p class="relative text-[13.5px] leading-relaxed text-slate-500 mt-2 line-clamp-3">{{ $svc->description }}</p>
                        <div class="relative mt-6 pt-5 border-t border-slate-200/60 flex items-center justify-between gap-3">
                            <a href="#contact" class="inline-flex items-center gap-2 text-sm font-semibold text-[#0F2A4A] group/link">
                                <span class="relative">Konsultasi <span class="absolute -bottom-1 left-0 w-0 h-px bg-[#0B1D33] group-hover/link:w-full transition-all duration-300"></span></span>
                                <span class="w-7 h-7 rounded-full bg-[#0B1D33] text-white grid place-items-center text-xs group-hover/link:translate-x-0.5 transition">→</span>
                            </a>
                            <span class="hidden sm:inline text-[10px] tracking-[0.14em] font-bold text-slate-400">SMK BPPI</span>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                @foreach($fallback as $idx=>$s)
                @php $st = $cardStyles[$idx % count($cardStyles)]; @endphp
                <div class="group relative flex flex-col overflow-hidden rounded-[24px] border {{ $st['border'] }} bg-gradient-to-br {{ $st['grad'] }} p-[1.2px] hover:shadow-[0_12px_32px_-12px_rgba(15,42,74,0.18)] hover:-translate-y-1.5 transition-all duration-300">
                    <div class="relative flex flex-col h-full rounded-[22px] bg-gradient-to-br {{ $st['grad'] }} p-6 sm:p-7 overflow-hidden">
                        <span class="absolute top-5 right-6 font-display font-extrabold text-[44px] leading-none tracking-tight text-slate-900/[0.035] group-hover:text-slate-900/[0.06] transition select-none">{{ str_pad($idx+1, 2, '0', STR_PAD_LEFT) }}</span>
                        <div class="absolute -top-10 -right-10 w-36 h-36 rounded-full {{ $st['blob'] }} blur-2xl group-hover:scale-110 transition duration-500"></div>
                        <div class="relative flex items-start justify-between">
                            <span class="w-[52px] h-[52px] rounded-2xl bg-gradient-to-br {{ $st['iconBg'] }} text-white grid place-items-center text-[20px] shadow-lg shadow-slate-900/10 ring-1 ring-white/20 group-hover:scale-105 group-hover:rotate-[-2deg] transition duration-300">{{ $st['icon'] }}</span>
                            <span class="w-9 h-9 rounded-full bg-white border border-slate-200 grid place-items-center text-slate-400 group-hover:bg-[#0B1D33] group-hover:text-white group-hover:border-[#0B1D33] group-hover:rotate-45 transition-all duration-300 shadow-sm">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7"/><path d="M8 7h9v9"/></svg>
                            </span>
                        </div>
                        <div class="relative mt-5">
                            <span class="inline-flex text-[11px] font-semibold tracking-wide text-[#0F2A4A] bg-white border border-slate-200 px-2.5 py-1 rounded-full shadow-sm">{{ $s['hint'] }}</span>
                        </div>
                        <h3 class="relative font-semibold text-[17px] leading-tight text-[#0B1D33] mt-3 group-hover:text-[#0F2A4A] transition">{{ $s['t'] }}</h3>
                        <p class="relative text-[13.5px] leading-relaxed text-slate-500 mt-2">{{ $s['d'] }}</p>
                        <div class="relative mt-6 pt-5 border-t border-slate-200/60 flex items-center justify-between">
                            <a href="#contact" class="inline-flex items-center gap-2 text-sm font-semibold text-[#0F2A4A] group/link">
                                <span class="relative">Konsultasi <span class="absolute -bottom-1 left-0 w-0 h-px bg-[#0B1D33] group-hover/link:w-full transition-all duration-300"></span></span>
                                <span class="w-7 h-7 rounded-full bg-[#0B1D33] text-white grid place-items-center text-xs group-hover/link:translate-x-0.5 transition">→</span>
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
    <div class="absolute top-0 right-0 w-[500px] h-[300px] bg-white/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-72 h-72 bg-white/5 rounded-full blur-3xl pointer-events-none hidden lg:block"></div>
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
                ['grad'=>'from-[#EFF6FF] via-[#F8FAFC] to-white','border'=>'border-[#BFDBFE]/50','blob'=>'bg-[#0F2A4A]/10'],
                ['grad'=>'from-[#EFF6FF] via-white to-white','border'=>'border-[#BFDBFE]/40','blob'=>'bg-[#0F2A4A]/10'],
                ['grad'=>'from-[#EFF6FF]/70 via-white to-white','border'=>'border-[#BFDBFE]/40','blob'=>'bg-[#0F2A4A]/10'],
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
                            <span class="absolute top-3 left-3 text-xs font-semibold text-[#0F2A4A] bg-white/90 backdrop-blur border border-slate-200 px-2.5 py-1 rounded-full shadow-sm">{{ $pf->client->name ?? $pf->client_name ?? 'Client' }}</span>
                            <span class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white border border-slate-200 grid place-items-center text-slate-400 group-hover:bg-[#0B1D33] group-hover:text-white group-hover:border-[#0B1D33] group-hover:rotate-45 transition-all duration-300 shadow-sm text-xs">↗</span>
                            <div class="absolute -top-10 -right-10 w-36 h-36 rounded-full {{ $pst['blob'] }} blur-2xl opacity-60 group-hover:scale-110 transition duration-500 pointer-events-none"></div>
                            <span class="absolute bottom-3 right-3 font-display font-extrabold text-[32px] leading-none tracking-tight text-white/80 drop-shadow select-none">{{ str_pad($idx+1,2,'0',STR_PAD_LEFT) }}</span>
                        </div>
                        <div class="p-6 flex-1 flex flex-col bg-gradient-to-br {{ $pst['grad'] }}">
                            <h3 class="font-semibold text-[16px] leading-tight text-[#0B1D33] line-clamp-2 group-hover:text-[#0F2A4A] transition">{{ $pf->title }}</h3>
                            <p class="text-xs text-slate-500 mt-2">{{ $pf->client_name ?? $pf->client?->name ?? 'Client' }}</p>
                            <div class="mt-4 pt-4 border-t border-slate-200/60 flex items-center justify-between">
                                <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-[#0F2A4A]">Lihat detail <span class="w-6 h-6 rounded-full bg-[#0B1D33] text-white grid place-items-center text-[10px]">→</span></span>
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

{{-- INSIGHTS PREVIEW — DISEMBUNYIKAN SEMENTARA (website umum) — hapus @if(false)/@endif untuk tampilkan lagi --}}
@if(false)
<section id="insights" class="scroll-mt-20 py-12 sm:py-16 lg:py-20 bg-gradient-to-b from-[#F8FAFC] via-[#EFF6FF]/20 to-[#F8FAFC]/50 relative overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[250px] bg-white/5 rounded-full blur-3xl pointer-events-none"></div>
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
                ['grad'=>'from-[#EFF6FF]/60 via-white to-white','border'=>'border-[#BFDBFE]/40','blob'=>'bg-[#0F2A4A]/10'],
                ['grad'=>'from-[#EFF6FF]/60 via-white to-white','border'=>'border-[#BFDBFE]/40','blob'=>'bg-[#0F2A4A]/10'],
                ['grad'=>'from-[#EFF6FF] via-white to-white','border'=>'border-[#BFDBFE]/40','blob'=>'bg-[#0F2A4A]/10'],
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
                            <span class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white border border-slate-200 grid place-items-center text-slate-400 group-hover:bg-[#0B1D33] group-hover:text-white group-hover:border-[#0B1D33] group-hover:rotate-45 transition-all duration-300 shadow-sm text-xs">↗</span>
                            <div class="absolute -top-10 -right-10 w-36 h-36 rounded-full {{ $ist['blob'] }} blur-2xl opacity-60 group-hover:scale-110 transition duration-500 pointer-events-none"></div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col bg-gradient-to-br {{ $ist['grad'] }}">
                            <h3 class="font-semibold text-[#0B1D33] line-clamp-2 group-hover:text-[#0F2A4A] text-[15px] leading-snug">{{ $a->title }}</h3>
                            <p class="text-sm text-slate-500 mt-2 line-clamp-2">{{ $a->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($a->content),90) }}</p>
                            <div class="mt-4 pt-4 border-t border-slate-200/60 flex items-center justify-between">
                                <span class="text-xs text-slate-400">{{ $a->created_at?->format('d M Y') }} • {{ $a->user?->name ?? 'Admin' }}</span>
                                <span class="inline-flex items-center gap-1 text-xs font-semibold text-[#0F2A4A]">Baca <span class="w-6 h-6 rounded-full bg-[#0B1D33] text-white grid place-items-center text-[10px]">→</span></span>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full">
                    <div class="bg-white rounded-[24px] border border-dashed border-slate-300 p-8 sm:p-12 text-center shadow-sm max-w-2xl mx-auto">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#EFF6FF] to-white border border-[#BFDBFE]/50 grid place-items-center mx-auto text-[#0F2A4A]">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                        </div>
                        <h3 class="font-bold text-[#0B1D33] mt-4 text-lg">Belum ada Insight</h3>
                        <p class="text-sm text-slate-500 mt-2 leading-relaxed">Insight akan tampil di sini setelah admin menambahkan artikel via <span class="font-mono text-xs bg-slate-100 border px-1.5 py-0.5 rounded">/admin/articles</span> dan mencentang <b>Publish langsung</b>. Semua konten 100% manual — tidak ada dummy.</p>
                        <div class="mt-6 flex flex-col sm:flex-row gap-3 justify-center">
                            <a href="{{ route('insights') }}" class="px-5 py-2.5 rounded-full bg-white border border-slate-200 text-sm font-semibold text-[#0B1D33] hover:bg-slate-50">Lihat halaman Insights →</a>
                            @auth
                                @if(auth()->user()->role==='admin')
                                    <a href="{{ route('admin.articles.create') }}" class="px-5 py-2.5 rounded-full bg-[#0B1D33] text-white text-sm font-semibold hover:bg-[#0B1D33] shadow">+ Tulis Insight di Admin</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endif

{{-- FAQ PREVIEW — diberi warna tipis biar tidak flat --}}
<section id="faq" class="scroll-mt-20 py-12 sm:py-16 lg:py-20 bg-gradient-to-b from-[#F8FAFC] via-[#EFF6FF]/40 to-white border-y border-slate-100 relative overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[320px] bg-white/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-white/5 rounded-full blur-3xl pointer-events-none hidden lg:block"></div>
    <div class="absolute -left-20 top-20 w-64 h-64 bg-[#93C5FD]/[0.06] rounded-full blur-3xl pointer-events-none hidden lg:block"></div>
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

{{-- KONTAK — form + info langsung di home (tidak perlu buka halaman lain) --}}
<section id="contact" class="scroll-mt-20 py-12 sm:py-16 lg:py-20 bg-gradient-to-b from-white via-[#F8FAFC] to-white border-y border-slate-100 relative overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[280px] bg-[#DBEAFE]/25 rounded-full blur-3xl pointer-events-none"></div>
    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        {{-- header dark rounded inset, senada section klien --}}
        <div class="relative overflow-hidden rounded-[24px] sm:rounded-[28px] bg-gradient-to-br from-[#0F2A4A] via-[#0B1D33] to-[#071425] border border-white/10 shadow-xl p-6 sm:p-8 lg:p-10 text-white" style="background-color:#0B1D33">
            <div class="absolute inset-0 opacity-[0.12] pointer-events-none" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 26px 26px;"></div>
            <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-[#93C5FD]/20 blur-3xl pointer-events-none"></div>
            <div class="relative">
                <span class="inline-flex items-center gap-2 text-[11px] sm:text-xs tracking-[0.16em] font-bold text-white/60 bg-white/10 border border-white/15 px-3 py-1 rounded-full backdrop-blur">KONTAK • SMK BPPI BALEENDAH</span>
                <h2 class="text-2xl sm:text-3xl lg:text-[32px] font-bold mt-3 leading-tight tracking-tight">Mau Bikin Website?<br><span class="text-[#93C5FD]">Cerita Aja Dulu.</span></h2>
                <p class="text-white/65 mt-3 max-w-2xl text-sm sm:text-[15px] leading-relaxed">Isi form singkat — tim Unit Produksi PPLG SMK BPPI Baleendah akan balas dalam 1×24 jam. Konsultasi pertama gratis, santai & tanpa maksa.</p>
            </div>
        </div>
        {{-- form + info --}}
        <div class="mt-8 sm:mt-10 grid lg:grid-cols-5 gap-6 lg:gap-8">
            <div class="lg:col-span-3 bg-white rounded-[24px] border border-slate-100 shadow-card p-6 sm:p-8">
                @if(session('success'))<div class="mb-6 rounded-xl bg-[#EFF6FF] border border-[#BFDBFE] text-[#0F2A4A] px-4 py-3 text-sm font-medium">{{ session('success') }}</div>@endif
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-5">
                        <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama *</label><input type="text" name="name" required value="{{ old('name') }}" placeholder="Nama kamu / brand" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20"></div>
                        <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Email *</label><input type="email" name="email" required value="{{ old('email') }}" placeholder="email aktif" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]"></div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-5">
                        <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">WhatsApp</label><input type="text" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="+62..." class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]"></div>
                        <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Butuh bantuan apa?</label><select name="service" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]"><option value="">Pilih</option><option>Website Siap Pakai</option><option>Branding & Desain</option><option>Konten / Sosmed</option><option>Konsultasi dulu</option><option>Lainnya</option></select></div>
                    </div>
                    <div><label class="block text-sm font-semibold text-slate-700 mb-1.5">Ceritakan kebutuhanmu *</label><textarea name="message" rows="4" required placeholder="Contoh: Mau bikin website profil UMKM, butuh 4 halaman, ada katalog..." class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]">{{ old('message') }}</textarea></div>
                    <button type="submit" class="w-full py-3.5 rounded-xl bg-[#0B1D33] hover:bg-[#0F2A4A] text-white font-semibold shadow transition">Kirim — Konsultasi Gratis</button>
                    <p class="text-center text-xs text-slate-400">Dibangun siswa SMK BPPI Baleendah • Respon 1×24 jam • Tanpa kewajiban lanjut</p>
                </form>
            </div>
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-[#EFF6FF] border border-[#BFDBFE] rounded-[20px] p-6">
                    <h3 class="font-semibold text-[#0B1D33]">Kontak Langsung</h3>
                    <div class="mt-4 space-y-3 text-sm">
                        <div class="flex gap-3"><span class="w-9 h-9 rounded-xl bg-white grid place-items-center shrink-0">📍</span><span>Jl. Adipati Agung No.23, Baleendah, Kec. Baleendah, Kabupaten Bandung, Jawa Barat 40375<br><span class="text-slate-500">Studio siswa — jam sekolah & mentoring</span></span></div>
                        <div class="flex gap-3"><span class="w-9 h-9 rounded-xl bg-white grid place-items-center shrink-0">✉️</span><span>smstudiobppi@gmail.com<br><span class="text-slate-500">Respon &lt; 1×24 jam</span></span></div>
                        <div class="flex gap-3"><span class="w-9 h-9 rounded-xl bg-white grid place-items-center shrink-0">📞</span><a href="https://wa.me/6285974371102?text=Halo%20SM%20Studio%2C%20saya%20mau%20konsultasi%20gratis" target="_blank" rel="noopener noreferrer" class="hover:underline leading-tight text-[#0F2A4A] font-medium">+62 859-7437-1102<br><span class="text-slate-500 font-normal">WA / Call — chat aja dulu</span></a></div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-[#0F2A4A] via-[#0B1D33] to-[#071425] rounded-[20px] p-6 text-white border border-white/10 shadow-xl" style="background-color:#0B1D33">
                    <h3 class="font-semibold">Kenapa Pilih SM STUDIO?</h3>
                    <ul class="mt-3 space-y-2 text-sm text-white/70">
                        <li class="flex gap-2"><span class="text-[#93C5FD]">✓</span> Unit Produksi PPLG, tapi dikurasi mentor — rapi & siap pakai</li>
                        <li class="flex gap-2"><span class="text-[#93C5FD]">✓</span> Proses jelas, komunikasi friendly & transparan</li>
                        <li class="flex gap-2"><span class="text-[#93C5FD]">✓</span> Harga ramah UMKM/sekolah, tetap profesional</li>
                    </ul>
                    <a href="https://wa.me/6285974371102?text=Halo%20SM%20Studio%2C%20saya%20mau%20konsultasi%20gratis" target="_blank" rel="noopener noreferrer" class="mt-5 flex items-center justify-center gap-2 w-full py-3 rounded-xl bg-white text-[#0B1D33] font-bold text-sm shadow-md hover:bg-[#93C5FD] hover:text-white transition">Chat WhatsApp Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA — versi premium sesuai referensi: kartu biru tua ramping, divider tengah, tombol pill --}}
<section class="pb-8 sm:pb-10 pt-0 bg-[#F8FAFC]">
    <div class="max-w-[1024px] mx-auto px-4 sm:px-6">
        <div class="group relative overflow-hidden rounded-[18px] sm:rounded-[20px] bg-gradient-to-br from-[#0F2A4A] via-[#0B1D33] to-[#071425] border border-white/10 shadow-[0_20px_45px_-18px_rgba(11,29,51,0.55)] hover:shadow-[0_28px_60px_-18px_rgba(11,29,51,0.65)] transition-all duration-300" style="background-color:#0B1D33">
            {{-- dekorasi --}}
            <div class="absolute inset-0 opacity-[0.10] pointer-events-none" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 26px 26px;"></div>
            <div class="absolute -right-20 -top-24 w-72 h-72 rounded-full bg-[#93C5FD]/20 blur-3xl pointer-events-none group-hover:scale-110 transition-transform duration-700"></div>
            <div class="absolute -left-24 -bottom-24 w-60 h-60 rounded-full bg-white/[0.06] blur-3xl pointer-events-none"></div>
            <div class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-[1400ms] ease-out bg-gradient-to-r from-transparent via-white/[0.06] to-transparent pointer-events-none"></div>
            <div class="relative flex flex-col sm:flex-row sm:items-center gap-5 sm:gap-0 p-6 sm:p-8 lg:px-10 lg:py-9">
                {{-- kiri: teks --}}
                <div class="flex-1 text-center sm:text-left sm:pr-8">
                    <span class="inline-flex items-center gap-2 text-[10px] sm:text-[11px] font-extrabold tracking-[0.18em] text-[#93C5FD] bg-white/[0.07] border border-white/10 px-3 py-1 rounded-full">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#93C5FD] animate-pulse"></span>
                        SMK BPPI BALEENDAH • UNIT PRODUKSI PPLG
                    </span>
                    <h3 class="mt-3 text-xl sm:text-2xl font-bold leading-tight text-white tracking-tight">Ada ide? Kami siap bantu wujudkan.</h3>
                    <p class="text-white/60 mt-2 text-[13px] sm:text-sm leading-relaxed">SMK BPPI Baleendah • Dibangun siswa, didampingi mentor — konsultasi pertama gratis 30 menit.</p>
                    <div class="mt-3 flex flex-wrap items-center justify-center sm:justify-start gap-x-4 gap-y-1.5 text-[11px] sm:text-xs text-white/50">
                        <span class="inline-flex items-center gap-1.5"><span class="text-[#93C5FD]">✓</span> Respon 1×24 jam</span>
                        <span class="inline-flex items-center gap-1.5"><span class="text-[#93C5FD]">✓</span> Gratis 30 menit</span>
                        <span class="hidden min-[400px]:inline-flex items-center gap-1.5"><span class="text-[#93C5FD]">✓</span> Tanpa komitmen</span>
                    </div>
                </div>
                {{-- divider tengah ala referensi --}}
                <span class="hidden sm:block w-px self-stretch bg-gradient-to-b from-transparent via-white/15 to-transparent mx-2"></span>
                <span class="sm:hidden h-px w-full bg-gradient-to-r from-transparent via-white/15 to-transparent"></span>
                {{-- kanan: tombol --}}
                <div class="shrink-0 sm:pl-8 flex flex-col items-center gap-2.5">
                    <a href="#contact" class="w-full sm:w-auto text-center inline-flex items-center justify-center gap-2 bg-white text-[#0B1D33] pl-7 pr-6 py-3.5 rounded-full font-bold text-sm shadow-xl hover:bg-[#93C5FD] hover:text-white hover:shadow-2xl hover:-translate-y-0.5 active:translate-y-0 transition-all duration-300 whitespace-nowrap">
                        Mulai Konsultasi Gratis
                        <span class="w-6 h-6 rounded-full bg-[#0B1D33] text-white grid place-items-center text-xs group-hover:translate-x-0.5 transition">→</span>
                    </a>
                    <span class="text-[11px] text-white/45">Klik sekali — langsung ke WhatsApp studio</span>
                </div>
            </div>
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
                        <div class="h-4 w-20 bg-[#DBEAFE] rounded"></div>
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
