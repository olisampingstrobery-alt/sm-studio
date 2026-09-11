@extends('layouts.admin')
@section('title','Edit FAQ')
@section('header','Edit FAQ')
@section('content')
<div class="max-w-2xl bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="px-6 py-5 border-b"><h3 class="font-semibold">Edit FAQ</h3></div>
    <form action="{{ route('admin.faqs.update',$faq) }}" method="POST" class="p-6 space-y-5">
        @csrf @method('PUT')
        <div><label class="block text-sm font-semibold mb-1.5">Pertanyaan *</label><input type="text" name="question" value="{{ old('question',$faq->question) }}" required class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A]"></div>
        <div><label class="block text-sm font-semibold mb-1.5">Jawaban *</label><textarea name="answer" rows="4" required class="w-full rounded-xl border-slate-200">{{ old('answer',$faq->answer) }}</textarea></div>
        <div class="grid md:grid-cols-3 gap-5">
            <div><label class="block text-sm font-semibold mb-1.5">Kategori</label><input type="text" name="category" value="{{ $faq->category }}" class="w-full rounded-xl border-slate-200"></div>
            <div><label class="block text-sm font-semibold mb-1.5">Urutan</label><input type="number" name="order" value="{{ $faq->order }}" class="w-full rounded-xl border-slate-200"></div>
            <div class="flex items-center gap-3 pt-6"><label class="relative inline-flex items-center cursor-pointer"><input type="checkbox" name="is_active" value="1" @checked($faq->is_active) class="sr-only peer"><div class="w-11 h-6 bg-slate-200 rounded-full peer peer-checked:bg-black after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full"></div></label><span class="text-sm">Aktif</span></div>
        </div>
        <div class="flex justify-end gap-3 pt-4 border-t"><a href="{{ route('admin.faqs.index') }}" class="px-5 py-2.5 rounded-xl border">Batal</a><button class="px-6 py-2.5 rounded-xl bg-black text-white font-semibold">Update</button></div>
    </form>
</div>
@endsection
