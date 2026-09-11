<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SM Studio') — Unit Produksi PPLG SMK BPPI Baleendah</title>
    <meta name="description" content="@yield('meta_description', 'SM STUDIO — Unit Produksi PPLG dari SMK BPPI Baleendah. Dibangun siswa, siap bantu website & solusi digital Anda — kreatif, cepat, profesional.')">
    <meta name="keywords" content="SM Studio, SMK BPPI Baleendah, Unit Produksi PPLG, jasa website smk, digital studio bandung, website umkm">
    {{-- Favicon — SM Studio --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="theme-color" content="#0B1D33">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700|outfit:600,700,800&display=swap" rel="stylesheet" />
    {{-- Vite + React (HMR) + Alpine bundled --}}
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
    <style>[x-cloak]{display:none!important}
    /* React islands — sentuhan tipis loading */
    .island-loading{position:relative;min-height:120px}
    .island-loading::after{content:"";position:absolute;inset:0;background:linear-gradient(90deg,#f1f5f9 25%,#e2e8f0 37%,#f1f5f9 63%);background-size:400% 100%;animation:shimmer 1.2s ease-in-out infinite;border-radius:16px;opacity:.6}
    @keyframes shimmer{0%{background-position:100% 0}100%{background-position:-100% 0}}
    .island-mounted::after{display:none}
    </style>
</head>
<body class="font-sans antialiased bg-white text-slate-700">
    @include('public.partials.header')

    <main>
        @yield('content')
        {{ $slot ?? '' }}
    </main>

    @include('public.partials.footer')

    @stack('scripts')
</body>
</html>
