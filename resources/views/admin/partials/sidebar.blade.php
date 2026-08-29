@php
$nav = [
    ['label'=>'Dashboard','icon'=>'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6','route'=>'admin.dashboard','active'=>request()->routeIs('admin.dashboard')],
    ['label'=>'Services','icon'=>'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z','route'=>'admin.services.index','active'=>request()->routeIs('admin.services.*')],
    ['label'=>'Portfolio','icon'=>'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z','route'=>'admin.portfolio.index','active'=>request()->routeIs('admin.portfolio.*')],
    ['label'=>'Clients','icon'=>'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z','route'=>'admin.clients.index','active'=>request()->routeIs('admin.clients.*')],
    ['label'=>'Testimonials','icon'=>'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z','route'=>'admin.testimonials.index','active'=>request()->routeIs('admin.testimonials.*')],
    ['label'=>'Articles','icon'=>'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z','route'=>'admin.articles.index','active'=>request()->routeIs('admin.articles.*')],
    ['label'=>'FAQs','icon'=>'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z','route'=>'admin.faqs.index','active'=>request()->routeIs('admin.faqs.*')],
    ['label'=>'Inquiries','icon'=>'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z','route'=>'admin.inquiries.index','active'=>request()->routeIs('admin.inquiries.*')],
    ['label'=>'Categories','icon'=>'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z','route'=>'admin.categories.index','active'=>request()->routeIs('admin.categories.*')],
    ['label'=>'Settings','icon'=>'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z','route'=>'admin.settings.index','active'=>request()->routeIs('admin.settings.*')],
];
@endphp

<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
       class="fixed inset-y-0 left-0 z-40 w-72 bg-[#0B1D33] text-slate-200 flex flex-col transition-transform duration-300 ease-in-out border-r border-white/10">
    {{-- Brand --}}
    <div class="h-16 flex items-center gap-3 px-6 border-b border-white/10 shrink-0">
        <div class="w-9 h-9 rounded-xl bg-white text-[#0B1D33] grid place-items-center font-black text-sm shadow">SM</div>
        <div>
            <div class="font-bold leading-none tracking-tight text-white">SM STUDIO</div>
            <div class="text-[10px] tracking-[0.18em] text-slate-400 font-semibold">CREATIVE AGENCY</div>
        </div>
        <button @click="sidebarOpen=false" class="ml-auto lg:hidden p-2 rounded-lg hover:bg-white/10">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    {{-- User mini --}}
    <div class="px-4 py-4">
        <div class="rounded-2xl bg-white/[0.06] border border-white/10 p-3 flex items-center gap-3 backdrop-blur">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'Admin') }}&background=0F2A4A&color=fff&size=64" alt="avatar" class="w-9 h-9 rounded-full">
            <div class="min-w-0">
                <div class="text-sm font-semibold text-white truncate">{{ auth()->user()->name ?? 'Administrator' }}</div>
                <div class="text-xs text-slate-400 truncate">{{ auth()->user()->email ?? 'admin@smstudio.id' }}</div>
            </div>
            <span class="ml-auto w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.8)]"></span>
        </div>
    </div>

    {{-- Nav --}}
    <nav class="flex-1 overflow-y-auto px-3 py-2 space-y-1">
        @foreach($nav as $item)
            <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}"
               class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition
               {{ $item['active'] ? 'bg-white text-[#0B1D33] shadow' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5 shrink-0 {{ $item['active'] ? 'text-[#0F2A4A]' : 'text-slate-400 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/></svg>
                <span>{{ $item['label'] }}</span>
                @if($item['active'])<span class="ml-auto w-1.5 h-1.5 rounded-full bg-[#0F2A4A]"></span>@endif
            </a>
        @endforeach
    </nav>

    <div class="p-3 border-t border-white/10">
        <div class="rounded-xl bg-gradient-to-br from-[#1A4B7A] to-[#0F2A4A] p-4 text-white relative overflow-hidden">
            <div class="absolute -right-6 -top-6 w-20 h-20 rounded-full bg-white/10"></div>
            <div class="text-xs font-semibold tracking-wide opacity-90">Butuh bantuan?</div>
            <div class="text-sm font-bold mt-1">Dokumentasi SM Studio</div>
            <a href="#" class="mt-3 inline-flex text-xs font-semibold bg-white text-[#0F2A4A] px-3 py-1.5 rounded-full">Lihat Panduan</a>
        </div>
        <form method="POST" action="{{ route('logout') }}" class="mt-3">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2.5 rounded-xl bg-white/10 hover:bg-white/15 text-sm font-medium text-slate-200 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Keluar
            </button>
        </form>
    </div>
</aside>
