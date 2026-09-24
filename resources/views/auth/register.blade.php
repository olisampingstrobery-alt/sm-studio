<x-guest-layout>
    <div class="min-h-screen flex">
        <div class="hidden lg:flex lg:w-1/2 bg-[#0B1D33] text-white p-10 flex-col justify-between relative overflow-hidden">
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(white 1px, transparent 0); background-size: 24px 24px;"></div>
            <div>
                <div class="flex items-center gap-3"><span class="w-10 h-10 rounded-xl bg-white text-[#0B1D33] grid place-items-center font-black">SM</span><span class="font-bold">SM STUDIO</span></div>
                <h1 class="mt-16 text-3xl font-bold leading-tight">Buat Akun Baru</h1>
                <p class="text-white/70 mt-3">Hanya admin yang dapat membuat akun baru.</p>
            </div>
            <p class="text-xs text-white/50">© {{ date('Y') }} SM Studio</p>
        </div>
        <div class="flex-1 flex items-center justify-center p-8 bg-slate-50">
            <div class="w-full max-w-md bg-white rounded-2xl shadow-card border border-slate-100 p-8">
                <h2 class="font-bold text-xl text-[#0B1D33]">Daftar</h2>
                <p class="text-sm text-slate-500 mb-6">Registrasi untuk akses admin.</p>
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf
                    <div>
                        <x-input-label for="name" value="Nama" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="email" value="Email" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="password" value="Password" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="password_confirmation" value="Konfirmasi Password" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-between pt-2">
                        <a class="text-sm text-slate-600 hover:text-[#0F2A4A] underline" href="{{ route('admin.login') }}">Sudah punya akun?</a>
                        <x-primary-button>Daftar</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
