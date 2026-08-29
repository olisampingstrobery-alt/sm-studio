<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center p-6 bg-[#F1F5F9]">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-card border border-slate-100 p-8">
            <h2 class="font-bold text-lg text-[#0B1D33]">Konfirmasi Password</h2>
            <p class="text-sm text-slate-500 mt-1">Area aman — masukkan password untuk melanjutkan.</p>
            <form method="POST" action="{{ route('password.confirm') }}" class="mt-6 space-y-4">
                @csrf
                <div>
                    <x-input-label for="password" value="Password" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <x-primary-button class="w-full justify-center">Konfirmasi</x-primary-button>
            </form>
        </div>
    </div>
</x-guest-layout>
