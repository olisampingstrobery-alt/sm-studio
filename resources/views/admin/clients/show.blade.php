@extends('layouts.admin')
@section('title',$client->name)
@section('header','Detail Client')
@section('content')
<div class="max-w-2xl bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="p-8">
        <div class="flex gap-6">
            <div class="w-24 h-24 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center overflow-hidden shrink-0">@if($client->logo)<img src="{{ asset('storage/'.$client->logo) }}" class="w-full h-full object-contain p-3">@else<span class="text-slate-400 text-xs">No logo</span>@endif</div>
            <div>
                <h1 class="text-xl font-bold text-[#0B1D33]">{{ $client->name }}</h1>
                <p class="text-sm text-slate-500">{{ $client->industry ?? 'Tanpa industri' }}</p>
                @if($client->website)<a href="{{ $client->website }}" target="_blank" class="text-sm text-[#0F2A4A] hover:underline">{{ $client->website }}</a>@endif
                <div class="mt-3"><span class="px-3 py-1 rounded-full text-xs font-semibold {{ $client->is_active ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-600' }}">{{ $client->is_active ? 'Aktif' : 'Nonaktif' }}</span></div>
            </div>
        </div>
        <div class="mt-8 grid grid-cols-2 gap-4 text-sm">
            <div class="bg-slate-50 rounded-xl p-4"><div class="text-xs text-slate-500">Slug</div><div class="font-medium text-[#0B1D33]">{{ $client->slug }}</div></div>
            <div class="bg-slate-50 rounded-xl p-4"><div class="text-xs text-slate-500">Dibuat</div><div class="font-medium">{{ $client->created_at->format('d M Y') }}</div></div>
        </div>
        <div class="mt-8 flex gap-3"><a href="{{ route('admin.clients.edit',$client) }}" class="px-5 py-2.5 rounded-xl bg-black text-white font-semibold">Edit</a><a href="{{ route('admin.clients.index') }}" class="px-5 py-2.5 rounded-xl border">Kembali</a></div>
    </div>
</div>
@endsection
