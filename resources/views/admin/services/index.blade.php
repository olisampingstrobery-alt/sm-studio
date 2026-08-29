@extends('layouts.admin')
@section('title','Services')
@section('header','Services')
@section('content')
<div class="bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="font-semibold text-[#0B1D33]">Daftar Layanan</h3>
            <p class="text-sm text-slate-500">Kelola layanan yang ditampilkan di website publik.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-2 bg-[#0F2A4A] hover:bg-[#162F4A] text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg> Tambah Service
        </a>
    </div>
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left text-slate-500 border-b border-slate-200">
                        <th class="pb-3 font-medium">#</th>
                        <th class="pb-3 font-medium">Layanan</th>
                        <th class="pb-3 font-medium">Kategori</th>
                        <th class="pb-3 font-medium">Status</th>
                        <th class="pb-3 font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($services as $service)
                    <tr class="hover:bg-slate-50">
                        <td class="py-4 text-slate-500">{{ $loop->iteration + ($services->currentPage()-1)*$services->perPage() }}</td>
                        <td class="py-4">
                            <div class="font-semibold text-[#0B1D33]">{{ $service->title }}</div>
                            <div class="text-xs text-slate-500 truncate max-w-[320px]">{{ Str::limit($service->description, 70) }}</div>
                        </td>
                        <td class="py-4"><span class="px-2.5 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-medium">{{ $service->category->name ?? '-' }}</span></td>
                        <td class="py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold {{ $service->is_active ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-600 border border-slate-200' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $service->is_active ? 'bg-emerald-500' : 'bg-slate-400' }}"></span> {{ $service->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td class="py-4">
                            <div class="flex items-center gap-1.5">
                                <a href="{{ route('admin.services.show', $service) }}" class="w-8 h-8 rounded-lg bg-slate-100 hover:bg-[#EFF6FF] text-slate-600 hover:text-[#0F2A4A] grid place-items-center"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></a>
                                <a href="{{ route('admin.services.edit', $service) }}" class="w-8 h-8 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-600 grid place-items-center"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Hapus service ini?')">@csrf @method('DELETE')<button class="w-8 h-8 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 grid place-items-center"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button></form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="py-12 text-center text-slate-400">Belum ada layanan. <a href="{{ route('admin.services.create') }}" class="text-[#0F2A4A] font-semibold">Buat pertama →</a></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6">{{ $services->links() }}</div>
    </div>
</div>
@endsection
