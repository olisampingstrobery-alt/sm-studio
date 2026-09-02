@extends('layouts.admin')
@section('title','Edit Testimoni')
@section('header','Edit Testimoni')
@section('content')
<div class="w-full bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="px-4 sm:px-6 py-4 sm:py-5 border-b border-slate-100"><h3 class="font-semibold text-[#0B1D33] text-base sm:text-lg truncate">Edit: {{ $testimonial->name }}</h3><p class="text-xs sm:text-sm text-slate-500 mt-0.5">Perbarui data testimoni</p></div>
    <form action="{{ route('admin.testimonials.update',$testimonial) }}" method="POST" enctype="multipart/form-data" class="p-4 sm:p-6 lg:p-8 space-y-5">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
            <div><label class="block text-sm font-semibold mb-1.5">Nama *</label><input type="text" name="name" value="{{ old('name',$testimonial->name) }}" required class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A] text-sm"></div>
            <div><label class="block text-sm font-semibold mb-1.5">Client</label><select name="client_id" class="w-full rounded-xl border-slate-200 text-sm"><option value="">Pilih</option>@foreach($clients as $c)<option value="{{ $c->id }}" @selected($testimonial->client_id==$c->id)>{{ $c->name }}</option>@endforeach</select></div>
            <div><label class="block text-sm font-semibold mb-1.5">Posisi</label><input type="text" name="position" value="{{ $testimonial->position }}" class="w-full rounded-xl border-slate-200 text-sm"></div>
            <div><label class="block text-sm font-semibold mb-1.5">Perusahaan</label><input type="text" name="company" value="{{ $testimonial->company }}" class="w-full rounded-xl border-slate-200 text-sm"></div>
            <div><label class="block text-sm font-semibold mb-1.5">Rating</label><select name="rating" class="w-full rounded-xl border-slate-200 text-sm">@for($i=5;$i>=1;$i--)<option value="{{ $i }}" @selected($testimonial->rating==$i)>{{ $i }} ★</option>@endfor</select></div>
            <div><label class="block text-sm font-semibold mb-1.5">Foto</label><input type="file" name="photo" class="w-full rounded-xl border-slate-200 text-sm file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:bg-[#0F2A4A] file:text-white file:text-xs file:font-semibold hover:file:bg-[#162F4A]">@if($testimonial->photo)<img src="{{ asset('storage/'.$testimonial->photo) }}" class="mt-3 w-16 h-16 rounded-full object-cover border border-slate-200">@endif</div>
        </div>
        <div><label class="block text-sm font-semibold mb-1.5">Isi *</label><textarea name="content" rows="4" required class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A] text-sm">{{ old('content',$testimonial->content) }}</textarea></div>
        <div class="flex items-center gap-3"><label class="relative inline-flex items-center cursor-pointer"><input type="checkbox" name="is_active" value="1" @checked($testimonial->is_active) class="sr-only peer"><div class="w-11 h-6 bg-slate-200 rounded-full peer peer-checked:bg-[#0F2A4A] after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full"></div></label><span class="text-sm font-medium">Aktif</span></div>
        <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 pt-4 border-t border-slate-100"><a href="{{ route('admin.testimonials.index') }}" class="w-full sm:w-auto text-center px-5 py-2.5 rounded-xl border border-slate-200 text-sm font-medium hover:bg-slate-50">Batal</a><button class="w-full sm:w-auto px-6 py-2.5 rounded-xl bg-[#0F2A4A] text-white font-semibold text-sm hover:bg-[#162F4A]">Update</button></div>
    </form>
</div>
@endsection
