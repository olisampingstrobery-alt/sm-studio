<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — SM Studio Admin</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700|outfit:500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
    <style>[x-cloak]{display:none!important}</style>
</head>
<body class="bg-[#F1F5F9] font-sans antialiased text-slate-800" x-data="{ sidebarOpen: false }">
    {{-- Mobile sidebar backdrop --}}
    <div x-show="sidebarOpen" x-cloak @click="sidebarOpen=false" class="fixed inset-0 z-30 bg-slate-900/50 lg:hidden" x-transition.opacity></div>

    <div class="min-h-screen flex w-full overflow-x-hidden">
        @include('admin.partials.sidebar')

        <div class="flex-1 flex flex-col min-w-0 w-full max-w-full lg:ml-72">
            @include('admin.partials.navbar')

            <main class="flex-1 w-full max-w-full min-w-0 py-6 px-4 sm:px-6 lg:px-8 overflow-x-hidden">
                @include('admin.partials.breadcrumb')

                {{-- Flash messages --}}
                @if(session('success'))
                    <div class="mb-6 rounded-xl bg-emerald-50 border border-emerald-200 px-4 py-3 flex items-center gap-3 text-emerald-800" role="alert">
                        <span class="shrink-0 w-8 h-8 rounded-full bg-emerald-500 text-white grid place-items-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-6 rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-red-800 text-sm">{{ session('error') }}</div>
                @endif
                @if($errors->any())
                    <div class="mb-6 rounded-xl bg-amber-50 border border-amber-200 px-4 py-3 text-amber-800 text-sm">
                        <div class="font-semibold text-xs tracking-wide">Periksa input:</div>
                        <ul class="list-disc list-inside mt-1">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                    </div>
                @endif

                <div class="w-full max-w-none">
                @yield('content')
                {{ $slot ?? '' }}
                </div>
            </main>

            <footer class="py-4 px-4 sm:px-6 text-center text-xs text-slate-400 border-t border-slate-200 bg-white w-full">
                &copy; {{ date('Y') }} SM Studio — Admin Panel. Dibuat dengan <span class="text-[#0F2A4A] font-semibold">Biru Tua</span> yang elegan.
            </footer>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
