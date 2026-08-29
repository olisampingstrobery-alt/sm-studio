@extends('layouts.admin')
@section('title','Tambah Testimoni')
@section('header','Tambah Testimoni')
@section('content')
<div class="max-w-2xl bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="px-6 py-5 border-b"><h3 class="font-semibold text-[#0B1D33]">Testimoni Baru</h3></div>
    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
        @csrf
        <div class="grid md:grid-cols-2 gap-5">
            <div><label class="block text-sm font-semibold mb-1.5">Nama *</label><input type="text" name="name" required class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]"></div>
            <div><label class="block text-sm font-semibold mb-1.5">Client (opsional)</label><select name="client_id" class="w-full rounded-xl border-slate-200"><option value="">Pilih client</option>@foreach($clients as $c)<option value="{{ $c->id }}">{{ $c->name }}</option>@endforeach</select></div>
            <div><label class="block text-sm font-semibold mb-1.5">Posisi</label><input type="text" name="position" placeholder="CEO" class="w-full rounded-xl border-slate-200"></div>
            <div><label class="block text-sm font-semibold mb-1.5">Perusahaan</label><input type="text" name="company" placeholder="PT ..." class="w-full rounded-xl border-slate-200"></div>
            <div><label class="block text-sm font-semibold mb-1.5">Rating</label><select name="rating" class="w-full rounded-xl border-slate-200"><option value="5">★★★★★ 5</option><option value="4">★★★★ 4</option><option value="3">★★★ 3</option><option value="2">★★ 2</option><option value="1">★ 1</option></select></div>
            <div><label class="block text-sm font-semibold mb-1.5">Foto</label><input type="file" name="photo" accept="image/*" class="w-full rounded-xl border-slate-200"></div>
        </div>
        <div><label class="block text-sm font-semibold mb-1.5">Isi Testimoni *</label><textarea name="content" rows="4" required placeholder="Tulis testimoni..." class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]"></textarea></div>
        <div class="flex items-center gap-3"><label class="relative inline-flex items-center cursor-pointer"><input type="checkbox" name="is_active" value="1" checked class="sr-only peer"><div class="w-11 h-6 bg-slate-200 rounded-full peer peer-checked:bg-[#0F2A4A] after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full"></div></label><span class="text-sm font-medium">Aktif</span></div>
        <div class="flex justify-end gap-3 pt-4 border-t"><a href="{{ route('admin.testimonials.index') }}" class="px-5 py-2.5 rounded-xl border">Batal</a><button class="px-6 py-2.5 rounded-xl bg-[#0F2A4A] text-white font-semibold">Simpan</button></div>
    </form>
</div>
@endsection
