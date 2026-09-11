@extends('layouts.admin')
@section('title',$article->title)
@section('header','Detail Artikel')
@section('content')
<div class="max-w-3xl bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    @if($article->featured_image)<img src="{{ asset('storage/'.$article->featured_image) }}" class="w-full h-64 object-cover">@endif
    <div class="p-8">
        <span class="px-3 py-1 rounded-full bg-[#EFF6FF] text-[#0F2A4A] text-xs font-semibold">{{ $article->category?->name ?? 'Tanpa kategori' }}</span>
        <h1 class="text-2xl font-bold text-[#0B1D33] mt-3">{{ $article->title }}</h1>
        <p class="text-xs text-slate-500 mt-2">Oleh {{ $article->user?->name ?? '-' }} • {{ $article->created_at->format('d M Y') }} • <span class="{{ $article->is_published ? 'text-emerald-600' : 'text-amber-600' }}">{{ $article->is_published ? 'Published' : 'Draft' }}</span></p>
        @if($article->excerpt)<p class="mt-4 text-slate-600 italic border-l-4 border-[#0F2A4A] pl-4 bg-slate-50 py-3 rounded-r-xl">{{ $article->excerpt }}</p>@endif
        <div class="prose prose-slate max-w-none mt-6 whitespace-pre-line text-slate-700 leading-relaxed">{{ $article->content }}</div>
        <div class="mt-8 flex gap-3"><a href="{{ route('admin.articles.edit',$article) }}" class="px-5 py-2.5 rounded-xl bg-black text-white font-semibold">Edit</a><a href="{{ route('admin.articles.index') }}" class="px-5 py-2.5 rounded-xl border">Kembali</a></div>
    </div>
</div>
@endsection
