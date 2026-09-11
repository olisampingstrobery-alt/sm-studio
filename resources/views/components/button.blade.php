@props(['variant' => 'primary', 'type' => 'button', 'href' => null])
@php
$base = 'inline-flex items-center justify-center gap-2 font-semibold rounded-xl transition text-sm px-5 py-2.5';
$variants = [
    'primary' => 'bg-black text-white hover:bg-black shadow-sm hover:shadow',
    'secondary' => 'bg-white border border-slate-200 text-slate-700 hover:bg-slate-50',
    'ghost' => 'text-slate-600 hover:bg-slate-100',
    'danger' => 'bg-red-600 text-white hover:bg-red-700',
];
$cls = $variants[$variant] ?? $variants['primary'];
@endphp
@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => "$base $cls"]) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => "$base $cls"]) }}>{{ $slot }}</button>
@endif
