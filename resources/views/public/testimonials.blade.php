@extends('layouts.public')
@section('title','Testimoni')
@section('content')
<section class="bg-[#0B1D33] text-white">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <span class="text-xs tracking-widest font-semibold text-white/60">TESTIMONI • SMK BPPI BALEENDAH</span>
        <h1 class="text-3xl font-bold mt-2">Kata Mereka yang Sudah Kolaborasi.</h1>
        <p class="text-white/60 mt-3 max-w-xl">Bukan sekadar pujian — cerita jujur dari klien yang project-nya dikerjakan tim Siswa SMK BPPI Baleendah, didampingi mentor.</p>
    </div>
</section>
<section class="py-12 bg-gradient-to-b from-white to-[#F8FAFC]/50">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        {{-- React island — performa kenceng: memo + content-visibility + lazy image --}}
        @php
            $testimonialsPagePayload = ["testimonials" => ($testimonials ?? collect())->map(fn($t) => ["id"=>$t->id,"name"=>$t->name,"position"=>$t->position,"company"=>$t->company,"content"=>$t->content,"rating"=>$t->rating,"photo"=>$t->photo])->values()];
        @endphp
        <div id="testimonials-page-root" class="island-loading min-h-[220px]" data-props='@json($testimonialsPagePayload)'>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 opacity-60 animate-pulse">
                @forelse(($testimonials ?? collect())->take(6) as $t)
                <div class="bg-white rounded-[20px] border border-slate-100 p-7"><div class="h-4 w-20 bg-amber-100 rounded"></div><div class="h-4 bg-slate-100 rounded mt-3"></div></div>
                @empty
                <div class="col-span-full bg-white rounded-[20px] border border-dashed border-slate-300 p-10 sm:p-12 text-center max-w-xl mx-auto">
                    <div class="w-14 h-14 rounded-full bg-[#EFF6FF] text-[#0F2A4A] grid place-items-center mx-auto text-xl">💬</div>
                    <h3 class="font-semibold text-[#0B1D33] mt-4">Belum ada testimoni</h3>
                    <p class="text-sm text-slate-500 mt-2 leading-relaxed">Testimoni hanya dapat ditambahkan secara manual oleh admin melalui <span class="font-mono text-xs bg-slate-100 px-1.5 py-0.5 rounded">/admin/testimonials</span>.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
