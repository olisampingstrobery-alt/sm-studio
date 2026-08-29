@props(['padding' => true, 'hover' => false])
<div {{ $attributes->merge(['class' => 'bg-white rounded-2xl border border-slate-100 shadow-card ' . ($hover ? 'hover:shadow-soft hover:border-slate-200 transition' : '') . ($padding ? ' p-6' : '')]) }}>
    {{ $slot }}
</div>
