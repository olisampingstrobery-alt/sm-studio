@extends('layouts.admin')
@section('title',$testimonial->name)
@section('header','Detail Testimoni')
@section('content')
<div class="w-full bg-white rounded-2xl shadow-card border border-slate-100 p-4 sm:p-6 lg:p-8">
    <div class="flex flex-col sm:flex-row gap-4 sm:items-center">
        <img src="{{ $testimonial->photo ? asset('storage/'.$testimonial->photo) : 'https://ui-avatars.com/api/?name='.urlencode($testimonial->name).'&background=0F2A4A&color=fff' }}" class="w-14 h-14 sm:w-16 sm:h-16 rounded-full object-cover shrink-0">
        <div class="min-w-0"><h1 class="font-bold text-[#0B1D33] text-base sm:text-lg truncate">{{ $testimonial->name }}</h1><p class="text-xs sm:text-sm text-slate-500 truncate">{{ $testimonial->position }} @if($testimonial->company) • {{ $testimonial->company }} @endif</p><div class="text-amber-400 text-sm mt-1">{{ str_repeat('★', $testimonial->rating ?? 5) }} <span class="text-slate-400 text-xs ml-1">({{ $testimonial->rating ?? 5 }}/5)</span></div></div>
        <span class="sm:ml-auto inline-flex self-start sm:self-auto px-3 py-1 rounded-full text-xs font-bold {{ $testimonial->is_active ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-500' }}">{{ $testimonial->is_active ? 'AKTIF' : 'NON-AKTIF' }}</span>
    </div>
    <blockquote class="mt-6 bg-[#F8FAFC] border-l-4 border-[#0F2A4A] p-4 sm:p-5 rounded-xl text-slate-700 leading-relaxed text-sm sm:text-base break-words">“{{ $testimonial->content }}”</blockquote>
    <div class="mt-6 flex flex-col-reverse sm:flex-row gap-3"><a href="{{ route('admin.testimonials.index') }}" class="w-full sm:w-auto text-center px-5 py-2.5 rounded-xl border border-slate-200 text-sm font-medium hover:bg-slate-50">Kembali</a><a href="{{ route('admin.testimonials.edit',$testimonial) }}" class="w-full sm:w-auto text-center px-5 py-2.5 rounded-xl bg-black text-white font-semibold text-sm hover:bg-black">Edit</a></div>
</div>
@endsection
