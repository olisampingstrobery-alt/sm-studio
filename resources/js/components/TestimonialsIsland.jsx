import React, { memo, useMemo } from 'react';

/**
 * Sentuhan tipis: memo + lazy image + content-visibility + will-change
 * Performa: cegah re-render, lazy decode, CLS aman (width/height)
 */
const styles = [
    { grad: 'from-[#EFF6FF] via-[#F8FAFC] to-white', border: 'border-[#BFDBFE]/50', blob: 'bg-blue-500/10' },
    { grad: 'from-violet-50 via-white to-white', border: 'border-violet-200/40', blob: 'bg-violet-500/10' },
    { grad: 'from-emerald-50/70 via-white to-white', border: 'border-emerald-200/40', blob: 'bg-emerald-500/10' },
    { grad: 'from-amber-50/70 via-white to-white', border: 'border-amber-200/40', blob: 'bg-amber-500/10' },
    { grad: 'from-rose-50/60 via-white to-white', border: 'border-rose-200/40', blob: 'bg-rose-500/10' },
    { grad: 'from-sky-50/60 via-white to-white', border: 'border-sky-200/40', blob: 'bg-sky-500/10' },
];

const Card = memo(function Card({ t, idx = 0 }) {
    const stars = useMemo(() => '★'.repeat(Math.max(1, Math.min(5, t.rating ?? 5))), [t.rating]);
    const photo = t.photo
        ? (t.photo.startsWith('http') ? t.photo : `/storage/${t.photo}`)
        : `https://ui-avatars.com/api/?name=${encodeURIComponent(t.name)}&background=0F2A4A&color=fff`;
    const initials = useMemo(() => t.name?.split(' ').map((w) => w[0]).slice(0, 2).join('').toUpperCase(), [t.name]);
    const st = styles[idx % styles.length];

    return (
        <div
            className={`group relative flex flex-col overflow-hidden rounded-[24px] border ${st.border} bg-gradient-to-br ${st.grad} p-[1.2px] hover:shadow-[0_12px_32px_-12px_rgba(15,42,74,0.18)] hover:-translate-y-1.5 transition-all duration-300 will-change-transform`}
            style={{ contentVisibility: 'auto', containIntrinsicSize: '260px' }}
        >
            <div className={`relative flex flex-col h-full rounded-[22px] bg-gradient-to-br ${st.grad} p-7 overflow-hidden`}>
                <span className="absolute top-5 right-6 font-display font-extrabold text-[36px] leading-none tracking-tight text-slate-900/[0.035] group-hover:text-slate-900/[0.06] transition select-none">{String(idx + 1).padStart(2, '0')}</span>
                <div className={`absolute -top-10 -right-10 w-36 h-36 rounded-full ${st.blob} blur-2xl group-hover:scale-110 transition duration-500 pointer-events-none`}></div>
                <div className="relative flex items-center justify-between">
                    <div className="text-amber-400 text-sm tracking-wide" aria-label={`Rating ${t.rating ?? 5} dari 5`}>
                        {stars}
                    </div>
                    <span className="text-[11px] font-semibold tracking-widest text-slate-500 bg-white border border-slate-200 px-2 py-1 rounded-full shadow-sm">
                        {t.rating ?? 5}/5
                    </span>
                </div>
                <p className="relative text-slate-700 mt-3 leading-relaxed text-[15px] line-clamp-4">“{t.content}”</p>
                <div className="relative flex items-center gap-3 mt-6 pt-5 border-t border-slate-200/60">
                    <img
                        src={photo}
                        alt={t.name}
                        width={40}
                        height={40}
                        loading="lazy"
                        decoding="async"
                        fetchpriority="low"
                        className="w-10 h-10 rounded-full object-cover bg-white border border-slate-200 shadow-sm shrink-0"
                        onError={(e) => {
                            e.currentTarget.src = `https://ui-avatars.com/api/?name=${encodeURIComponent(initials)}&background=0F2A4A&color=fff`;
                        }}
                    />
                    <div className="min-w-0">
                        <div className="font-semibold text-[#0B1D33] text-sm truncate">{t.name}</div>
                        <div className="text-xs text-slate-500 truncate">
                            {t.position}
                            {t.position && t.company ? ' • ' : ''}
                            {t.company}
                        </div>
                    </div>
                    <span className="ml-auto hidden sm:inline text-[10px] tracking-[0.14em] font-bold text-slate-400">SMK BPPI</span>
                </div>
            </div>
        </div>
    );
});

export default function TestimonialsIsland({ testimonials = [] }) {
    // Stabilkan data + sort memo agar tidak hitung ulang tiap render
    const list = useMemo(() => {
        if (!Array.isArray(testimonials)) return [];
        // hanya aktif & terbaru sudah di-filter di backend, tapi jaga-jaga
        return testimonials.slice(0, 6);
    }, [testimonials]);

    if (list.length === 0) {
        return (
            <div className="col-span-full bg-white rounded-[20px] border border-dashed border-slate-300 p-10 text-center">
                <div className="w-12 h-12 rounded-full bg-[#EFF6FF] text-[#0F2A4A] grid place-items-center mx-auto">💬</div>
                <p className="text-sm font-semibold text-[#0B1D33] mt-3">Belum ada testimoni</p>
                <p className="text-xs sm:text-sm text-slate-500 mt-1">Testimoni hanya ditambahkan manual oleh admin dan akan muncul di sini setelah dipublikasikan.</p>
            </div>
        );
    }

    return (
        <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            {list.map((t, i) => (
                <Card key={t.id ?? t.name + t.content.slice(0, 10)} t={t} idx={i} />
            ))}
        </div>
    );
}
