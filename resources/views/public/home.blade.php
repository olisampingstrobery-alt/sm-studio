@extends('layouts.public')
@section('title','SM STUDIO — Unit Produksi PPLG SMK BPPI Baleendah')
@section('content')
{{-- HERO --}}
<section class="relative overflow-hidden bg-[#0B1D33] text-white">
    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 32px 32px;"></div>
    <div class="absolute -right-32 -top-32 w-[520px] h-[520px] rounded-full bg-[#1A4B7A]/40 blur-3xl"></div>
    <div class="absolute -left-20 bottom-0 w-[420px] h-[420px] rounded-full bg-[#12365E]/60 blur-3xl"></div>
    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-16 lg:py-24">
        <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 items-center">
            <div>
                <span class="inline-flex items-center gap-2 bg-white/10 border border-white/15 text-white/90 px-4 py-1.5 rounded-full text-xs font-semibold tracking-widest">SMK BPPI BALEENDAH • Unit Produksi PPLG</span>
                <h1 class="mt-6 font-display font-bold text-[32px] sm:text-[40px] lg:text-[52px] leading-[0.92] tracking-tight">Dibangun Siswa SMK.<br><span class="text-[#93C5FD]">Siap untuk Kebutuhan Digital Anda.</span></h1>
                <p class="mt-4 sm:mt-5 text-sm sm:text-[15px] text-white/70 leading-relaxed max-w-xl">SM STUDIO adalah studio digital dari <span class="text-white font-semibold">SMK BPPI Baleendah</span>. Kami belajar lewat project nyata — bikin website, branding, dan solusi digital yang cepat, rapi, dan siap pakai untuk UMKM, sekolah, komunitas, dan bisnis yang mau tumbuh.</p>
                <div class="mt-6 sm:mt-8 flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                    <a href="{{ route('contact') }}" class="px-7 py-3.5 rounded-full bg-white text-[#0B1D33] font-semibold text-sm hover:bg-slate-100 transition text-center shadow-lg">Konsultasi Gratis — Mulai Project</a>
                    <a href="{{ route('portfolio') }}" class="px-7 py-3.5 rounded-full bg-white/10 border border-white/20 text-white font-semibold text-sm hover:bg-white/15 text-center backdrop-blur">Lihat Karya Nyata</a>
                </div>
                <div class="mt-10 flex items-center gap-6 text-sm">
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

{{-- LOGOS — DINAMIS dari Admin /clients --}}
<section class="py-10 sm:py-12 border-y border-slate-100 bg-gradient-to-r from-slate-50 via-white to-[#EFF6FF]/40 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-10 -right-10 w-40 h-40 rounded-full bg-[#93C5FD]/15 blur-2xl hidden sm:block"></div>
        <div class="absolute -bottom-10 -left-10 w-32 h-32 rounded-full bg-[#C5A880]/10 blur-2xl hidden sm:block"></div>
    </div>
    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-center gap-3">
            <span class="h-px w-8 sm:w-12 bg-slate-200 hidden sm:block"></span>
            <div class="text-center text-xs tracking-[0.18em] font-semibold text-slate-400">KOLABORASI NYATA — DARI KELAS KE PROJECT</div>
            <span class="h-px w-8 sm:w-12 bg-slate-200 hidden sm:block"></span>
        </div>
        @if(isset($clients) && $clients->count())
            <div class="mt-6 flex flex-wrap justify-center items-center gap-6 md:gap-10">
                @foreach($clients as $client)
                    @if($client->logo)
                        <img src="{{ asset('storage/'.$client->logo) }}" alt="{{ $client->name }}" class="h-7 md:h-8 object-contain grayscale opacity-70 hover:opacity-100 hover:grayscale-0 transition" title="{{ $client->name }} — {{ $client->industry ?? '' }}">
                    @else
                        <span class="font-bold tracking-widest text-slate-600 text-sm border border-slate-200 bg-white px-3 py-1.5 rounded-lg">{{ strtoupper($client->name) }}</span>
                    @endif
                @endforeach
            </div>
            <div class="text-center mt-4"><a href="{{ route('clients') }}" class="text-xs font-medium text-[#0F2A4A] hover:underline">Lihat semua klien →</a></div>
        @else
            <div class="mt-6 flex flex-wrap justify-center gap-8 opacity-40 grayscale">
                <span class="text-xs text-slate-400 border border-dashed border-slate-300 px-4 py-2 rounded-full">Belum ada klien — tambah di /admin/clients</span>
            </div>
        @endif
    </div>
</section>

{{-- SERVICES PREVIEW --}}
<section class="py-12 sm:py-16 lg:py-20 bg-gradient-to-b from-white via-[#F8FAFC] to-white relative overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-[#0F2A4A]/[0.03] rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-[#C5A880]/10 rounded-full blur-3xl pointer-events-none hidden lg:block"></div>
    <div class="relative max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-start gap-5 lg:gap-10 xl:gap-14">
            <div class="flex-shrink-0"><span class="inline-flex items-center gap-2 text-xs tracking-widest font-semibold text-[#0F2A4A] bg-[#EFF6FF] px-3 py-1 rounded-full border border-[#BFDBFE]">APA YANG KAMI BANTU</span><h2 class="mt-3 text-2xl sm:text-3xl font-bold text-[#0B1D33] leading-tight">Kebutuhan Digital<br class="hidden sm:block">yang Siap Pakai.</h2></div>
            <p class="text-sm sm:text-[15px] text-slate-500 max-w-[520px] lg:max-w-[440px] xl:max-w-[480px] leading-relaxed lg:pt-[18px] lg:ml-2">Butuh website, branding, atau konten? Tim siswa SMK BPPI Baleendah siap bantu — kreatif, kolaboratif, dan dibimbing mentor biar hasilnya rapi & profesional.</p>
        </div>
        <div class="mt-8 sm:mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            @php $cardAccent = ['from-[#EFF6FF]/70 to-white border-[#BFDBFE]/40','from-[#DBEAFE]/50 to-white border-[#BFDBFE]/35','from-[#EFF6FF]/40 to-white border-[#BFDBFE]/30']; @endphp
            @foreach([
                ['icon'=>'🎨','title'=>'Branding & Desain','desc'=>'Logo, visual, dan guideline yang bikin brand kamu lebih kebentuk — bukan sekadar bagus.'],
                ['icon'=>'💻','title'=>'Website Siap Pakai','desc'=>'Website cepat, responsif, SEO-ready. Dari profil usaha sampai landing page yang konversi.'],
                ['icon'=>'📈','title'=>'Konten & Digital','desc'=>'Konten, sosial media, dan strategi simple yang bantu kamu lebih kelihatan dan dipercaya.'],
            ] as $idx=>$s)
            <div class="group bg-gradient-to-br {{ $cardAccent[$idx % 3] }} rounded-[20px] sm:rounded-[24px] border p-6 sm:p-7 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                <span class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-white shadow-sm border border-slate-100 grid place-items-center text-lg group-hover:scale-110 transition">{{ $s['icon'] }}</span>
                <h3 class="font-semibold text-[#0B1D33] mt-4 sm:mt-5 text-[15px] sm:text-base">{{ $s['title'] }}</h3>
                <p class="text-sm text-slate-500 mt-2 leading-relaxed">{{ $s['desc'] }}</p>
                <a href="{{ route('services') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-[#0F2A4A] mt-4 group-hover:gap-2 transition-all">Lihat layanan <span class="transition-transform group-hover:translate-x-1">→</span></a>
            </div>
            @endforeach
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
@endsection
