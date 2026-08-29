@extends('layouts.public')
@section('title','Klien Kami')
@section('content')
<section class="bg-[#F8FAFC] border-b border-slate-200">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <span class="text-xs tracking-widest font-semibold text-[#0F2A4A]">KLIEN & KOLABORASI • SMK BPPI BALEENDAH</span>
        <h1 class="text-3xl font-bold text-[#0B1D33] mt-2">Kolaborasi Nyata, Kepercayaan Nyata.</h1>
        <p class="text-slate-500 mt-3 max-w-xl">Dari UMKM lokal sampai komunitas sekolah — kami dipercaya bantu kebutuhan digital lewat project nyata siswa. Semua klien di sini adalah kolaborasi beneran yang dikerjakan bareng mentor.</p>
    </div>
</section>
<section class="py-12">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        @if($clients->count())
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($clients as $client)
                <div class="bg-white rounded-2xl border border-slate-100 p-8 flex flex-col items-center justify-center hover:shadow-soft hover:border-[#0F2A4A]/10 transition group">
                    <div class="w-20 h-20 bg-slate-50 rounded-xl flex items-center justify-center overflow-hidden border border-slate-100">
                        @if($client->logo)
                            <img src="{{ asset('storage/'.$client->logo) }}" alt="{{ $client->name }}" class="w-full h-full object-contain p-3">
                        @else
                            <span class="font-bold text-[#0F2A4A] text-lg">{{ strtoupper(substr($client->name,0,2)) }}</span>
                        @endif
                    </div>
                    <div class="font-semibold text-[#0B1D33] mt-4 text-sm text-center line-clamp-1">{{ $client->name }}</div>
                    <div class="text-xs text-slate-500 text-center">{{ $client->industry ?? '—' }}</div>
                    @if($client->website)
                        <a href="{{ $client->website }}" target="_blank" class="text-[11px] text-[#0F2A4A] hover:underline mt-1 truncate max-w-full">{{ parse_url($client->website, PHP_URL_HOST) ?? $client->website }}</a>
                    @endif
                </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-2xl border border-dashed border-slate-300 p-12 text-center">
                <div class="w-12 h-12 rounded-xl bg-slate-100 grid place-items-center mx-auto text-slate-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19.128a9.38 9.38 0 002.625.374 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                </div>
                <h3 class="font-semibold text-[#0B1D33] mt-4">Belum ada klien</h3>
                <p class="text-sm text-slate-500 mt-1 max-w-md mx-auto">Admin belum menambahkan klien. Silakan tambah via <span class="font-mono text-xs bg-slate-100 px-1.5 py-0.5 rounded">/admin/clients</span> — data akan otomatis muncul di sini berdampingan.</p>
            </div>
        @endif
    </div>
</section>
@endsection
