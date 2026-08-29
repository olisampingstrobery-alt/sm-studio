@props(['type' => 'info', 'dismissible' => false])
@php
$map = [
    'success' => 'bg-emerald-50 border-emerald-200 text-emerald-800',
    'error'   => 'bg-red-50 border-red-200 text-red-800',
    'warning' => 'bg-amber-50 border-amber-200 text-amber-800',
    'info'    => 'bg-sky-50 border-sky-200 text-sky-800',
];
$cls = $map[$type] ?? $map['info'];
@endphp
<div {{ $attributes->merge(['class' => "rounded-xl border px-4 py-3 flex items-start gap-3 $cls"]) }} role="alert">
    <div class="shrink-0 mt-0.5">
        @if($type==='success') <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        @elseif($type==='error') <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        @else <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01"/></svg>
        @endif
    </div>
    <div class="flex-1 text-sm font-medium">{{ $slot }}</div>
    @if($dismissible)
        <button onclick="this.parentElement.remove()" class="shrink-0 p-1 rounded-lg hover:bg-black/5"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
    @endif
</div>
