@extends('layouts.public')
@section('title','FAQ')
@section('content')
<section class="bg-[#0B1D33] text-white">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <span class="text-xs tracking-widest font-semibold text-white/60">FAQ • SMK BPPI BALEENDAH</span>
        <h1 class="text-3xl font-bold mt-2">Yang Sering Ditanyakan.</h1>
        <p class="text-white/60 mt-3 max-w-xl">Jujur aja — kami Unit Produksi PPLG, tapi prosesnya profesional. Ini jawaban biar kamu makin yakin kolaborasi dengan SM STUDIO.</p>
    </div>
</section>
<section class="py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ open: 0 }">
        @forelse($faqs ?? collect() as $category => $items)
            <div class="mt-8">
                <h3 class="font-semibold text-[#0B1D33] mb-3">{{ ucfirst($category) }}</h3>
                <div class="space-y-3">
                    @foreach($items as $idx => $faq)
                    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
                        <button @click="open === {{ $loop->index }} ? open=null : open={{ $loop->index }}" class="w-full flex items-center justify-between p-5 text-left">
                            <span class="font-medium text-[#0B1D33] pr-6">{{ $faq->question ?? $faq['question'] ?? $faq->question }}</span>
                            <span class="shrink-0 w-8 h-8 rounded-full bg-[#EFF6FF] text-[#0F2A4A] grid place-items-center"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg></span>
                        </button>
                        <div x-show="open === {{ $loop->index }}" x-transition class="px-5 pb-5 text-sm text-slate-600 leading-relaxed">{{ $faq->answer ?? $faq['answer'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div x-data="{ open: 0 }" class="space-y-3">
                @foreach([
                    ['q'=>'SM STUDIO itu siapa? Beneran siswa SMK?','a'=>'Betul! SM STUDIO adalah Unit Produksi PPLG dari SMK BPPI Baleendah. Kami siswa yang belajar lewat project nyata, didampingi guru dan mentor — jadi proses tetap terarah dan hasil tetap profesional.'],
                    ['q'=>'Apakah hasilnya bakal profesional? Kan masih siswa?','a'=>'Justru itu keunggulan kami: energi muda + kurasi mentor. Setiap project direview, ada QA, dan revisi terstruktur. Banyak klien UMKM dan komunitas puas karena hasilnya rapi, cepat, dan siap pakai.'],
                    ['q'=>'Berapa lama pengerjaan website?','a'=>'Umumnya 2–4 minggu untuk landing/company profile, tergantung kelengkapan materi. Kami kasih timeline jelas di awal biar transparan.'],
                    ['q'=>'Apakah ada garansi revisi?','a'=>'Ada! 2–3x revisi mayor gratis selama pengerjaan. Kami usahakan sampai kamu oke.'],
                    ['q'=>'Bagaimana sistem pembayaran?','a'=>'DP 50% di awal, pelunasan setelah selesai & sebelum serah terima. Fleksibel untuk UMKM/sekolah — bisa diskusi dulu.'],
                    ['q'=>'Apakah bisa konsultasi gratis?','a'=>'Bisa banget! Konsultasi pertama 30 menit gratis via WA/Zoom/Google Meet. Cerita aja kebutuhanmu, kita bantu petakan solusi.'],
                    ['q'=>'Layanan apa saja yang tersedia?','a'=>'Website siap pakai, branding & desain, konten sosmed, dan support digital. Kalau bingung, konsultasi dulu — kita arahkan yang paling pas.'],
                ] as $i => $f)
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
                    <button @click="open === {{ $i }} ? open=null : open={{ $i }}" class="w-full flex items-center justify-between p-5 text-left">
                        <span class="font-medium text-[#0B1D33] pr-6">{{ $f['q'] }}</span>
                        <span class="shrink-0 w-8 h-8 rounded-full bg-[#EFF6FF] text-[#0F2A4A] grid place-items-center">?</span>
                    </button>
                    <div x-show="open === {{ $i }}" class="px-5 pb-5 text-sm text-slate-600">{{ $f['a'] }}</div>
                </div>
                @endforeach
            </div>
        @endforelse
        <div class="mt-12 bg-[#EFF6FF] border border-[#BFDBFE] rounded-2xl p-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div><div class="font-semibold text-[#0B1D33]">Masih ragu? Ngobrol dulu aja</div><div class="text-sm text-slate-600">Tim siswa + mentor SMK BPPI Baleendah siap jelasin dengan bahasa santai, bukan kaku.</div></div>
            <a href="{{ route('contact') }}" class="px-6 py-3 rounded-full bg-[#0F2A4A] text-white font-semibold hover:bg-[#162F4A]">Konsultasi Gratis</a>
        </div>
    </div>
</section>
@endsection
