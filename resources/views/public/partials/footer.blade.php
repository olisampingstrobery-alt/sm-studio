<footer class="bg-[#0B1D33] text-slate-300">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        {{-- Grid: mobile 2 kolom untuk Navigasi+Bantuan sejajar, brand & kontak full width --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 lg:gap-10">
            {{-- Brand — full width di mobile --}}
            <div class="col-span-2 lg:col-span-1">
                <div class="flex items-center gap-3">
                    <span class="w-9 h-9 rounded-xl bg-white text-[#0B1D33] grid place-items-center font-black shrink-0">SM</span>
                    <span class="font-bold text-white">SM STUDIO</span>
                </div>
                <p class="text-[13px] sm:text-sm text-slate-400 mt-3 sm:mt-4 leading-relaxed">Unit Produksi PPLG dari <span class="text-white font-medium">SMK BPPI Baleendah</span>. Dibangun siswa, dikurasi mentor — siap bantu website & solusi digital Anda jadi lebih cepat, rapi, dan siap pakai.</p>
                <div class="flex gap-2 mt-4 sm:mt-5">
                    <a href="#" aria-label="Github" class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white/10 hover:bg-white/20 grid place-items-center transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.04c-5.5 0-9.96 4.46-9.96 9.96 0 4.41 2.87 8.15 6.84 9.47.5.09.68-.22.68-.48v-1.7c-2.78.6-3.37-1.19-3.37-1.19-.46-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.61.07-.61 1 .07 1.53 1.03 1.53 1.03.89 1.53 2.34 1.09 2.91.83.09-.65.35-1.09.63-1.34-2.22-.25-4.56-1.11-4.56-4.94 0-1.09.39-1.98 1.03-2.68-.1-.25-.45-1.27.1-2.65 0 0 .84-.27 2.75 1.02A9.56 9.56 0 0112 6.8a9.56 9.56 0 012.5.34c1.91-1.29 2.75-1.02 2.75-1.02.55 1.38.2 2.4.1 2.65.64.7 1.03 1.59 1.03 2.68 0 3.84-2.34 4.69-4.57 4.94.36.31.68.92.68 1.85v2.74c0 .26.18.58.69.48A10 10 0 0022 12.04C22 6.5 17.52 2.04 12 2.04z"/></svg></a>
                    <a href="#" aria-label="LinkedIn" class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white/10 hover:bg-white/20 grid place-items-center transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                    <a href="#" aria-label="Instagram" class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white/10 hover:bg-white/20 grid place-items-center transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.334 3.608 1.308.974.974 1.246 2.241 1.308 3.608.058 1.266.07 1.646.07 4.85s-.012 3.583-.07 4.85c-.062 1.366-.334 2.633-1.308 3.608-.974.974-2.241 1.246-3.608 1.308-1.266.058-1.646.07-4.85.07s-3.583-.012-4.85-.07c-1.366-.062-2.633-.334-3.608-1.308-.974-.974-1.246-2.241-1.308-3.608C2.175 15.583 2.163 15.204 2.163 12s.012-3.583.07-4.85c.062-1.366.334-2.633 1.308-3.608C4.515 2.568 5.782 2.296 7.148 2.234 8.414 2.176 8.794 2.163 12 2.163z"/></svg></a>
                </div>
            </div>
            {{-- Navigasi — setengah lebar di mobile --}}
            <div class="col-span-1">
                <div class="font-semibold text-white mb-3 sm:mb-4 text-sm sm:text-[15px]">Navigasi</div>
                <ul class="space-y-2 sm:space-y-2.5 text-[13px] sm:text-sm text-slate-400">
                    <li><a href="{{ route('home') }}#about" class="hover:text-white transition">About</a></li>
                    <li><a href="{{ route('home') }}#services" class="hover:text-white transition">Services</a></li>
                    <li><a href="{{ route('portfolio') }}" class="hover:text-white transition">Portfolio</a></li>
                    <li><a href="{{ route('home') }}#clients" class="hover:text-white transition">Klien Kami</a></li>
                    <li><a href="{{ route('home') }}#faq" class="hover:text-white transition">FAQ</a></li>
                </ul>
            </div>
            {{-- Bantuan — setengah lebar di mobile --}}
            <div class="col-span-1">
                <div class="font-semibold text-white mb-3 sm:mb-4 text-sm sm:text-[15px]">Bantuan</div>
                <ul class="space-y-2 sm:space-y-2.5 text-[13px] sm:text-sm text-slate-400">
                    <li><a href="{{ route('home') }}#faq" class="hover:text-white transition">FAQ</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a></li>
                    <li><a href="{{ route('home') }}#testimonials" class="hover:text-white transition">Testimonials</a></li>
                    <li><a href="{{ route('home') }}#clients" class="hover:text-white transition">Clients</a></li>
                </ul>
            </div>
            {{-- Kontak — full width di mobile, 1 kolom di desktop --}}
            <div class="col-span-2 lg:col-span-1 mt-2 sm:mt-0">
                <div class="font-semibold text-white mb-3 sm:mb-4 text-sm sm:text-[15px]">Kontak</div>
                <ul class="space-y-3 text-[13px] sm:text-sm text-slate-400">
                    <li class="flex gap-2.5 sm:gap-3 items-start"><svg class="w-5 h-5 text-slate-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg> <span class="leading-relaxed break-words">Jl. Adipati Agung No.23, Baleendah, Kec. Baleendah, Kabupaten Bandung, Jawa Barat 40375</span></li>
                    <li class="flex gap-2.5 sm:gap-3 items-center"><svg class="w-5 h-5 text-slate-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg> <a href="mailto:smstudiobppi@gmail.com" class="hover:text-white break-all">smstudiobppi@gmail.com</a></li>
                    <li class="flex gap-2.5 sm:gap-3 items-start"><svg class="w-5 h-5 text-slate-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-2C9.716 21 3 14.284 3 6V5z"/></svg> <span class="leading-relaxed">+62 812-3456-7890 <span class="text-slate-500">(Chat — Respon 1x24 jam)</span></span></li>
                </ul>
            </div>
        </div>
        <div class="mt-8 sm:mt-12 pt-6 sm:pt-8 border-t border-white/10 flex flex-col sm:flex-row justify-between gap-3 sm:gap-4 text-xs sm:text-xs text-slate-500">
            <span class="leading-relaxed text-center sm:text-left">© {{ date('Y') }} SM STUDIO — Unit Produksi PPLG SMK BPPI Baleendah. Dibangun siswa, siap bantu digital Anda.</span>
            <span class="flex flex-wrap gap-3 sm:gap-4 justify-center sm:justify-end items-center"><a href="#" class="hover:text-white">Privacy</a><a href="#" class="hover:text-white">Terms</a></span>
        </div>
    </div>
</footer>
