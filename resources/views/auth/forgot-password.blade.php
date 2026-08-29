<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center p-6 bg-[#F1F5F9]">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-card border border-slate-100 p-8">
            <div class="w-12 h-12 rounded-xl bg-[#0F2A4A] text-white grid place-items-center mx-auto"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg></div>
            <h2 class="text-center font-bold text-xl text-[#0B1D33] mt-4">Lupa Password?</h2>
            <p class="text-center text-sm text-slate-500 mt-1">Masukkan email admin, kami kirim link reset.</p>
            <x-auth-session-status class="mb-4 mt-4" :status="session('status')" />
            <form method="POST" action="{{ route('password.email') }}" class="mt-6 space-y-4">
                @csrf
                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <x-primary-button class="w-full justify-center">Kirim Link Reset</x-primary-button>
                <div class="text-center text-sm"><a href="{{ route('admin.login') }}" class="text-[#0F2A4A] font-medium hover:underline">← Kembali ke Login Admin</a></div>
            </form>
        </div>
    </div>
</x-guest-layout>
