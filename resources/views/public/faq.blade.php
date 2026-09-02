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
<section class="py-12 bg-gradient-to-b from-[#F8FAFC]/50 via-white to-[#F8FAFC]/30">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- React island — FAQ search + accordion (memo + deferred + content-visibility) --}}
        @php
            $faqJson = collect($faqs ?? collect())->flatMap(function($items, $cat){
                return collect($items)->map(fn($f)=>[
                    'id' => $f->id ?? null,
                    'question' => $f->question ?? $f['question'] ?? '',
                    'answer' => $f->answer ?? $f['answer'] ?? '',
                    'category' => $cat,
                ]);
            })->values();
            if($faqJson->isEmpty()){
                // fallback biar React tetap render defaults
                $faqJson = collect([]);
            }
            $faqPayload = ["faqs" => $faqJson];
        @endphp
        <div id="faq-root" class="island-loading min-h-[280px]" data-props='@json($faqPayload)'>
            <div class="space-y-3 opacity-60 animate-pulse">
                @forelse(($faqs ?? collect())->take(1) as $cat => $items)
                    @foreach(collect($items)->take(3) as $f)
                    <div class="bg-white rounded-2xl border border-slate-200 p-5"><div class="h-4 bg-slate-100 rounded w-3/4"></div><div class="h-3 bg-slate-100 rounded mt-3"></div></div>
                    @endforeach
                @empty
                    @foreach(range(1,4) as $i)<div class="bg-white rounded-2xl border border-slate-200 p-5 animate-pulse"><div class="h-4 bg-slate-100 rounded w-3/4"></div></div>@endforeach
                @endforelse
            </div>
        </div>
        <noscript>
            <div class="space-y-3" x-data="{ open: 0 }">
                @forelse($faqs ?? collect() as $category => $items)
                    <div class="mt-8"><h3 class="font-semibold text-[#0B1D33] mb-3">{{ ucfirst($category) }}</h3><div class="space-y-3">@foreach($items as $idx => $faq)<div class="bg-white rounded-2xl border border-slate-200 overflow-hidden"><button @click="open === {{ $loop->index }} ? open=null : open={{ $loop->index }}" class="w-full flex items-center justify-between p-5 text-left"><span class="font-medium text-[#0B1D33] pr-6">{{ $faq->question }}</span><span class="shrink-0 w-8 h-8 rounded-full bg-[#EFF6FF] text-[#0F2A4A] grid place-items-center">?</span></button><div x-show="open === {{ $loop->index }}" class="px-5 pb-5 text-sm text-slate-600">{{ $faq->answer }}</div></div>@endforeach</div></div>
                @empty
                    <p class="text-sm text-slate-500 text-center">Belum ada FAQ — tambah di admin.</p>
                @endforelse
            </div>
        </noscript>
        <div class="mt-12 bg-[#EFF6FF] border border-[#BFDBFE] rounded-2xl p-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div><div class="font-semibold text-[#0B1D33]">Masih ragu? Ngobrol dulu aja</div><div class="text-sm text-slate-600">Tim siswa + mentor SMK BPPI Baleendah siap jelasin dengan bahasa santai, bukan kaku.</div></div>
            <a href="{{ route('contact') }}" class="px-6 py-3 rounded-full bg-[#0F2A4A] text-white font-semibold hover:bg-[#162F4A] transition">Konsultasi Gratis</a>
        </div>
    </div>
</section>
@endsection
