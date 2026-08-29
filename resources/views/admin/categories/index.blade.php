@extends('layouts.admin')
@section('title','Categories')
@section('header','Categories')
@section('content')
<div class="bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="p-6 border-b flex flex-col sm:flex-row sm:items-center justify-between gap-4"><div><h3 class="font-semibold text-[#0B1D33]">Kategori</h3><p class="text-sm text-slate-500">Kelola kategori untuk services, portfolio, articles.</p></div><a href="{{ route('admin.categories.create') }}" class="inline-flex items-center gap-2 bg-[#0F2A4A] text-white px-5 py-2.5 rounded-xl text-sm font-semibold"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg> Tambah Kategori</a></div>
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="text-left text-slate-500 border-b"><th class="pb-3">#</th><th class="pb-3">Nama</th><th class="pb-3">Slug</th><th class="pb-3">Tipe</th><th class="pb-3">Aksi</th></tr></thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($categories as $cat)
                    <tr class="hover:bg-slate-50">
                        <td class="py-3 text-slate-500">{{ $loop->iteration }}</td>
                        <td class="py-3 font-semibold text-[#0B1D33]">{{ $cat->name }}</td>
                        <td class="py-3 text-slate-500">{{ $cat->slug }}</td>
                        <td class="py-3"><span class="px-2.5 py-1 rounded-full bg-[#EFF6FF] text-[#0F2A4A] text-xs font-medium">{{ ucfirst($cat->type) }}</span></td>
                        <td class="py-3"><div class="flex gap-1.5"><a href="{{ route('admin.categories.edit',$cat) }}" class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 grid place-items-center"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></a><form action="{{ route('admin.categories.destroy',$cat) }}" method="POST" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')<button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 grid place-items-center"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button></form></div></td>
                    </tr>
                    @empty<tr><td colspan="5" class="py-12 text-center text-slate-400">Belum ada kategori.</td></tr>@endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6">{{ $categories->links() }}</div>
    </div>
</div>
@endsection
