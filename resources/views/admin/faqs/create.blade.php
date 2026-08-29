@extends('layouts.admin')
@section('title','Tambah FAQ')
@section('header','Tambah FAQ')
@section('content')
<div class="max-w-2xl bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="px-6 py-5 border-b"><h3 class="font-semibold">FAQ Baru</h3></div>
    <form action="{{ route('admin.faqs.store') }}" method="POST" class="p-6 space-y-5">
        @csrf
        <div><label class="block text-sm font-semibold mb-1.5">Pertanyaan *</label><input type="text" name="question" required placeholder="Contoh: Berapa lama pengerjaan website?" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]"></div>
        <div><label class="block text-sm font-semibold mb-1.5">Jawaban *</label><textarea name="answer" rows="4" required placeholder="Tulis jawaban lengkap..." class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]"></textarea></div>
        <div class="grid md:grid-cols-3 gap-5">
            <div><label class="block text-sm font-semibold mb-1.5">Kategori</label><input type="text" name="category" placeholder="Umum, Harga, Teknis" class="w-full rounded-xl border-slate-200"></div>
            <div><label class="block text-sm font-semibold mb-1.5">Urutan</label><input type="number" name="order" value="0" class="w-full rounded-xl border-slate-200"></div>
            <div class="flex items-center gap-3 pt-6"><label class="relative inline-flex items-center cursor-pointer"><input type="checkbox" name="is_active" value="1" checked class="sr-only peer"><div class="w-11 h-6 bg-slate-200 rounded-full peer peer-checked:bg-[#0F2A4A] after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full"></div></label><span class="text-sm font-medium">Aktif</span></div>
        </div>
        <div class="flex justify-end gap-3 pt-4 border-t"><a href="{{ route('admin.faqs.index') }}" class="px-5 py-2.5 rounded-xl border">Batal</a><button class="px-6 py-2.5 rounded-xl bg-[#0F2A4A] text-white font-semibold">Simpan</button></div>
    </form>
</div>
@endsection
