<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk — SM Studio Admin</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600|outfit:600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#F1F5F9] font-sans antialiased text-slate-800 flex flex-col">
    {{-- Thin top bar — utilitarian, bukan hero --}}
    <header class="h-[52px] shrink-0 bg-white border-b border-slate-200">
        <div class="max-w-[960px] mx-auto h-full px-4 sm:px-6 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5">
                <span class="w-[30px] h-[30px] rounded-[8px] bg-[#0B1D33] text-white grid place-items-center text-[12px] font-bold tracking-tight leading-none">SM</span>
                <span class="text-[13px] font-semibold tracking-tight text-[#0B1D33]">SM STUDIO</span>
                <span class="hidden sm:inline text-[10px] tracking-[0.14em] text-slate-400 font-medium ml-1 pl-3 border-l border-slate-200">ADMIN</span>
            </a>
            <a href="{{ route('home') }}" class="text-xs font-medium text-slate-500 hover:text-[#0B1D33] transition inline-flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                Kembali ke website
            </a>
        </div>
    </header>

    {{-- Main — single centered column, tidak berdampingan --}}
    <main class="flex-1 flex items-start sm:items-center justify-center px-4 py-8 sm:py-10">
        <div class="w-full max-w-[400px]">
            {{-- Heading di luar card — lebih human, tidak marketing --}}
            <div class="text-center mb-5">
                <div class="inline-flex items-center gap-1.5 text-[10px] font-semibold tracking-[0.14em] text-slate-500 uppercase">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    Restricted access
                </div>
                <h1 class="mt-3 font-display font-semibold text-[22px] leading-none tracking-tight text-[#0B1D33]">Masuk ke dashboard</h1>
                <p class="mt-2 text-[13px] leading-relaxed text-slate-500">Gunakan email dan password admin yang terdaftar.</p>
            </div>

            {{-- Card — white, hairline border, accent top line tipis --}}
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="h-[3px] w-full bg-[#0B1D33]"></div>
                <div class="p-6 sm:p-7">
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    @if($errors->any())
                        <div class="mb-5 rounded-lg bg-red-50 border border-red-200 px-3.5 py-3 flex gap-2.5">
                            <svg class="w-4 h-4 text-red-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.29 3.86l-6.18 10.7A1 1 0 005 16h12a1 1 0 00.86-1.5l-6.18-10.7a1 1 0 00-1.72 0z"/></svg>
                            <p class="text-[13px] leading-snug text-red-700">Email atau password tidak sesuai. Periksa kembali dan coba lagi.</p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.login.store') }}" class="space-y-4" novalidate>
                        @csrf
                        <div>
                            <label for="email" class="block text-[13px] font-medium text-slate-700 mb-1.5">Email</label>
                            <div class="relative">
                                <span class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                                    <svg class="w-[16px] h-[16px]" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5A2.25 2.25 0 0119.5 19.5h-15A2.25 2.25 0 012.25 17.25V6.75M21.75 6.75A2.25 2.25 0 0019.5 4.5h-15A2.25 2.25 0 002.25 6.75m19.5 0v.375c0 .621-.504 1.125-1.125 1.125h-15c-.621 0-1.125-.504-1.125-1.125V6.75m19.5 0l-9 6-9-6"/></svg>
                                </span>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                                    placeholder="nama@smstudio.id"
                                    class="w-full rounded-lg border-slate-200 bg-white pl-9 pr-3 py-2.5 text-[14px] placeholder:text-slate-400 focus:border-[#0B1D33] focus:ring-[#0B1D33]/15 focus:ring-2" />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
                        </div>

                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <label for="password" class="block text-[13px] font-medium text-slate-700">Password</label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-[12px] font-medium text-slate-500 hover:text-[#0B1D33] underline underline-offset-4 decoration-slate-300 hover:decoration-slate-600">Lupa password?</a>
                                @endif
                            </div>
                            <div class="relative">
                                <span class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                                    <svg class="w-[16px] h-[16px]" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/></svg>
                                </span>
                                <input id="password" type="password" name="password" required autocomplete="current-password"
                                    placeholder="••••••••"
                                    class="w-full rounded-lg border-slate-200 bg-white pl-9 pr-3 py-2.5 text-[14px] placeholder:text-slate-400 focus:border-[#0B1D33] focus:ring-[#0B1D33]/15 focus:ring-2" />
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
                        </div>

                        <label class="flex items-center gap-2 py-1 cursor-pointer select-none group">
                            <input type="checkbox" name="remember" class="rounded border-slate-300 text-[#0B1D33] focus:ring-[#0B1D33]/20 w-3.5 h-3.5">
                            <span class="text-[13px] text-slate-600 group-hover:text-slate-700">Ingat saya di perangkat ini</span>
                        </label>

                        <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-[#0B1D33] hover:bg-[#0F2440] active:bg-[#071425] text-white text-[14px] font-medium py-2.5 transition-colors focus:outline-none focus:ring-2 focus:ring-[#0B1D33]/20 focus:ring-offset-2">
                            Masuk
                            <svg class="w-4 h-4 opacity-70" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </button>
                    </form>

                    <div class="mt-6 pt-5 border-t border-slate-100">
                        <p class="text-[11px] leading-relaxed text-slate-400 text-center">
                            Halaman ini hanya untuk staf SM Studio.<br>
                            Jika Anda pengunjung, silakan kembali ke <a href="{{ route('home') }}" class="font-medium text-slate-600 hover:text-[#0B1D33] underline underline-offset-2 decoration-slate-300">halaman utama</a>.
                        </p>
                    </div>
                </div>
            </div>

            <p class="text-center text-[11px] leading-relaxed text-slate-400 mt-5 px-2">
                URL login admin terpisah dari website publik.<br class="hidden sm:block"> Jangan bagikan tautan ini. &copy; {{ date('Y') }} SM Studio.
            </p>
        </div>
    </main>
</body>
</html>
