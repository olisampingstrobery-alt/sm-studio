<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-md">
            <div class="text-center mb-6">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 min-w-0">
                    <img src="{{ asset('images/logo-sm-studio.svg') }}" alt="SM STUDIO" width="36" height="36" class="w-9 h-9 rounded-xl object-contain bg-[#0B1D33] shrink-0 aspect-square">
                    <span class="font-bold text-[#0B1D33] truncate">SM STUDIO</span>
                </a>
                <p class="text-xs text-slate-500 mt-2">Anda akan dialihkan ke <a href="{{ route('admin.login') }}" class="text-[#0F2A4A] font-semibold hover:underline">Admin Login →</a></p>
            </div>
            <div class="bg-white rounded-[20px] shadow-card border border-slate-100 p-8">
                <h1 class="font-bold text-xl text-[#0B1D33]">Login</h1>
                <p class="text-sm text-slate-500 mt-1">Silakan login melalui halaman admin.</p>
                <a href="{{ route('admin.login') }}" class="mt-6 block w-full text-center bg-[#0B1D33] hover:bg-[#0B1D33] text-white font-semibold py-3 rounded-xl">Ke Halaman Admin Login</a>
                <p class="text-center text-xs text-slate-400 mt-4"><a href="{{ route('home') }}" class="hover:text-[#0F2A4A]">← Kembali ke Website Publik</a></p>
            </div>
        </div>
    </div>
</x-guest-layout>
