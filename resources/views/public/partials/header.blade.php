<header class="sticky top-0 z-40 bg-white/80 backdrop-blur border-b border-slate-200" x-data="{ open:false }">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="w-9 h-9 rounded-xl bg-[#0B1D33] text-white grid place-items-center font-black text-sm">SM</span>
                <span class="font-bold tracking-tight text-[#0B1D33]">SM STUDIO</span>
                <span class="hidden sm:inline text-[10px] tracking-[0.18em] text-slate-400 font-semibold ml-1">SMK BPPI BALEENDAH • Unit Produksi PPLG</span>
            </a>
            <nav class="hidden lg:flex items-center gap-1">
                @php $navPublic = [
                    ['label'=>'Home','route'=>'home'],
                    ['label'=>'About','route'=>'about'],
                    ['label'=>'Services','route'=>'services'],
                    ['label'=>'Portfolio','route'=>'portfolio'],
                    ['label'=>'Clients','route'=>'clients'],
                    ['label'=>'Insights','route'=>'insights'],
                    ['label'=>'FAQ','route'=>'faq'],
                ]; @endphp
                @foreach($navPublic as $item)
                    <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}" class="px-3 py-2 rounded-full text-sm font-medium {{ request()->routeIs($item['route']) ? 'bg-[#0F2A4A] text-white' : 'text-slate-600 hover:text-[#0B1D33] hover:bg-slate-100' }}">{{ $item['label'] }}</a>
                @endforeach
            </nav>
            <div class="hidden lg:flex items-center gap-3">
                <a href="{{ route('contact') }}" class="px-5 py-2.5 rounded-full bg-[#0F2A4A] hover:bg-[#162F4A] text-white text-sm font-semibold shadow">Hubungi</a>
            </div>
            <button @click="open=!open" class="lg:hidden p-2 rounded-xl hover:bg-slate-100">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>
    <div x-show="open" x-cloak x-transition class="lg:hidden border-t border-slate-200 bg-white">
        <nav class="px-4 py-4 space-y-1">
            @foreach($navPublic as $item)
                <a href="{{ route($item['route']) }}" class="block px-4 py-3 rounded-xl text-sm font-medium {{ request()->routeIs($item['route']) ? 'bg-[#0F2A4A] text-white' : 'text-slate-700 hover:bg-slate-100' }}">{{ $item['label'] }}</a>
            @endforeach
            <a href="{{ route('contact') }}" class="block mt-3 text-center px-5 py-3 rounded-xl bg-[#0F2A4A] text-white font-semibold">Hubungi Saja</a>
        </nav>
    </div>
</header>
