@hasSection('breadcrumb')
    <nav class="mb-6" aria-label="Breadcrumb">
        <ol class="flex items-center gap-2 text-xs">
            <li><a href="{{ route('admin.dashboard') }}" class="text-slate-500 hover:text-[#0F2A4A]">Dashboard</a></li>
            <li class="text-slate-300">/</li>
            @yield('breadcrumb')
        </ol>
    </nav>
@else
    @php
        $segments = request()->segments();
        // segments: admin, services, create etc -> show breadcrumb auto
    @endphp
    @if(count($segments) > 1)
        <nav class="mb-6" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center gap-2 text-xs text-slate-500">
                <li><a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-1 hover:text-[#0F2A4A]"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3"/></svg> Dashboard</a></li>
                @foreach($segments as $i => $seg)
                    @if($seg==='admin') @continue @endif
                    <li class="text-slate-300">/</li>
                    <li class="{{ $loop->last ? 'text-[#0F2A4A] font-semibold' : '' }}">{{ Str::headline($seg) }}</li>
                @endforeach
            </ol>
        </nav>
    @endif
@endif
