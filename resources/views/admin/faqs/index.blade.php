@extends('layouts.admin')
@section('title','FAQs')
@section('header','FAQs')
@section('content')
<div class="bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="p-6 border-b flex flex-col sm:flex-row sm:items-center justify-between gap-4"><div><h3 class="font-semibold text-[#0B1D33]">FAQ</h3><p class="text-sm text-slate-500">Kelola pertanyaan yang sering diajukan.</p></div><a href="{{ route('admin.faqs.create') }}" class="inline-flex items-center gap-2 bg-[#0F2A4A] text-white px-5 py-2.5 rounded-xl text-sm font-semibold"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg> Tambah FAQ</a></div>
    <div class="p-6">
        <div class="space-y-3">
            @forelse($faqs as $faq)
            <div class="border border-slate-200 rounded-xl p-4 hover:border-[#0F2A4A]/20 hover:shadow-sm transition">
                <div class="flex gap-3">
                    <span class="shrink-0 w-7 h-7 rounded-full bg-[#EFF6FF] text-[#0F2A4A] grid place-items-center text-xs font-bold">{{ $loop->iteration }}</span>
                    <div class="flex-1 min-w-0">
                        <div class="font-semibold text-[#0B1D33] text-sm">{{ $faq->question }}</div>
                        <div class="text-xs text-slate-500 mt-1">{{ Str::limit($faq->answer, 120) }}</div>
                        <div class="mt-2 flex items-center gap-2 text-xs"><span class="px-2 py-1 rounded-full bg-slate-100">{{ $faq->category ?? 'Umum' }}</span><span class="text-slate-400">Order: {{ $faq->order ?? 0 }}</span><span class="px-2 py-1 rounded-full {{ $faq->is_active ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">{{ $faq->is_active ? 'Aktif' : 'Off' }}</span></div>
                    </div>
                    <div class="flex gap-1.5 shrink-0 self-start">
                        <a href="{{ route('admin.faqs.edit',$faq) }}" class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 grid place-items-center"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></a>
                        <form action="{{ route('admin.faqs.destroy',$faq) }}" method="POST" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')<button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 grid place-items-center"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button></form>
                    </div>
                </div>
            </div>
            @empty<div class="py-12 text-center text-slate-400">Belum ada FAQ.</div>@endforelse
        </div>
        <div class="mt-6">{{ $faqs->links() }}</div>
    </div>
</div>
@endsection
