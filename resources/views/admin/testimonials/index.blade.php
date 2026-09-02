@extends('layouts.admin')
@section('title','Testimonials')
@section('header','Testimonials')
@section('content')
<div class="w-full bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
    <div class="p-4 sm:p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4"><div><h3 class="font-semibold text-[#0B1D33] text-base sm:text-lg">Testimoni Klien</h3><p class="text-xs sm:text-sm text-slate-500">Kelola testimoni untuk halaman publik.</p></div><a href="{{ route('admin.testimonials.create') }}" class="w-full sm:w-auto justify-center inline-flex items-center gap-2 bg-[#0F2A4A] text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-[#162F4A]"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg> Tambah</a></div>
    <div class="p-4 sm:p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
            @forelse($testimonials as $t)
            <div class="border border-slate-200 rounded-2xl p-5 hover:shadow-soft transition bg-white">
                <div class="flex gap-3">
                    <img src="{{ $t->photo ? asset('storage/'.$t->photo) : 'https://ui-avatars.com/api/?name='.urlencode($t->name).'&background=0F2A4A&color=fff' }}" class="w-10 h-10 rounded-full object-cover">
                    <div class="flex-1 min-w-0"><div class="font-semibold text-sm text-[#0B1D33] truncate">{{ $t->name }}</div><div class="text-xs text-slate-500 truncate">{{ $t->position }} @if($t->company) • {{ $t->company }} @endif</div><div class="text-amber-400 text-xs">{{ str_repeat('★', $t->rating ?? 5) }}</div></div>
                    <span class="px-2 py-1 rounded-full text-[11px] font-bold h-fit {{ $t->is_active ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">{{ $t->is_active ? 'AKTIF' : 'OFF' }}</span>
                </div>
                <p class="text-sm text-slate-600 mt-3 line-clamp-3">“{{ Str::limit($t->content,120) }}”</p>
                <div class="mt-4 flex gap-1.5">
                    <a href="{{ route('admin.testimonials.show',$t) }}" class="flex-1 py-2 rounded-xl bg-slate-100 text-center text-xs font-semibold">Lihat</a>
                    <a href="{{ route('admin.testimonials.edit',$t) }}" class="flex-1 py-2 rounded-xl bg-[#0F2A4A] text-white text-center text-xs font-semibold">Edit</a>
                    <form action="{{ route('admin.testimonials.destroy',$t) }}" method="POST" onsubmit="return confirm('Hapus?')" class="flex-1">@csrf @method('DELETE')<button class="w-full py-2 rounded-xl bg-red-50 text-red-600 text-xs font-semibold">Hapus</button></form>
                </div>
            </div>
            @empty<div class="col-span-full py-12 text-center text-slate-400">Belum ada testimoni.</div>@endforelse
        </div>
        <div class="mt-6">{{ $testimonials->links() }}</div>
    </div>
</div>
@endsection
