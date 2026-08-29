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
<section class="py-12">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($testimonials ?? [] as $t)
        <div class="bg-white rounded-[20px] border border-slate-100 p-7">
            <div class="text-amber-400 text-sm">{{ str_repeat('★', $t->rating ?? 5) }}</div>
            <p class="text-slate-700 mt-3 leading-relaxed">“{{ $t->content }}”</p>
            <div class="flex items-center gap-3 mt-6">
                <img src="{{ $t->photo ? asset('storage/'.$t->photo) : 'https://ui-avatars.com/api/?name='.urlencode($t->name).'&background=0F2A4A&color=fff' }}" class="w-10 h-10 rounded-full object-cover">
                <div><div class="font-semibold text-[#0B1D33] text-sm">{{ $t->name }}</div><div class="text-xs text-slate-500">{{ $t->position }} • {{ $t->company }}</div></div>
            </div>
        </div>
        @empty
        @foreach(range(1,6) as $i)
        <div class="bg-white rounded-[20px] border border-slate-100 p-7">
            <div class="text-amber-400 text-sm">★★★★★</div>
            <p class="text-slate-700 mt-3 leading-relaxed">“Awalnya ragu karena timnya siswa SMK, tapi hasilnya rapi, cepat, dan komunikasinya enak banget. Recommended buat UMKM!”</p>
            <div class="flex items-center gap-3 mt-6"><img src="https://i.pravatar.cc/100?img={{ $i+10 }}" class="w-10 h-10 rounded-full"><div><div class="font-semibold text-sm">Klien Kolaborasi {{ $i }}</div><div class="text-xs text-slate-500">UMKM / Komunitas • Project nyata siswa</div></div></div>
        </div>
        @endforeach
        @endforelse
    </div>
</section>
@endsection
