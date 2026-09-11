@extends('layouts.public')
@section('title', $article->title)
@section('content')
<section class="bg-white border-b border-slate-200">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <a href="{{ route('insights') }}" class="text-sm text-slate-500 hover:text-[#0F2A4A]">← Kembali ke Insights</a>
        <span class="mt-4 inline-flex px-3 py-1 rounded-full bg-[#EFF6FF] text-[#0F2A4A] text-xs font-semibold">{{ $article->category?->name ?? 'Catatan Studio' }}</span>
        <span class="mt-4 inline-flex ml-2 px-3 py-1 rounded-full bg-slate-100 text-slate-600 text-xs">SMK BPPI Baleendah • Siswa & Mentor</span>
        <h1 class="text-3xl font-bold text-[#0B1D33] mt-3 leading-tight">{{ $article->title }}</h1>
        <div class="flex items-center gap-3 mt-4 text-sm text-slate-500"><span>{{ $article->created_at->format('d M Y') }}</span><span>•</span><span>{{ $article->user?->name ?? 'Admin' }}</span></div>
    </div>
</section>
@if($article->featured_image)
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6"><img src="{{ asset('storage/'.$article->featured_image) }}" class="w-full h-80 object-cover rounded-2xl shadow"></div>
@endif
<section class="py-10">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($article->excerpt)<p class="text-lg text-slate-600 italic border-l-4 border-[#0F2A4A] pl-4 bg-slate-50 py-4 rounded-r-xl">{{ $article->excerpt }}</p>@endif
        <div class="prose prose-slate max-w-none mt-8 whitespace-pre-line leading-relaxed text-slate-700">{{ $article->content }}</div>
        <div class="mt-12 p-6 bg-black rounded-2xl text-white flex flex-col sm:flex-row items-center justify-between gap-4">
            <div><div class="font-semibold">Butuh bantuan serupa?</div><div class="text-sm text-white/70">Tim siswa SMK BPPI Baleendah siap bantu — ngobrol dulu gratis.</div></div>
            <a href="{{ route('contact') }}" class="px-6 py-3 rounded-full bg-white text-[#0B1D33] font-semibold">Konsultasi Gratis</a>
        </div>
    </div>
</section>
@endsection
