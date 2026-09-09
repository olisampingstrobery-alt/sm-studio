import React, { memo } from 'react';

const cardStyles = [
    { grad: 'from-[#EFF6FF] via-[#F8FAFC] to-white', border: 'border-[#BFDBFE]/50', blob: 'bg-blue-500/10', badge: 'bg-[#EFF6FF] border-[#BFDBFE]/50 text-[#0F2A4A]' },
    { grad: 'from-violet-50 via-white to-white', border: 'border-violet-200/40', blob: 'bg-violet-500/10', badge: 'bg-violet-50 border-violet-200/50 text-violet-700' },
    { grad: 'from-emerald-50/70 via-white to-white', border: 'border-emerald-200/40', blob: 'bg-emerald-500/10', badge: 'bg-emerald-50 border-emerald-200/50 text-emerald-700' },
];

const Card = memo(function Card({ p, idx = 0 }) {
    const st = cardStyles[idx % cardStyles.length];
    const img = p.featured_image
        ? `/storage/${p.featured_image}`
        : p.image
            ? `/storage/${p.image}`
            : p.featured_image_url
                ? p.featured_image_url
                : null;
    const clientName = p.client?.name ?? p.client_name ?? 'Client';

    return (
        <a
            href={`/portfolio/${p.slug ?? p.id}`}
            className={`group relative flex flex-col overflow-hidden rounded-[24px] border ${st.border} bg-gradient-to-br ${st.grad} p-[1.2px] hover:shadow-[0_12px_32px_-12px_rgba(15,42,74,0.18)] hover:-translate-y-1.5 transition-all duration-300 will-change-transform`}
            style={{ contentVisibility: 'auto', containIntrinsicSize: '360px' }}
        >
            <div className="relative flex flex-col h-full rounded-[22px] bg-white overflow-hidden">
                <div className="h-48 bg-slate-100 overflow-hidden shrink-0 relative">
                    {img ? (
                        <img
                            src={img}
                            alt={p.title}
                            loading="lazy"
                            decoding="async"
                            fetchPriority="low"
                            className="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                        />
                    ) : (
                        <div className={`w-full h-full grid place-items-center text-slate-400 text-sm bg-gradient-to-br ${st.grad}`}>No Image</div>
                    )}
                    {/* subtle blob biar box lebih kelihatan */}
                    <div className={`absolute -top-10 -right-10 w-36 h-36 rounded-full ${st.blob} blur-2xl opacity-60 group-hover:scale-110 transition duration-500 pointer-events-none`}></div>
                    {/* badge client */}
                    <span className="absolute top-3 left-3 text-xs font-semibold bg-white/90 backdrop-blur border border-slate-200 px-2.5 py-1 rounded-full shadow-sm text-[#0F2A4A]">
                        {clientName}
                    </span>
                    {/* arrow hover */}
                    <span className="absolute top-3 right-3 w-8 h-8 rounded-full bg-white border border-slate-200 grid place-items-center text-slate-400 group-hover:bg-[#0F2A4A] group-hover:text-white group-hover:border-[#0F2A4A] group-hover:rotate-45 transition-all duration-300 shadow-sm text-xs">↗</span>
                    {/* number watermark */}
                    <span className="absolute bottom-3 right-3 font-display font-extrabold text-[28px] leading-none tracking-tight text-white/80 drop-shadow select-none pointer-events-none">
                        {String(idx + 1).padStart(2, '0')}
                    </span>
                    {p.is_featured ? (
                        <span className="absolute bottom-3 left-3 text-[11px] font-bold text-amber-700 bg-amber-50 border border-amber-200 px-2.5 py-1 rounded-full shadow-sm">
                            ★ Featured
                        </span>
                    ) : null}
                </div>
                <div className={`p-6 flex-1 flex flex-col bg-gradient-to-br ${st.grad}`}>
                    <h3 className="font-semibold text-[16px] leading-tight text-[#0B1D33] line-clamp-2 group-hover:text-[#0F2A4A] transition">{p.title}</h3>
                    <p className="text-xs text-slate-500 mt-1.5 truncate">{p.client_name ?? p.client?.name ?? 'Client'}</p>
                    <div className="mt-4 pt-4 border-t border-slate-200/60 flex items-center justify-between">
                        <span className="inline-flex items-center gap-1.5 text-xs font-semibold text-[#0F2A4A]">
                            Lihat detail <span className="w-6 h-6 rounded-full bg-[#0F2A4A] text-white grid place-items-center text-[10px] group-hover:translate-x-0.5 transition">→</span>
                        </span>
                        <span className="text-[10px] tracking-[0.14em] font-bold text-slate-400">SMK BPPI</span>
                    </div>
                </div>
            </div>
        </a>
    );
});

/**
 * PortfolioGrid - grid portfolio halaman /portfolio
 * Sekarang box lebih terlihat: container ada sentuhan warna tipis (#F8FAFC + blob) + card pakai border gradient + shadow
 * Props: portfolios: array dari Blade via data-props
 */
export default function PortfolioGrid({ portfolios = [] }) {
    if (!portfolios.length) {
        return (
            <div className="bg-white rounded-2xl border border-dashed border-slate-300 p-10 text-center shadow-sm">
                <div className="w-12 h-12 rounded-xl bg-slate-100 grid place-items-center mx-auto text-slate-400">📁</div>
                <p className="text-sm font-semibold text-[#0B1D33] mt-3">Belum ada portfolio publish</p>
                <p className="text-xs text-slate-500 mt-1">Tambah di <span className="font-mono bg-slate-100 px-1 py-0.5 rounded">/admin/portfolio</span></p>
            </div>
        );
    }

    return (
        <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            {portfolios.map((p, i) => (
                <Card key={p.id ?? p.slug ?? p.title} p={p} idx={i} />
            ))}
        </div>
    );
}
