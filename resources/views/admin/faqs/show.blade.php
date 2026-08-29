@extends('layouts.admin')
@section('title','Detail FAQ')
@section('header','Detail FAQ')
@section('content')
<div class="max-w-2xl bg-white rounded-2xl shadow-card border border-slate-100 p-8">
    <span class="px-3 py-1 rounded-full bg-[#EFF6FF] text-[#0F2A4A] text-xs font-semibold">{{ $faq->category ?? 'Umum' }}</span>
    <h1 class="text-xl font-bold text-[#0B1D33] mt-3">{{ $faq->question }}</h1>
    <p class="text-slate-600 mt-4 leading-relaxed whitespace-pre-line">{{ $faq->answer }}</p>
    <div class="mt-6 flex gap-2 text-xs"><span class="px-3 py-1 rounded-full bg-slate-100">Order: {{ $faq->order }}</span><span class="px-3 py-1 rounded-full {{ $faq->is_active ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">{{ $faq->is_active ? 'Aktif' : 'Nonaktif' }}</span></div>
    <div class="mt-8 flex gap-3"><a href="{{ route('admin.faqs.edit',$faq) }}" class="px-5 py-2.5 rounded-xl bg-[#0F2A4A] text-white font-semibold">Edit</a><a href="{{ route('admin.faqs.index') }}" class="px-5 py-2.5 rounded-xl border">Kembali</a></div>
</div>
@endsection
