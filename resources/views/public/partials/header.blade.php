<header class="sticky top-0 z-50 bg-white/80 backdrop-blur supports-[backdrop-filter]:bg-white/70 border-b border-slate-200" x-data="{ open:false, scrollY: 0 }" x-init="
        $watch('open', val => {
            if(val){
                scrollY = window.scrollY;
                const sbw = window.innerWidth - document.documentElement.clientWidth;
                document.documentElement.style.overflow = 'hidden';
                document.body.style.overflow = 'hidden';
                document.body.style.position = 'fixed';
                document.body.style.top = `-${scrollY}px`;
                document.body.style.left = '0';
                document.body.style.right = '0';
                document.body.style.width = '100%';
                if(sbw > 0) document.body.style.paddingRight = sbw + 'px';
            } else {
                document.documentElement.style.overflow = '';
                document.body.style.overflow = '';
                document.body.style.position = '';
                document.body.style.top = '';
                document.body.style.left = '';
                document.body.style.right = '';
                document.body.style.width = '';
                document.body.style.paddingRight = '';
                window.scrollTo(0, scrollY);
            }
        });
        window.addEventListener('resize', () => { if(window.innerWidth >= 1024 && open) open=false; });
    " @keydown.escape.window="open=false">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0">
                <span class="w-9 h-9 rounded-[10px] bg-[#0B1D33] text-white grid place-items-center font-black text-sm">SM</span>
                <span class="font-bold tracking-tight text-[#0B1D33] text-[15px]">SM STUDIO</span>
                <span class="hidden sm:inline text-[10px] tracking-[0.18em] text-slate-400 font-semibold ml-1">SMK BPPI BALEENDAH • Unit Produksi PPLG</span>
            </a>
            {{-- DESKTOP NAV — tetap, warna & typography tidak diubah --}}
            <nav class="hidden lg:flex items-center gap-1">
                @php $navPublic = [
                    ['label'=>'Home','route'=>'home', 'anchor'=>'#home'],
                    ['label'=>'About','route'=>'about', 'anchor'=>'#about'],
                    ['label'=>'Services','route'=>'services', 'anchor'=>'#services'],
                    ['label'=>'Portfolio','route'=>'portfolio', 'anchor'=>'#portfolio'],
                    ['label'=>'Klien','route'=>'clients', 'anchor'=>'#clients'],
                    ['label'=>'FAQ','route'=>'faq', 'anchor'=>'#faq'],
                ]; @endphp
                @foreach($navPublic as $item)
                    @php
                        $isHome = request()->routeIs('home');
                        $isSeparatePage = in_array($item['route'], ['portfolio']);
                        $href = $isSeparatePage ? route($item['route']) : ($isHome ? $item['anchor'] : route('home').$item['anchor']);
                        $isActive = $isSeparatePage ? request()->routeIs($item['route']) : request()->routeIs('home') && $item['route']=='home';
                    @endphp
                    <a href="{{ $href }}" class="px-3 py-2 rounded-full text-sm font-medium transition-colors duration-200 {{ $isActive ? 'bg-[#0F2A4A] text-white' : 'text-slate-600 hover:text-[#0B1D33] hover:bg-slate-100' }}">{{ $item['label'] }}</a>
                @endforeach
            </nav>
            <div class="hidden lg:flex items-center gap-3 shrink-0">
                <a href="{{ route('contact') }}" class="px-5 py-2.5 rounded-full bg-[#0F2A4A] hover:bg-[#162F4A] text-white text-sm font-semibold shadow transition-colors duration-200">Hubungi</a>
            </div>
            {{-- MOBILE TOGGLE — fixed position tidak dorong konten --}}
            <button @click="open=!open" type="button" aria-label="Toggle menu" :aria-expanded="open.toString()" class="lg:hidden w-9 h-9 rounded-[10px] grid place-items-center border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 transition-colors duration-200 shrink-0">
                <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 18h16"/></svg>
                <svg x-show="open" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    {{-- BACKDROP — fixed overlay, tidak dorong layout, blur 10px, semi-transparan --}}
    <div x-show="open"
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="open=false"
         class="fixed inset-0 top-16 z-40 bg-[#0B1D33]/20 backdrop-blur-[10px] lg:hidden"
         aria-hidden="true"></div>

    {{-- MOBILE PANEL — floating card overlay, fixed, tidak dorong halaman, z tinggi, rounded natural, responsive max-w --}}
    <div x-show="open"
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="fixed inset-x-3 sm:inset-x-4 top-[68px] z-50 lg:hidden flex justify-center pointer-events-none"
         style="padding-top: env(safe-area-inset-top);">
        <nav class="w-full max-w-[420px] bg-white rounded-[16px] border border-slate-200/80 shadow-[0_16px_40px_-16px_rgba(15,42,74,0.22)] overflow-hidden max-h-[calc(100dvh-80px)] overflow-y-auto overscroll-contain pointer-events-auto">
            <div class="p-2.5 sm:p-3">
                <div class="space-y-1">
                    @foreach($navPublic as $idx => $item)
                        @php $isSeparateM = in_array($item['route'], ['portfolio']); $hrefMobile = $isSeparateM ? route($item['route']) : (request()->routeIs('home') ? $item['anchor'] : route('home').$item['anchor']); $activeM = $isSeparateM ? request()->routeIs($item['route']) : false; @endphp
                        <a href="{{ $hrefMobile }}" @click="open=false"
                           class="flex items-center justify-between px-3.5 py-3 rounded-[10px] text-[14px] font-medium leading-none transition-colors duration-200 {{ $activeM ? 'bg-[#0F2A4A] text-white' : 'text-slate-700 hover:bg-slate-50 hover:text-[#0B1D33] active:bg-slate-100' }}"
                           style="transition-delay: {{ $idx * 18 }}ms">
                            <span>{{ $item['label'] }}</span>
                            <span class="w-6 h-6 rounded-[8px] grid place-items-center text-[11px] {{ $activeM ? 'bg-white/15 text-white' : 'bg-slate-100 text-slate-400' }}">›</span>
                        </a>
                    @endforeach
                </div>
                {{-- CTA — rounded 12px, bukan pill, height nyaman mobile --}}
                <a href="{{ route('contact') }}" @click="open=false" class="mt-3 flex items-center justify-center w-full px-5 py-3.5 rounded-[12px] bg-[#0F2A4A] hover:bg-[#162F4A] active:bg-[#0B1D33] text-white text-[14px] font-semibold leading-none shadow-sm transition-colors duration-200">
                    Hubungi Saja
                </a>
                <p class="text-center text-[11px] text-slate-400 mt-2.5 leading-relaxed">Respon cepat • Konsultasi gratis 30 menit</p>
            </div>
        </nav>
    </div>
</header>
