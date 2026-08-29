@extends('layouts.admin')
@section('title','Articles')
@section('header','Articles / Insights')
@section('content')
<div class="bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="p-6 border-b flex flex-col sm:flex-row sm:items-center justify-between gap-4"><div><h3 class="font-semibold text-[#0B1D33]">Artikel & Insights</h3><p class="text-sm text-slate-500">Kelola konten blog untuk halaman Insights.</p></div><a href="{{ route('admin.articles.create') }}" class="inline-flex items-center gap-2 bg-[#0F2A4A] text-white px-5 py-2.5 rounded-xl text-sm font-semibold"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg> Tulis Artikel</a></div>
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="text-left text-slate-500 border-b"><th class="pb-3">Cover</th><th class="pb-3">Judul</th><th class="pb-3">Kategori</th><th class="pb-3">Penulis</th><th class="pb-3">Status</th><th class="pb-3">Tanggal</th><th class="pb-3">Aksi</th></tr></thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($articles as $a)
                    <tr class="hover:bg-slate-50">
                        <td class="py-3">@if($a->featured_image)<img src="{{ asset('storage/'.$a->featured_image) }}" class="w-12 h-12 rounded-xl object-cover">@else<div class="w-12 h-12 rounded-xl bg-slate-100 grid place-items-center text-xs text-slate-400">No</div>@endif</td>
                        <td class="py-3"><div class="font-semibold text-[#0B1D33] line-clamp-1 max-w-[280px]">{{ $a->title }}</div><div class="text-xs text-slate-500">{{ Str::limit($a->excerpt ?? $a->content,50) }}</div></td>
                        <td class="py-3"><span class="px-2.5 py-1 rounded-full bg-slate-100 text-xs">{{ $a->category?->name ?? '-' }}</span></td>
                        <td class="py-3 text-xs">{{ $a->user?->name ?? '-' }}</td>
                        <td class="py-3"><span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $a->is_published ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-amber-50 text-amber-700 border border-amber-200' }}">{{ $a->is_published ? 'Published' : 'Draft' }}</span></td>
                        <td class="py-3 text-xs text-slate-500">{{ $a->created_at->format('d M Y') }}</td>
                        <td class="py-3"><div class="flex gap-1.5"><a href="{{ route('admin.articles.show',$a) }}" class="w-8 h-8 rounded-lg bg-slate-100 grid place-items-center"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></a><a href="{{ route('admin.articles.edit',$a) }}" class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 grid place-items-center"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></a><form action="{{ route('admin.articles.destroy',$a) }}" method="POST" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')<button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 grid place-items-center"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button></form></div></td>
                    </tr>
                    @empty<tr><td colspan="7" class="py-12 text-center text-slate-400">Belum ada artikel.</td></tr>@endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6">{{ $articles->links() }}</div>
    </div>
</div>
@endsection
