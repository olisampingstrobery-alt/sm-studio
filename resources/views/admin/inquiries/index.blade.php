@extends('layouts.admin')
@section('title','Inquiries')
@section('header','Inquiries')
@section('content')
<div class="bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="p-6 border-b"><h3 class="font-semibold text-[#0B1D33]">Pesan Masuk</h3><p class="text-sm text-slate-500">Daftar inquiry dari halaman kontak publik.</p></div>
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="text-left text-slate-500 border-b"><th class="pb-3">Nama</th><th class="pb-3">Kontak</th><th class="pb-3">Layanan</th><th class="pb-3">Pesan</th><th class="pb-3">Status</th><th class="pb-3">Tanggal</th><th class="pb-3">Aksi</th></tr></thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($inquiries as $inq)
                    <tr class="hover:bg-slate-50">
                        <td class="py-3"><div class="font-semibold text-[#0B1D33]">{{ $inq->name }}</div><div class="text-xs text-slate-500">Budget: {{ $inq->budget ?? '-' }}</div></td>
                        <td class="py-3"><div class="text-xs">{{ $inq->email }}</div><div class="text-xs text-slate-500">{{ $inq->whatsapp ?? '-' }}</div></td>
                        <td class="py-3"><span class="px-2.5 py-1 rounded-full bg-[#EFF6FF] text-[#0F2A4A] text-xs">{{ $inq->service ?? '-' }}</span></td>
                        <td class="py-3 max-w-[260px]"><span class="line-clamp-2 text-slate-600 text-xs">{{ Str::limit($inq->message,80) }}</span></td>
                        <td class="py-3"><span class="px-2.5 py-1 rounded-full text-xs font-semibold @if($inq->status=='pending') bg-amber-50 text-amber-700 border border-amber-200 @elseif($inq->status=='contacted') bg-sky-50 text-sky-700 border border-sky-200 @elseif($inq->status=='completed') bg-emerald-50 text-emerald-700 border border-emerald-200 @else bg-red-50 text-red-700 border border-red-200 @endif">{{ ucfirst($inq->status) }}</span></td>
                        <td class="py-3 text-xs text-slate-500">{{ $inq->created_at->format('d M Y') }}</td>
                        <td class="py-3"><div class="flex gap-1.5"><a href="{{ route('admin.inquiries.show',$inq) }}" class="w-8 h-8 rounded-lg bg-black text-white grid place-items-center"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></a><form action="{{ route('admin.inquiries.destroy',$inq) }}" method="POST" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')<button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 grid place-items-center"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button></form></div></td>
                    </tr>
                    @empty<tr><td colspan="7" class="py-12 text-center text-slate-400">Belum ada inquiry.</td></tr>@endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6">{{ $inquiries->links() }}</div>
    </div>
</div>
@endsection
