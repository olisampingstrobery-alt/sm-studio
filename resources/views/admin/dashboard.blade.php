@extends('layouts.admin')
@section('title','Dashboard')
@section('header','Dashboard')
@section('content')
<div class="space-y-6">
    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @php
            $cards = [
                ['label'=>'Services','value'=>$stats['services'] ?? 0,'icon'=>'M19.428 15.428a2 2 0 00-1.022-.547','color'=>'bg-black','trend'=>'+12%'],
                ['label'=>'Portfolio','value'=>$stats['portfolio'] ?? 0,'icon'=>'M4 16l4.586-4.586','color'=>'bg-[#1A3A5C]','trend'=>'+8%'],
                ['label'=>'Clients','value'=>$stats['clients'] ?? 0,'icon'=>'M17 20h5v-2','color'=>'bg-[#0F2440]','trend'=>'+5%'],
                ['label'=>'Inquiries','value'=>$stats['inquiries'] ?? 0,'icon'=>'M3 8l7.89 5.26','color'=>'bg-amber-500','trend'=>$stats['pending_inquiries'] ?? 0 . ' pending'],
            ];
        @endphp
        @foreach($cards as $c)
            <div class="bg-white rounded-2xl border border-slate-100 p-5 shadow-card hover:shadow-soft transition">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="text-xs font-semibold tracking-widest text-slate-400 uppercase">{{ $c['label'] }}</div>
                        <div class="mt-2 text-3xl font-bold text-[#0B1D33]">{{ $c['value'] }}</div>
                        <div class="mt-1 text-xs font-medium text-emerald-600 bg-emerald-50 inline-flex px-2 py-0.5 rounded-full">{{ $c['trend'] }}</div>
                    </div>
                    <span class="w-11 h-11 rounded-xl {{ $c['color'] }} text-white grid place-items-center shadow">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $c['icon'] }}"/></svg>
                    </span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Recent Inquiries --}}
        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-card">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-semibold text-[#0B1D33]">Inquiries Terbaru</h3>
                <a href="{{ Route::has('admin.inquiries.index') ? route('admin.inquiries.index') : '#' }}" class="text-xs font-semibold text-[#0F2A4A] hover:underline">Lihat semua →</a>
            </div>
            <div class="divide-y divide-slate-100">
                @forelse($recentInquiries ?? [] as $inq)
                    <div class="p-4 flex items-center gap-4 hover:bg-slate-50">
                        <span class="w-10 h-10 rounded-full bg-[#EFF6FF] text-[#0F2A4A] grid place-items-center font-bold text-sm">{{ strtoupper(substr($inq->name,0,1)) }}</span>
                        <div class="min-w-0 flex-1">
                            <div class="text-sm font-semibold text-slate-800 truncate">{{ $inq->name }} <span class="font-normal text-slate-500">— {{ $inq->email }}</span></div>
                            <div class="text-xs text-slate-500 truncate">{{ Str::limit($inq->message, 60) }}</div>
                        </div>
                        <span class="text-[11px] font-semibold px-2.5 py-1 rounded-full {{ $inq->status==='pending' ? 'bg-amber-100 text-amber-700' : 'bg-emerald-100 text-emerald-700' }}">{{ ucfirst($inq->status) }}</span>
                    </div>
                @empty
                    <div class="p-10 text-center text-sm text-slate-400">Belum ada inquiries.</div>
                @endforelse
            </div>
        </div>

        {{-- Quick Actions & Portfolio --}}
        <div class="space-y-6">
            <div class="bg-black rounded-2xl p-6 text-white relative overflow-hidden">
                <div class="absolute -right-10 -top-10 w-40 h-40 rounded-full bg-white/10"></div>
                <h4 class="font-semibold relative">Aksi Cepat</h4>
                <p class="text-sm text-white/70 mt-1 relative">Kelola konten lebih cepat.</p>
                <div class="grid grid-cols-2 gap-3 mt-5 relative">
                    <a href="{{ Route::has('admin.services.create') ? route('admin.services.create') : '#' }}" class="bg-white text-[#0B1D33] rounded-xl px-3 py-3 text-xs font-semibold text-center">+ Service</a>
                    <a href="{{ Route::has('admin.portfolio.create') ? route('admin.portfolio.create') : '#' }}" class="bg-white/15 text-white rounded-xl px-3 py-3 text-xs font-semibold text-center border border-white/20">+ Portfolio</a>
                    <a href="{{ Route::has('admin.articles.create') ? route('admin.articles.create') : '#' }}" class="bg-white/15 text-white rounded-xl px-3 py-3 text-xs font-semibold text-center border border-white/20">+ Article</a>
                    <a href="{{ Route::has('admin.clients.create') ? route('admin.clients.create') : '#' }}" class="bg-white text-[#0B1D33] rounded-xl px-3 py-3 text-xs font-semibold text-center">+ Client</a>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-100 shadow-card">
                <div class="p-6 border-b border-slate-100"><h3 class="font-semibold text-[#0B1D33]">Portfolio Terkini</h3></div>
                <div class="p-4 space-y-3">
                    @forelse($recentPortfolio ?? [] as $pf)
                        <div class="flex gap-3 items-center">
                            <div class="w-14 h-14 rounded-xl bg-slate-100 overflow-hidden shrink-0">
                                @if($pf->featured_image)<img src="{{ asset('storage/'.$pf->featured_image) }}" class="w-full h-full object-cover">@else<div class="w-full h-full grid place-items-center text-slate-400 text-xs">No img</div>@endif
                            </div>
                            <div class="min-w-0">
                                <div class="text-sm font-semibold truncate">{{ $pf->title }}</div>
                                <div class="text-xs text-slate-500">{{ $pf->client_name ?? $pf->client?->name ?? '-' }} • {{ ucfirst($pf->status) }}</div>
                            </div>
                        </div>
                    @empty
                        <div class="text-sm text-slate-400 text-center py-6">Belum ada portfolio.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
