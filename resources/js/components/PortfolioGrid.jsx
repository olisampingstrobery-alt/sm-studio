import React, { memo } from 'react';

const Card = memo(function Card({ p }) {
    const img = p.featured_image
        ? `/storage/${p.featured_image}`
        : p.image
            ? `/storage/${p.image}`
            : p.featured_image_url
                ? p.featured_image_url
                : null;

    return (
        <a
            href={`/portfolio/${p.slug ?? p.id}`}
            className="group bg-gradient-to-br from-[#EFF6FF]/45 via-white to-white rounded-[20px] border border-[#BFDBFE]/30 overflow-hidden hover:shadow-lg hover:-translate-y-1 hover:border-[#93C5FD]/40 transition-all duration-300 flex flex-col will-change-transform"
            style={{ contentVisibility: 'auto', containIntrinsicSize: '320px' }}
        >
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
                    <div className="w-full h-full grid place-items-center text-slate-400 text-sm bg-gradient-to-br from-[#EFF6FF] to-slate-50">No Image</div>
                )}
                {p.is_featured ? (
                    <span className="absolute top-3 left-3 text-[11px] font-bold text-amber-700 bg-amber-50 border border-amber-200 px-2.5 py-1 rounded-full shadow-sm">
                        ★ Featured
                    </span>
                ) : null}
            </div>
            <div className="p-5 flex-1 flex flex-col bg-gradient-to-b from-white via-white to-[#F8FAFC]/60">
                <span className="self-start text-xs font-semibold text-[#0F2A4A] bg-[#EFF6FF] border border-[#BFDBFE]/50 px-2.5 py-1 rounded-full">
                    {p.client?.name ?? p.client_name ?? 'Client'}
                </span>
                <h3 className="font-semibold text-[#0B1D33] mt-3 line-clamp-2 group-hover:text-[#0F2A4A] leading-snug">{p.title}</h3>
                <p className="text-xs text-slate-500 mt-1 truncate">{p.client_name ?? p.client?.name ?? 'Client'}</p>
                <div className="mt-4">
                    <span className="inline-flex items-center gap-1.5 text-xs font-semibold text-white bg-[#0F2A4A] px-4 py-2 rounded-full group-hover:bg-[#162F4A] transition-colors">
                        Lihat detail <span aria-hidden>→</span>
                    </span>
                </div>
            </div>
        </a>
    );
});

/**
 * PortfolioGrid - versi simpel tanpa search/filter
 * Langsung tampilkan semua portfolio (puluhan project), tanpa fitur search
 * Props: portfolios: array dari Blade via data-props
 */
export default function PortfolioGrid({ portfolios = [] }) {
    if (!portfolios.length) {
        return (
            <div className="bg-white rounded-2xl border border-dashed border-slate-300 p-10 text-center">
                <div className="w-12 h-12 rounded-xl bg-slate-100 grid place-items-center mx-auto text-slate-400">📁</div>
                <p className="text-sm font-semibold text-[#0B1D33] mt-3">Belum ada portfolio publish</p>
                <p className="text-xs text-slate-500 mt-1">Tambah di <span className="font-mono bg-slate-100 px-1 py-0.5 rounded">/admin/portfolio</span></p>
            </div>
        );
    }

    return (
        <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            {portfolios.map((p) => (
                <Card key={p.id ?? p.slug ?? p.title} p={p} />
            ))}
        </div>
    );
}
