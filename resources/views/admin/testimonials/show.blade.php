@extends('layouts.admin')
@section('title',$testimonial->name)
@section('header','Detail Testimoni')
@section('content')
<div class="max-w-2xl bg-white rounded-2xl shadow-card border border-slate-100 p-8">
    <div class="flex gap-4">
        <img src="{{ $testimonial->photo ? asset('storage/'.$testimonial->photo) : 'https://ui-avatars.com/api/?name='.urlencode($testimonial->name).'&background=0F2A4A&color=fff' }}" class="w-16 h-16 rounded-full object-cover">
        <div><h1 class="font-bold text-[#0B1D33]">{{ $testimonial->name }}</h1><p class="text-sm text-slate-500">{{ $testimonial->position }} @if($testimonial->company) • {{ $testimonial->company }} @endif</p><div class="text-amber-400 text-sm">{{ str_repeat('★', $testimonial->rating ?? 5) }}</div></div>
    </div>
    <blockquote class="mt-6 bg-[#F8FAFC] border-l-4 border-[#0F2A4A] p-5 rounded-xl text-slate-700 leading-relaxed">“{{ $testimonial->content }}”</blockquote>
    <div class="mt-6 flex gap-3"><a href="{{ route('admin.testimonials.edit',$testimonial) }}" class="px-5 py-2.5 rounded-xl bg-[#0F2A4A] text-white font-semibold">Edit</a><a href="{{ route('admin.testimonials.index') }}" class="px-5 py-2.5 rounded-xl border">Kembali</a></div>
</div>
@endsection
