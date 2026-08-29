@extends('layouts.admin')
@section('title',$service->title)
@section('header','Detail Service')
@section('content')
<div class="max-w-3xl space-y-6">
    <div class="bg-white rounded-2xl shadow-card border border-slate-100 p-8">
        <div class="flex items-start justify-between">
            <div>
                <span class="inline-flex px-2.5 py-1 rounded-full bg-[#EFF6FF] text-[#0F2A4A] text-xs font-semibold">{{ $service->category->name ?? 'Tanpa kategori' }}</span>
                <h1 class="text-2xl font-bold text-[#0B1D33] mt-3">{{ $service->title }}</h1>
                <p class="text-slate-500 mt-2 leading-relaxed">{{ $service->description }}</p>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $service->is_active ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-600' }}">{{ $service->is_active ? 'Aktif' : 'Nonaktif' }}</span>
        </div>
        @if($service->icon)<div class="mt-6 p-4 bg-slate-50 rounded-xl text-sm"><span class="font-semibold">Icon:</span> {{ $service->icon }}</div>@endif
        @if($service->detail)<div class="mt-6 prose prose-slate max-w-none"><h3 class="font-semibold text-[#0B1D33]">Detail</h3><p class="whitespace-pre-line text-slate-600">{{ $service->detail }}</p></div>@endif
        @if($service->benefits)
            <div class="mt-6">
                <h4 class="font-semibold text-sm text-[#0B1D33] mb-2">Benefits</h4>
                <div class="flex flex-wrap gap-2">@foreach((array)$service->benefits as $b)<span class="px-3 py-1.5 rounded-full bg-[#0F2A4A] text-white text-xs font-medium">{{ $b }}</span>@endforeach</div>
            </div>
        @endif
        <div class="mt-8 flex gap-3">
            <a href="{{ route('admin.services.edit', $service) }}" class="px-5 py-2.5 rounded-xl bg-[#0F2A4A] text-white font-semibold">Edit</a>
            <a href="{{ route('admin.services.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 font-medium">Kembali</a>
        </div>
    </div>
</div>
@endsection
