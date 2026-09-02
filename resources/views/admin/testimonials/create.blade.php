@extends('layouts.admin')
@section('title','Tambah Testimoni')
@section('header','Tambah Testimoni')
@section('content')
<div class="w-full bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="px-4 sm:px-6 py-4 sm:py-5 border-b border-slate-100"><h3 class="font-semibold text-[#0B1D33] text-base sm:text-lg">Testimoni Baru</h3><p class="text-xs sm:text-sm text-slate-500 mt-0.5">Lengkapi data testimoni client untuk ditampilkan di website</p></div>
    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="p-4 sm:p-6 lg:p-8 space-y-5">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
            <div><label class="block text-sm font-semibold mb-1.5">Nama *</label><input type="text" name="name" required placeholder="Nama client" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A] text-sm"></div>
            <div><label class="block text-sm font-semibold mb-1.5">Client (opsional)</label><select name="client_id" class="w-full rounded-xl border-slate-200 text-sm"><option value="">Pilih client</option>@foreach($clients as $c)<option value="{{ $c->id }}">{{ $c->name }}</option>@endforeach</select></div>
            <div><label class="block text-sm font-semibold mb-1.5">Posisi</label><input type="text" name="position" placeholder="CEO" class="w-full rounded-xl border-slate-200 text-sm"></div>
            <div><label class="block text-sm font-semibold mb-1.5">Perusahaan</label><input type="text" name="company" placeholder="PT ..." class="w-full rounded-xl border-slate-200 text-sm"></div>
            <div><label class="block text-sm font-semibold mb-1.5">Rating</label><select name="rating" class="w-full rounded-xl border-slate-200 text-sm"><option value="5">★★★★★ 5</option><option value="4">★★★★ 4</option><option value="3">★★★ 3</option><option value="2">★★ 2</option><option value="1">★ 1</option></select></div>
            <div><label class="block text-sm font-semibold mb-1.5">Foto</label><input type="file" name="photo" accept="image/*" class="w-full rounded-xl border-slate-200 text-sm file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:bg-[#0F2A4A] file:text-white file:text-xs file:font-semibold hover:file:bg-[#162F4A]"></div>
        </div>
        <div><label class="block text-sm font-semibold mb-1.5">Isi Testimoni *</label><textarea name="content" rows="4" required placeholder="Tulis testimoni..." class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A] text-sm"></textarea></div>
        <div class="flex items-center gap-3"><label class="relative inline-flex items-center cursor-pointer"><input type="checkbox" name="is_active" value="1" checked class="sr-only peer"><div class="w-11 h-6 bg-slate-200 rounded-full peer peer-checked:bg-[#0F2A4A] after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full"></div></label><span class="text-sm font-medium">Aktif</span></div>
        <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 pt-4 border-t border-slate-100"><a href="{{ route('admin.testimonials.index') }}" class="w-full sm:w-auto text-center px-5 py-2.5 rounded-xl border border-slate-200 text-sm font-medium hover:bg-slate-50">Batal</a><button class="w-full sm:w-auto px-6 py-2.5 rounded-xl bg-[#0F2A4A] text-white font-semibold text-sm hover:bg-[#162F4A]">Simpan</button></div>
    </form>
</div>
@endsection
