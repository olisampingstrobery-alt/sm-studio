@extends('layouts.admin')
@section('title','Categories')
@section('header','Categories')
@section('content')
@php
    $counts = [
        'all' => $categories->total() ?? $categories->count(),
        'service' => \App\Models\Category::where('type','service')->count(),
        'portfolio' => \App\Models\Category::where('type','portfolio')->count(),
        'article' => \App\Models\Category::where('type','article')->count(),
        'general' => \App\Models\Category::where('type','general')->count(),
    ];
    $serviceCount = \App\Models\Service::count();
    $portfolioCount = \App\Models\Portfolio::count();
    $articleCount = \App\Models\Article::count();
@endphp
<div class="w-full max-w-none space-y-6">
    {{-- Header hero --}}
    <div class="bg-gradient-to-br from-black via-zinc-900 to-black rounded-[24px] p-6 sm:p-8 text-white relative overflow-hidden shadow-card border border-white/10">
        <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-white/5 blur-3xl pointer-events-none"></div>
        <div class="absolute -left-12 -bottom-12 w-48 h-48 rounded-full bg-[#C5A880]/10 blur-2xl pointer-events-none"></div>
        <div class="absolute top-0 left-1/2 w-px h-full bg-gradient-to-b from-transparent via-white/10 to-transparent hidden lg:block"></div>
        <div class="relative flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div>
                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/15 px-3 py-1.5 rounded-full text-xs font-semibold tracking-widest">KATEGORI • TAXONOMI KONTEN</div>
                <h2 class="mt-3 text-2xl sm:text-3xl font-bold leading-tight">Kelola Kategori</h2>
                <p class="text-white/70 mt-2 text-sm sm:text-[15px] max-w-xl leading-relaxed">Atur pengelompokan untuk <span class="text-white font-semibold">Services, Portfolio, Articles</span>. Kategori yang rapi bikin filter di website umum jadi cantik & SEO-friendly. Perubahan langsung tampil di chip kategori & halaman detail.</p>
                <div class="mt-4 flex flex-wrap gap-2 text-xs">
                    <span class="inline-flex items-center gap-1.5 bg-white/10 border border-white/15 px-3 py-1.5 rounded-full"><span class="w-2 h-2 rounded-full bg-emerald-400"></span> {{ $counts['service'] }} Service</span>
                    <span class="inline-flex items-center gap-1.5 bg-white/10 border border-white/15 px-3 py-1.5 rounded-full"><span class="w-2 h-2 rounded-full bg-violet-400"></span> {{ $counts['portfolio'] }} Portfolio</span>
                    <span class="inline-flex items-center gap-1.5 bg-white/10 border border-white/15 px-3 py-1.5 rounded-full"><span class="w-2 h-2 rounded-full bg-amber-400"></span> {{ $counts['article'] }} Article</span>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 shrink-0">
                <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center justify-center gap-2 bg-white text-[#0B1D33] px-6 py-3 rounded-xl text-sm font-bold shadow-lg hover:bg-slate-100 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg> Tambah Kategori
                </a>
                <a href="{{ url('/kategori') }}" target="_blank" class="inline-flex items-center justify-center gap-2 bg-white/10 border border-white/20 text-white px-6 py-3 rounded-xl text-sm font-semibold hover:bg-white/15 backdrop-blur">Lihat di Website →</a>
            </div>
        </div>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        @php
            $statCards = [
                ['label'=>'Total Kategori','value'=>$counts['all'] + ($categories->total() ? 0 : 0),'icon'=>'◈','grad'=>'from-[#EFF6FF] to-white','border'=>'border-[#BFDBFE]/50','iconBg'=>'from-black to-zinc-900','text'=>'text-[#0F2A4A]'],
                ['label'=>'Service','value'=>$counts['service'],'icon'=>'💼','grad'=>'from-sky-50 to-white','border'=>'border-sky-200/40','iconBg'=>'from-sky-600 to-blue-600','text'=>'text-sky-700'],
                ['label'=>'Portfolio','value'=>$counts['portfolio'],'icon'=>'🎨','grad'=>'from-violet-50 to-white','border'=>'border-violet-200/40','iconBg'=>'from-violet-600 to-indigo-600','text'=>'text-violet-700'],
                ['label'=>'Article','value'=>$counts['article'],'icon'=>'📰','grad'=>'from-amber-50 to-white','border'=>'border-amber-200/40','iconBg'=>'from-amber-500 to-orange-500','text'=>'text-amber-700'],
            ];
        @endphp
        @foreach($statCards as $s)
        <div class="bg-gradient-to-br {{ $s['grad'] }} rounded-2xl border {{ $s['border'] }} p-5 relative overflow-hidden hover:shadow-md hover:-translate-y-0.5 transition">
            <div class="absolute -top-8 -right-8 w-24 h-24 rounded-full bg-white/60 blur-2xl pointer-events-none"></div>
            <div class="relative flex items-center gap-3">
                <span class="w-11 h-11 rounded-xl bg-gradient-to-br {{ $s['iconBg'] }} text-white grid place-items-center text-[18px] shadow">{{ $s['icon'] }}</span>
                <div>
                    <div class="text-2xl font-bold {{ $s['text'] }} leading-none">{{ $s['value'] }}</div>
                    <div class="text-xs font-semibold tracking-widest text-slate-500 mt-1">{{ $s['label'] }}</div>
                </div>
            </div>
            <div class="mt-3 text-[11px] text-slate-500 bg-white/70 border border-slate-200/50 px-2.5 py-1 rounded-full inline-flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Sinkron ke website umum
            </div>
        </div>
        @endforeach
    </div>

    {{-- Table card full width --}}
    <div class="bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden w-full max-w-none">
        <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <span class="w-9 h-9 rounded-xl bg-[#EFF6FF] border border-[#BFDBFE] text-[#0F2A4A] grid place-items-center">☰</span>
                <div>
                    <h3 class="font-semibold text-[#0B1D33]">Daftar Kategori</h3>
                    <p class="text-xs text-slate-500">Klik tipe untuk filter • Search di pojok kanan</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <div class="hidden sm:flex items-center gap-1.5 bg-slate-100 rounded-full px-3 py-1.5">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input type="text" id="catSearch" placeholder="Cari kategori..." class="bg-transparent border-0 focus:ring-0 text-sm w-48 placeholder:text-slate-400 p-0" onkeyup="filterCat()">
                </div>
                <div class="flex items-center gap-1.5 flex-wrap">
                    <button onclick="filterType('all')" data-type="all" class="cat-filter active px-3 py-1.5 rounded-full bg-black text-white text-xs font-semibold">Semua</button>
                    <button onclick="filterType('service')" data-type="service" class="cat-filter px-3 py-1.5 rounded-full bg-slate-100 text-slate-600 text-xs font-semibold border">Service</button>
                    <button onclick="filterType('portfolio')" data-type="portfolio" class="cat-filter px-3 py-1.5 rounded-full bg-slate-100 text-slate-600 text-xs font-semibold border">Portfolio</button>
                    <button onclick="filterType('article')" data-type="article" class="cat-filter px-3 py-1.5 rounded-full bg-slate-100 text-slate-600 text-xs font-semibold border">Article</button>
                </div>
            </div>
        </div>
        <div class="p-0">
            <div class="overflow-x-auto">
                <table class="w-full text-sm" id="catTable">
                    <thead>
                        <tr class="text-left text-xs tracking-widest font-bold text-slate-400 border-b bg-[#F8FAFC]/50">
                            <th class="py-3 px-6">#</th>
                            <th class="py-3 px-2">Nama</th>
                            <th class="py-3 px-2">Slug</th>
                            <th class="py-3 px-2">Tipe</th>
                            <th class="py-3 px-2">Terpakai</th>
                            <th class="py-3 px-6 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($categories as $cat)
                        @php
                            $typeStyles = [
                                'service' => 'bg-sky-50 text-sky-700 border-sky-200',
                                'portfolio' => 'bg-violet-50 text-violet-700 border-violet-200',
                                'article' => 'bg-amber-50 text-amber-700 border-amber-200',
                                'general' => 'bg-slate-100 text-slate-700 border-slate-200',
                            ];
                            $style = $typeStyles[$cat->type] ?? 'bg-slate-100 text-slate-700 border-slate-200';
                            $icon = $cat->type=='service' ? '💼' : ($cat->type=='portfolio' ? '🎨' : ($cat->type=='article' ? '📰' : '◈'));
                            $used = 0;
                            if($cat->type=='service') $used = \App\Models\Service::where('category_id',$cat->id)->count();
                            elseif($cat->type=='portfolio') $used = \App\Models\Portfolio::where('category_id',$cat->id)->count();
                            elseif($cat->type=='article') $used = \App\Models\Article::where('category_id',$cat->id)->count();
                            else $used = \App\Models\Service::where('category_id',$cat->id)->count() + \App\Models\Portfolio::where('category_id',$cat->id)->count() + \App\Models\Article::where('category_id',$cat->id)->count();
                        @endphp
                        <tr class="hover:bg-slate-50/70 transition group" data-type="{{ $cat->type }}" data-name="{{ strtolower($cat->name.' '.$cat->slug) }}">
                            <td class="py-3.5 px-6 text-slate-400 font-mono text-xs">{{ $loop->iteration + ($categories->firstItem() -1) }}</td>
                            <td class="py-3.5 px-2">
                                <div class="flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-[#EFF6FF] to-white border border-[#BFDBFE]/50 grid place-items-center text-[16px] shadow-sm group-hover:scale-105 transition">{{ $icon }}</span>
                                    <div>
                                        <div class="font-semibold text-[#0B1D33] group-hover:text-[#0F2A4A]">{{ $cat->name }}</div>
                                        <div class="text-xs text-slate-400">{{ $used }} konten terpakai</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3.5 px-2"><span class="font-mono text-xs bg-slate-100 px-2 py-1 rounded-full border">{{ $cat->slug }}</span></td>
                            <td class="py-3.5 px-2"><span class="px-3 py-1 rounded-full border text-xs font-bold {{ $style }}">{{ ucfirst($cat->type) }}</span></td>
                            <td class="py-3.5 px-2">
                                @if($used>0)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> {{ $used }} dipakai</span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-slate-100 text-slate-500 border text-xs">Belum dipakai</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-6">
                                <div class="flex justify-end gap-1.5">
                                    <a href="{{ route('admin.categories.edit',$cat) }}" class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 grid place-items-center hover:bg-amber-100 hover:scale-105 transition" title="Edit"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></a>
                                    <a href="{{ url('/kategori/'.$cat->slug) }}" target="_blank" class="w-8 h-8 rounded-lg bg-[#EFF6FF] text-[#0F2A4A] grid place-items-center hover:bg-[#DBEAFE] transition" title="Lihat di publik"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg></a>
                                    <form action="{{ route('admin.categories.destroy',$cat) }}" method="POST" onsubmit="return confirm('Hapus kategori \'{{ $cat->name }}\'? Konten terkait jadi Tanpa Kategori.')">@csrf @method('DELETE')<button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 grid place-items-center hover:bg-red-100 hover:scale-105 transition" title="Hapus"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button></form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="py-16 text-center">
                            <div class="max-w-md mx-auto">
                                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#EFF6FF] to-white border border-[#BFDBFE]/50 grid place-items-center mx-auto text-2xl">◈</div>
                                <h4 class="font-semibold text-[#0B1D33] mt-4">Belum ada kategori</h4>
                                <p class="text-sm text-slate-500 mt-1">Buat kategori pertama biar filter di website umum tidak kosong. Contoh: <span class="font-mono text-xs bg-slate-100 px-1.5 py-0.5 rounded">Website</span>, <span class="font-mono text-xs bg-slate-100 px-1.5 py-0.5 rounded">Branding</span>, <span class="font-mono text-xs bg-slate-100 px-1.5 py-0.5 rounded">Company Profile</span>.</p>
                                <a href="{{ route('admin.categories.create') }}" class="mt-4 inline-flex items-center gap-2 bg-black text-white px-5 py-2.5 rounded-xl text-sm font-semibold">+ Buat Kategori Pertama</a>
                            </div>
                        </td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($categories->hasPages())
            <div class="p-6 border-t border-slate-100">{{ $categories->links() }}</div>
            @endif
        </div>
    </div>
</div>
@push('scripts')
<script>
function filterType(type){
  document.querySelectorAll('.cat-filter').forEach(b=>{
    b.classList.remove('bg-black','text-white'); b.classList.add('bg-slate-100','text-slate-600','border');
    if(b.dataset.type===type){ b.classList.remove('bg-slate-100','text-slate-600','border'); b.classList.add('bg-black','text-white'); }
  });
  document.querySelectorAll('#catTable tbody tr').forEach(r=>{
    if(!r.dataset.type) return;
    r.style.display = (type==='all' || r.dataset.type===type) ? '' : 'none';
  });
}
function filterCat(){
  const q = document.getElementById('catSearch').value.toLowerCase();
  document.querySelectorAll('#catTable tbody tr').forEach(r=>{
    if(!r.dataset.name) return;
    r.style.display = r.dataset.name.includes(q) ? '' : 'none';
  });
}
</script>
@endpush
@endsection
