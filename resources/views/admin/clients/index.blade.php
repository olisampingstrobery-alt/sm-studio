@extends('layouts.admin')
@section('title','Clients')
@section('header','Clients')
@section('content')
<div class="bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div><h3 class="font-semibold text-[#0B1D33]">Klien Kami</h3><p class="text-sm text-slate-500">Daftar klien & mitra yang ditampilkan di publik.</p></div>
        <a href="{{ route('admin.clients.create') }}" class="inline-flex items-center gap-2 bg-[#0F2A4A] hover:bg-[#162F4A] text-white px-5 py-2.5 rounded-xl text-sm font-semibold"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg> Tambah Client</a>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @forelse($clients as $client)
            <div class="border border-slate-200 rounded-2xl p-5 hover:shadow-soft hover:border-[#0F2A4A]/20 transition bg-white group">
                <div class="flex items-start justify-between">
                    <div class="w-16 h-16 bg-slate-50 rounded-xl flex items-center justify-center overflow-hidden border border-slate-100">
                        @if($client->logo)<img src="{{ asset('storage/'.$client->logo) }}" alt="{{ $client->name }}" class="w-full h-full object-contain p-2">@else<span class="text-xs text-slate-400">No logo</span>@endif
                    </div>
                    <span class="px-2.5 py-1 rounded-full text-[11px] font-bold tracking-wide {{ $client->is_active ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-600' }}">{{ $client->is_active ? 'AKTIF' : 'NONAKTIF' }}</span>
                </div>
                <h4 class="font-semibold text-[#0B1D33] mt-3 truncate">{{ $client->name }}</h4>
                <p class="text-xs text-slate-500">{{ $client->industry ?? 'Tanpa industri' }}</p>
                @if($client->website)<a href="{{ $client->website }}" target="_blank" class="text-xs text-[#0F2A4A] hover:underline mt-1 inline-block">{{ Str::limit($client->website,28) }}</a>@endif
                <div class="mt-4 flex gap-1.5">
                    <a href="{{ route('admin.clients.show',$client) }}" class="flex-1 py-2 rounded-xl bg-slate-100 hover:bg-[#EFF6FF] text-center text-xs font-semibold text-slate-700 hover:text-[#0F2A4A]">Lihat</a>
                    <a href="{{ route('admin.clients.edit',$client) }}" class="flex-1 py-2 rounded-xl bg-[#0F2A4A] text-white text-center text-xs font-semibold hover:bg-[#162F4A]">Edit</a>
                    <form action="{{ route('admin.clients.destroy',$client) }}" method="POST" onsubmit="return confirm('Hapus client?')" class="flex-1">@csrf @method('DELETE')<button class="w-full py-2 rounded-xl bg-red-50 text-red-600 text-xs font-semibold hover:bg-red-100">Hapus</button></form>
                </div>
            </div>
            @empty<div class="col-span-full py-12 text-center text-slate-400">Belum ada client. <a href="{{ route('admin.clients.create') }}" class="text-[#0F2A4A] font-semibold">Tambah →</a></div>@endforelse
        </div>
        <div class="mt-6">{{ $clients->links() }}</div>
    </div>
</div>
@endsection
