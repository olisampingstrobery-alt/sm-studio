<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center p-6 bg-[#F1F5F9]">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-card border border-slate-100 p-8 text-center">
            <div class="w-14 h-14 rounded-full bg-amber-100 text-amber-600 grid place-items-center mx-auto"><svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19a2 2 0 012-2h14a2 2 0 012 2"/></svg></div>
            <h2 class="font-bold text-lg text-[#0B1D33] mt-4">Verifikasi Email</h2>
            <p class="text-sm text-slate-500 mt-2">Kami telah mengirim link verifikasi ke email Anda. Silakan cek inbox/spam.</p>
            @if (session('status') == 'verification-link-sent')
                <div class="mt-4 text-sm font-medium text-emerald-600 bg-emerald-50 border border-emerald-200 rounded-xl px-3 py-2">Link verifikasi baru telah dikirim!</div>
            @endif
            <div class="mt-6 flex gap-3 justify-center">
                <form method="POST" action="{{ route('verification.send') }}">@csrf <x-primary-button>Kirim Ulang</x-primary-button></form>
                <form method="POST" action="{{ route('logout') }}">@csrf <x-secondary-button>Keluar</x-secondary-button></form>
            </div>
        </div>
    </div>
</x-guest-layout>
