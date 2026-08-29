<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SM Studio') — Unit Produksi PPLG SMK BPPI Baleendah</title>
    <meta name="description" content="@yield('meta_description', 'SM STUDIO — Unit Produksi PPLG dari SMK BPPI Baleendah. Dibangun siswa, siap bantu website & solusi digital Anda — kreatif, cepat, profesional.')">
    <meta name="keywords" content="SM Studio, SMK BPPI Baleendah, Unit Produksi PPLG, jasa website smk, digital studio bandung, website umkm">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700|outfit:600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>[x-cloak]{display:none!important}</style>
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
