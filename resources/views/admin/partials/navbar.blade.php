<header class="sticky top-0 z-20 bg-white/80 backdrop-blur border-b border-slate-200">
    <div class="flex items-center gap-4 px-4 sm:px-6 lg:px-8 h-16">
        <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-xl hover:bg-slate-100 text-slate-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>

        <div class="hidden sm:block">
            <h1 class="text-sm font-semibold tracking-tight text-[#0B1D33]">@yield('header', 'Dashboard')</h1>
            <p class="text-xs text-slate-500">Kelola konten website SM Studio dengan mudah</p>
        </div>

        <div class="ml-auto flex items-center gap-2">
            {{-- Search --}}
            <div class="hidden md:flex items-center gap-2 bg-slate-100 rounded-full px-3 py-1.5">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" placeholder="Cari..." class="bg-transparent border-0 focus:ring-0 text-sm w-40 placeholder:text-slate-400 p-0">
            </div>

            <a href="{{ route('home') }}" target="_blank" class="hidden sm:inline-flex items-center gap-2 px-3 py-2 rounded-xl bg-[#0F2A4A] text-white text-xs font-semibold hover:bg-[#162F4A] transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                Lihat Website
            </a>

            <div class="relative" x-data="{ open:false }">
                <button @click="open=!open" class="flex items-center gap-2 p-1.5 pr-2 rounded-full hover:bg-slate-100 transition">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'Admin') }}&background=0F2A4A&color=fff" class="w-8 h-8 rounded-full">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-cloak @click.outside="open=false" x-transition class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-lg border border-slate-200 py-2 z-50">
                    <div class="px-4 py-2 border-b border-slate-100">
                        <div class="text-sm font-semibold text-slate-800">{{ auth()->user()->name ?? 'Admin' }}</div>
                        <div class="text-xs text-slate-500">{{ auth()->user()->email ?? '' }}</div>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-4 py-2 text-sm hover:bg-slate-50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg> Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}">@csrf
                        <button type="submit" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm hover:bg-slate-50 text-red-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"/></svg> Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
