@extends('layouts.public')
@section('title','Klien Kami')
@section('content')
<section class="bg-[#0B1D33] text-white">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10 lg:py-12">
        <span class="text-[11px] sm:text-xs tracking-widest font-semibold text-white/60">KLIEN & KOLABORASI • SMK BPPI BALEENDAH</span>
        <h1 class="text-2xl sm:text-3xl lg:text-[32px] font-bold mt-2 leading-tight">Kolaborasi Nyata, Kepercayaan Nyata.</h1>
        <p class="text-white/60 mt-2 sm:mt-3 max-w-xl text-sm sm:text-[15px] leading-relaxed">Dari UMKM lokal sampai komunitas sekolah — kami dipercaya bantu kebutuhan digital lewat project nyata siswa. Semua klien di sini adalah kolaborasi beneran yang dikerjakan bareng mentor.</p>
    </div>
</section>
<section class="py-8 sm:py-10 lg:py-12">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        @if($clients->count())
            <div class="grid grid-cols-1 min-[360px]:grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6 auto-rows-fr">
                @foreach($clients as $client)
                @php
                    // Warna box sesuai foto/nama — hash hue biar tiap client punya tint pastel unik, nanti saat ada foto/logo tetap harmonis
                    $hue = abs(crc32($client->name . ($client->industry ?? ''))) % 360;
                    $bgOuter = "hsl($hue 85% 98%)";
                    $bgInner = "hsl($hue 80% 96%)";
                    $bdOuter = "hsl($hue 65% 88%)";
                    $bdInner = "hsl($hue 60% 86%)";
                    $txt = "hsl($hue 45% 28%)";
                @endphp
                <div id="client-{{ $client->slug }}" class="rounded-xl sm:rounded-2xl p-4 sm:p-5 lg:p-6 xl:p-8 flex flex-col items-center justify-center text-center hover:shadow-soft hover:-translate-y-0.5 transition-all duration-300 group border shadow-sm scroll-mt-24 min-h-[180px] sm:min-h-[200px]"
                     style="background: {{ $bgOuter }}; border-color: {{ $bdOuter }};" data-client-box>
                    <div class="w-14 h-14 sm:w-16 sm:h-16 lg:w-20 lg:h-20 rounded-lg sm:rounded-xl flex items-center justify-center overflow-hidden border shrink-0"
                         style="background: {{ $bgInner }}; border-color: {{ $bdInner }};" data-client-inner>
                        @if($client->logo)
                            <img src="{{ asset('storage/'.$client->logo) }}" alt="{{ $client->name }}" class="w-full h-full object-contain p-2 sm:p-3 bg-white/80" crossorigin="anonymous" data-client-logo>
                        @else
                            <span class="font-bold text-base sm:text-lg" style="color: {{ $txt }}">{{ strtoupper(substr($client->name,0,2)) }}</span>
                        @endif
                    </div>
                    <div class="font-semibold mt-3 sm:mt-4 text-[13px] sm:text-sm text-center line-clamp-2 leading-tight px-1" style="color: #0B1D33">{{ $client->name }}</div>
                    <div class="text-[11px] sm:text-xs text-center mt-0.5 line-clamp-1" style="color: {{ $txt }}; opacity:.7">{{ $client->industry ?? '—' }}</div>
                    @if($client->website)
                        <a href="{{ $client->website }}" target="_blank" class="text-[10px] sm:text-[11px] hover:underline mt-1 truncate max-w-full px-2 block" style="color: {{ $txt }}">{{ parse_url($client->website, PHP_URL_HOST) ?? $client->website }}</a>
                    @endif
                    @php $portfolioCount = $client->portfolios_count ?? $client->portfolios()->where('status','published')->count(); @endphp
                    @if($portfolioCount > 0)
                        <span class="mt-2 inline-flex items-center gap-1 sm:gap-1.5 text-[10px] sm:text-[11px] font-semibold px-2 sm:px-2.5 py-1 rounded-full bg-white border shadow-sm" style="color: {{ $txt }}; border-color: {{ $bdOuter }}">📁 {{ $portfolioCount }} portfolio</span>
                    @endif
                </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-2xl border border-dashed border-slate-300 p-8 sm:p-12 text-center">
                <div class="w-12 h-12 rounded-xl bg-slate-100 grid place-items-center mx-auto text-slate-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19.128a9.38 9.38 0 002.625.374 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                </div>
                <h3 class="font-semibold text-[#0B1D33] mt-4">Belum ada klien</h3>
                <p class="text-sm text-slate-500 mt-1 max-w-md mx-auto">Admin belum menambahkan klien. Silakan tambah via <span class="font-mono text-xs bg-slate-100 px-1.5 py-0.5 rounded">/admin/clients</span> — data akan otomatis muncul di sini berdampingan.</p>
            </div>
        @endif
    </div>
</section>
@push('scripts')
<script>
// Warna box sesuai foto — ekstrak warna dominan logo (jika ada) biar box benar-benar matching foto
document.addEventListener('DOMContentLoaded', () => {
    const boxes = document.querySelectorAll('[data-client-box]');
    boxes.forEach(box => {
        const img = box.querySelector('[data-client-logo]');
        if (!img) return;
        const apply = () => {
            try {
                const c = document.createElement('canvas');
                const x = c.getContext('2d');
                c.width = 24; c.height = 24;
                x.drawImage(img, 0, 0, 24, 24);
                const d = x.getImageData(0, 0, 24, 24).data;
                let r=0,g=0,b=0,cnt=0;
                for(let i=0;i<d.length;i+=4){
                    // skip putih/transparan dominan
                    if(d[i]>250 && d[i+1]>250 && d[i+2]>250) continue;
                    if(d[i+3]<30) continue;
                    r+=d[i]; g+=d[i+1]; b+=d[i+2]; cnt++;
                }
                if(!cnt) return;
                r=Math.round(r/cnt); g=Math.round(g/cnt); b=Math.round(b/cnt);
                // pastel kan biar tetap soft (campur putih 70%)
                const pr = Math.round((r*0.35)+200), pg=Math.round((g*0.35)+200), pb=Math.round((b*0.35)+200);
                const br = Math.round((r*0.45)+155), bg=Math.round((g*0.45)+155), bb=Math.round((b*0.45)+155);
                box.style.background = `rgb(${pr} ${pg} ${pb})`;
                box.style.borderColor = `rgb(${br} ${bg} ${bb})`;
                const inner = box.querySelector('[data-client-inner]');
                if(inner){
                    const ir=Math.round((r*0.25)+210), ig=Math.round((g*0.25)+210), ib=Math.round((b*0.25)+210);
                    const bir=Math.round((r*0.35)+175), big=Math.round((g*0.35)+175), bib=Math.round((b*0.35)+175);
                    inner.style.background = `rgb(${ir} ${ig} ${ib})`;
                    inner.style.borderColor = `rgb(${bir} ${big} ${bib})`;
                }
            } catch(e){}
        };
        if(img.complete) apply(); else img.addEventListener('load', apply, {once:true});
        img.addEventListener('error', () => {}, {once:true});
    });
});
</script>
@endpush
@endsection
