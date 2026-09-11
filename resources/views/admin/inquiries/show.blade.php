@extends('layouts.admin')
@section('title','Detail Inquiry')
@section('header','Detail Inquiry')
@section('content')
<div class="max-w-3xl space-y-6">
    <div class="bg-white rounded-2xl shadow-card border border-slate-100 p-8">
        <div class="flex items-start justify-between">
            <div>
                <h1 class="text-xl font-bold text-[#0B1D33]">{{ $inquiry->name }}</h1>
                <p class="text-sm text-slate-500">{{ $inquiry->email }} • {{ $inquiry->whatsapp ?? '-' }}</p>
                <div class="mt-3 flex gap-2 text-xs"><span class="px-3 py-1 rounded-full bg-[#EFF6FF] text-[#0F2A4A]">{{ $inquiry->service ?? 'Tanpa layanan' }}</span><span class="px-3 py-1 rounded-full bg-slate-100">Budget: {{ $inquiry->budget ?? '-' }}</span></div>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-bold @if($inquiry->status=='pending') bg-amber-100 text-amber-700 @elseif($inquiry->status=='contacted') bg-sky-100 text-sky-700 @elseif($inquiry->status=='completed') bg-emerald-100 text-emerald-700 @else bg-red-100 text-red-700 @endif">{{ strtoupper($inquiry->status) }}</span>
        </div>
        <div class="mt-6 bg-slate-50 rounded-xl p-5 border border-slate-100">
            <div class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Pesan</div>
            <p class="mt-2 text-slate-700 leading-relaxed whitespace-pre-line">{{ $inquiry->message }}</p>
        </div>
        @if($inquiry->notes)<div class="mt-4 bg-amber-50 border border-amber-200 rounded-xl p-4"><div class="text-xs font-semibold text-amber-800">Catatan Admin</div><p class="text-sm text-amber-900 mt-1">{{ $inquiry->notes }}</p></div>@endif
        <div class="mt-6 text-xs text-slate-400">Diterima: {{ $inquiry->created_at->format('d M Y, H:i') }}</div>
    </div>
    <div class="bg-white rounded-2xl shadow-card border border-slate-100 p-6">
        <h3 class="font-semibold text-[#0B1D33] mb-4">Update Status</h3>
        <form action="{{ route('admin.inquiries.update',$inquiry) }}" method="POST" class="space-y-4">
            @csrf @method('PATCH')
            <div class="grid md:grid-cols-2 gap-4">
                <div><label class="block text-sm font-semibold mb-1.5">Status</label><select name="status" class="w-full rounded-xl border-slate-200"><option value="pending" @selected($inquiry->status=='pending')>Pending</option><option value="contacted" @selected($inquiry->status=='contacted')>Contacted</option><option value="completed" @selected($inquiry->status=='completed')>Completed</option><option value="rejected" @selected($inquiry->status=='rejected')>Rejected</option></select></div>
                <div><label class="block text-sm font-semibold mb-1.5">Catatan</label><input type="text" name="notes" value="{{ $inquiry->notes }}" placeholder="Catatan internal" class="w-full rounded-xl border-slate-200"></div>
            </div>
            <div class="flex justify-end gap-3"><a href="{{ route('admin.inquiries.index') }}" class="px-5 py-2.5 rounded-xl border">Kembali</a><button class="px-6 py-2.5 rounded-xl bg-black text-white font-semibold">Simpan</button></div>
        </form>
    </div>
</div>
@endsection
