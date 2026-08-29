<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-[#0F2A4A] hover:bg-[#162F4A] text-white font-semibold rounded-xl shadow-sm transition text-sm']) }}>
    {{ $slot }}
</button>
