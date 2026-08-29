<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center p-6 bg-[#F1F5F9]">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-card border border-slate-100 p-8">
            <h2 class="font-bold text-xl text-[#0B1D33]">Reset Password</h2>
            <p class="text-sm text-slate-500 mt-1">Buat password baru untuk akun admin.</p>
            <form method="POST" action="{{ route('password.store') }}" class="mt-6 space-y-4">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="password" value="Password Baru" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="password_confirmation" value="Konfirmasi Password" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <x-primary-button class="w-full justify-center">Reset Password</x-primary-button>
            </form>
        </div>
    </div>
</x-guest-layout>
