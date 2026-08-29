@props(['disabled' => false])
<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full rounded-xl border-slate-200 bg-white focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20 placeholder:text-slate-400 text-sm']) }}>
