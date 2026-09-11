@extends('layouts.public')
@section('title','Insights')
@section('content')
<section class="bg-black text-white">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <span class="text-xs tracking-widest font-semibold text-white/60">INSIGHTS • DARI STUDIO SMK BPPI BALEENDAH</span>
        <h1 class="text-3xl font-bold mt-2">Belajar, Berbagi, Berkarya.</h1>
        <p class="text-white/60 mt-3 max-w-xl">Tips praktis, cerita project, dan wawasan digital dari keseharian siswa SMK BPPI Baleendah — ditulis tim SM STUDIO biar kamu juga bisa tumbuh bareng.</p>
    </div>
</section>
<section class="py-12">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        @if($articles->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($articles as $a)
                <a href="{{ route('insights.show', $a->slug) }}" class="group bg-white rounded-[20px] border border-slate-100 overflow-hidden hover:shadow-soft transition flex flex-col">
                    <div class="h-48 bg-slate-100 overflow-hidden shrink-0">
                        @if($a->featured_image)
                            <img src="{{ asset('storage/'.$a->featured_image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @else
                            <div class="w-full h-full grid place-items-center bg-slate-50 text-slate-400 text-sm">No Cover</div>
                        @endif
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <span class="text-xs font-semibold text-[#0F2A4A] bg-[#EFF6FF] px-2.5 py-1 rounded-full self-start">{{ $a->category?->name ?? 'Insight' }}</span>
                        <h3 class="font-semibold text-[#0B1D33] mt-3 line-clamp-2 group-hover:text-[#0F2A4A]">{{ $a->title }}</h3>
                        <p class="text-sm text-slate-500 mt-2 line-clamp-2 flex-1">{{ $a->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($a->content),90) }}</p>
                        <div class="text-xs text-slate-400 mt-4">{{ $a->created_at->format('d M Y') }} • {{ $a->user?->name ?? 'Admin' }}</div>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="mt-8">{{ $articles->links() }}</div>
        @else
            <div class="bg-white rounded-2xl border border-dashed border-slate-300 p-12 text-center">
                <div class="w-12 h-12 rounded-xl bg-slate-100 grid place-items-center mx-auto text-slate-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                </div>
                <h3 class="font-semibold text-[#0B1D33] mt-4">Belum ada artikel</h3>
                <p class="text-sm text-slate-500 mt-1 max-w-md mx-auto">Admin belum mempublish artikel. Buat via <span class="font-mono text-xs bg-slate-100 px-1.5 py-0.5 rounded">/admin/articles</span> centang <b>Publish langsung</b> + upload Cover.</p>
            </div>
        @endif
    </div>
</section>
@endsection
