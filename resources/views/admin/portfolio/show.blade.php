@extends('layouts.admin')
@section('title',$portfolio->title)
@section('header','Detail Portfolio')
@section('content')
<div class="w-full max-w-none space-y-6">
    <div class="bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden w-full">
        @if($portfolio->featured_image)<img src="{{ asset('storage/'.$portfolio->featured_image) }}" class="w-full h-72 object-cover"> @endif
        <div class="p-8">
            <div class="flex flex-wrap gap-2 mb-3"><span class="px-3 py-1 rounded-full bg-[#EFF6FF] text-[#0F2A4A] text-xs font-semibold">{{ $portfolio->category?->name ?? 'Tanpa kategori' }}</span><span class="px-3 py-1 rounded-full {{ $portfolio->status==='published' ? 'bg-emerald-50 text-emerald-700' : 'bg-amber-50 text-amber-700' }} text-xs font-semibold">{{ ucfirst($portfolio->status) }}</span>@if($portfolio->is_featured)<span class="px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-semibold">★ Featured</span>@endif</div>
            <h1 class="text-2xl font-bold text-[#0B1D33]">{{ $portfolio->title }}</h1>
            <p class="text-sm text-slate-500 mt-1">Client: {{ $portfolio->client_name ?? $portfolio->client?->name ?? '-' }} @if($portfolio->technology) • {{ is_array($portfolio->technology) ? implode(', ', $portfolio->technology) : $portfolio->technology }} @endif</p>
            <div class="prose prose-slate max-w-none mt-6">
                <h3 class="font-semibold text-[#0B1D33]">Deskripsi</h3><p class="whitespace-pre-line text-slate-600">{{ $portfolio->description }}</p>
                @if($portfolio->challenge)<h4 class="font-semibold mt-6">Challenge</h4><p class="whitespace-pre-line text-slate-600">{{ $portfolio->challenge }}</p>@endif
                @if($portfolio->solution)<h4 class="font-semibold mt-6">Solution</h4><p class="whitespace-pre-line text-slate-600">{{ $portfolio->solution }}</p>@endif
                @if($portfolio->process)<h4 class="font-semibold mt-6">Process</h4><p class="whitespace-pre-line text-slate-600">{{ $portfolio->process }}</p>@endif
                @if($portfolio->result)<h4 class="font-semibold mt-6">Result</h4><p class="whitespace-pre-line text-slate-600">{{ $portfolio->result }}</p>@endif
            </div>
            @if($portfolio->images->count())<div class="mt-8"><h4 class="font-semibold mb-3">Gallery</h4><div class="grid grid-cols-2 md:grid-cols-3 gap-4">@foreach($portfolio->images as $img)<img src="{{ asset('storage/'.$img->image) }}" class="rounded-xl object-cover h-40 w-full">@endforeach</div></div>@endif
            <div class="mt-8 flex gap-3"><a href="{{ route('admin.portfolio.edit',$portfolio) }}" class="px-5 py-2.5 rounded-xl bg-[#0F2A4A] text-white font-semibold">Edit</a><a href="{{ route('admin.portfolio.index') }}" class="px-5 py-2.5 rounded-xl border">Kembali</a></div>
        </div>
    </div>
</div>
@endsection
