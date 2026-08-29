@extends('layouts.public')
@section('title','Portfolio')
@section('content')
<section class="bg-[#0B1D33] text-white">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <span class="text-xs tracking-widest font-semibold text-white/60">PORTFOLIO • KARYA NYATA SISWA SMK BPPI BALEENDAH</span>
        <h1 class="text-3xl font-bold mt-2">Karya Nyata, Hasil Siap Pakai.</h1>
        <p class="text-white/60 mt-3 max-w-xl">Kumpulan project beneran yang dikerjakan siswa SMK BPPI Baleendah — website, branding, dan konten untuk UMKM, sekolah, & komunitas. Bukan dummy, semua dari project nyata.</p>
    </div>
</section>
<section class="py-12">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        @if($portfolios->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($portfolios as $pf)
                <a href="{{ route('portfolio.show', $pf->slug ?? $pf->id) }}" class="group bg-white rounded-[20px] border border-slate-100 overflow-hidden hover:shadow-soft transition flex flex-col">
                    <div class="h-48 bg-slate-100 overflow-hidden shrink-0">
                        @if($pf->featured_image)
                            <img src="{{ asset('storage/'.$pf->featured_image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @elseif($pf->images->count())
                            <img src="{{ asset('storage/'.$pf->images->first()->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @else
                            <div class="w-full h-full grid place-items-center text-slate-400 text-sm bg-slate-50">No Image</div>
                        @endif
                    </div>
                    <div class="p-5 flex-1">
                        <span class="text-xs font-semibold text-[#0F2A4A] bg-[#EFF6FF] px-2.5 py-1 rounded-full">{{ $pf->category->name ?? 'Umum' }}</span>
                        <h3 class="font-semibold text-[#0B1D33] mt-3 group-hover:text-[#0F2A4A] line-clamp-2">{{ $pf->title }}</h3>
                        <p class="text-xs text-slate-500 mt-1">{{ $pf->client_name ?? $pf->client?->name ?? 'Client' }}</p>
                        @if($pf->is_featured)<span class="inline-block mt-2 text-[11px] font-bold text-amber-600 bg-amber-50 border border-amber-200 px-2 py-0.5 rounded-full">★ Featured</span>@endif
                    </div>
                </a>
                @endforeach
            </div>
            <div class="mt-8">{{ $portfolios->links() }}</div>
        @else
            <div class="bg-white rounded-2xl border border-dashed border-slate-300 p-12 text-center">
                <div class="w-12 h-12 rounded-xl bg-slate-100 grid place-items-center mx-auto text-slate-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/></svg>
                </div>
                <h3 class="font-semibold text-[#0B1D33] mt-4">Belum ada karya tayang</h3>
                <p class="text-sm text-slate-500 mt-1 max-w-md mx-auto">Karya siswa akan tayang di sini setelah dipublish via <span class="font-mono text-xs bg-slate-100 px-1.5 py-0.5 rounded">/admin/portfolio</span> — upload cover & gallery biar tampil berdampingan rapi.</p>
            </div>
        @endif
    </div>
</section>
@endsection
