import React, { memo, useMemo, useState, useCallback, useDeferredValue } from 'react';

const Card = memo(function Card({ p }) {
    const img = p.featured_image
        ? `/storage/${p.featured_image}`
        : p.image
            ? `/storage/${p.image}`
            : p.featured_image_url
                ? p.featured_image_url
                : null;

    // Sentuhan tipis: shimmer placeholder + content-visibility
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
                        fetchpriority="low"
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
                    {p.category?.name ?? p.category ?? 'Umum'}
                </span>
                <h3 className="font-semibold text-[#0B1D33] mt-3 line-clamp-2 group-hover:text-[#0F2A4A] leading-snug">{p.title}</h3>
                <p className="text-xs text-slate-500 mt-1 truncate">{p.client_name ?? p.client?.name ?? p.client_name ?? 'Client'}</p>
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
 * PortfolioGrid - filter tipis performa dengan useMemo + debounce ringan
 * Props: portfolios: array dari Blade via data-props
 */
export default function PortfolioGrid({ portfolios = [] }) {
    const [q, setQ] = useState('');
    const [cat, setCat] = useState('Semua');
    // Performa: defer value agar filter tidak block input (React 18+)
    const deferredQ = useDeferredValue(q);

    const categories = useMemo(() => {
        const s = new Set(portfolios.map((p) => p.category?.name ?? p.category ?? 'Umum').filter(Boolean));
        return ['Semua', ...Array.from(s)];
    }, [portfolios]);

    const filtered = useMemo(() => {
        const term = deferredQ.trim().toLowerCase();
        return portfolios.filter((p) => {
            const matchCat = cat === 'Semua' || (p.category?.name ?? p.category) === cat;
            if (!matchCat) return false;
            if (!term) return true;
            const hay = `${p.title} ${p.client_name ?? p.client?.name ?? ''} ${p.category?.name ?? ''}`.toLowerCase();
            return hay.includes(term);
        });
    }, [portfolios, deferredQ, cat]);

    const onSearch = useCallback((e) => setQ(e.target.value), []);
    const clearFilter = useCallback(() => { setQ(''); setCat('Semua'); }, []);

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
        <div>
            {/* Controls — sentuhan tipis: rounded-full, focus ring, scroll kategori */}
            <div className="flex flex-col sm:flex-row gap-3 mb-6">
                <div className="relative flex-1">
                    <span className="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400">
                        <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M21 21l-4.35-4.35M10 18a8 8 0 110-16 8 8 0 010 16z" /></svg>
                    </span>
                    <input
                        type="search"
                        placeholder="Cari portfolio, klien, kategori..."
                        value={q}
                        onChange={onSearch}
                        className="w-full rounded-full border border-slate-200 pl-10 pr-4 py-2.5 text-sm bg-white focus:border-[#0F2A4A] focus:ring-2 focus:ring-[#0F2A4A]/10 outline-none transition"
                    />
                    {q && (
                        <button onClick={() => setQ('')} className="absolute right-2 top-1/2 -translate-y-1/2 w-7 h-7 rounded-full bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500">
                            ×
                        </button>
                    )}
                </div>
                <div className="flex gap-2 overflow-x-auto pb-1 scrollbar-thin -mx-1 px-1">
                    {categories.map((c) => (
                        <button
                            key={c}
                            onClick={() => setCat(c)}
                            className={`px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition shrink-0 ${cat === c ? 'bg-[#0F2A4A] text-white shadow-sm' : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 hover:border-[#BFDBFE]'}`}
                        >
                            {c}
                        </button>
                    ))}
                </div>
            </div>
            <div className="flex items-center justify-between mb-4">
                <p className="text-xs text-slate-500">
                    Menampilkan <span className="font-semibold text-[#0B1D33]">{filtered.length}</span> dari {portfolios.length} karya
                    {cat !== 'Semua' && <> • kategori <span className="font-semibold">{cat}</span></>}
                    {deferredQ && <> • cari “{deferredQ}”</>}
                </p>
                {(q || cat !== 'Semua') && <button onClick={clearFilter} className="text-xs font-semibold text-[#0F2A4A] hover:underline">Reset filter</button>}
            </div>
            <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                {filtered.map((p) => (
                    <Card key={p.id ?? p.slug ?? p.title} p={p} />
                ))}
            </div>
            {filtered.length === 0 && (
                <div className="bg-white rounded-2xl border border-dashed border-slate-200 p-8 text-center mt-6">
                    <p className="text-sm text-slate-600">Tidak ada hasil untuk “{q}” di kategori {cat}.</p>
                    <button onClick={clearFilter} className="mt-3 px-4 py-2 rounded-full bg-[#0F2A4A] text-white text-xs font-semibold hover:bg-[#162F4A]">Tampilkan semua</button>
                </div>
            )}
        </div>
    );
}
