import React, { memo, useMemo, useState, useCallback, useDeferredValue } from 'react';

const Item = memo(function Item({ faq, isOpen, onToggle, idx }) {
    const q = faq.question ?? faq.q ?? faq.title ?? '';
    const a = faq.answer ?? faq.a ?? faq.content ?? '';
    return (
        <div
            className={`bg-white rounded-2xl border overflow-hidden transition-all duration-200 ${isOpen ? 'border-[#BFDBFE] shadow-md' : 'border-slate-200 hover:border-[#BFDBFE]/60 hover:shadow-sm'}`}
            style={{ contentVisibility: 'auto', containIntrinsicSize: '80px' }}
        >
            <button
                onClick={onToggle}
                className="w-full flex items-center justify-between p-5 text-left gap-4"
                aria-expanded={isOpen}
            >
                <span className="font-medium text-[#0B1D33] text-sm sm:text-[15px] leading-snug">{q}</span>
                <span
                    className={`shrink-0 w-8 h-8 rounded-full grid place-items-center text-sm font-bold transition-all duration-200 ${isOpen ? 'bg-[#0F2A4A] text-white rotate-45' : 'bg-[#EFF6FF] border border-[#BFDBFE]/50 text-[#0F2A4A]'}`}
                >
                    {isOpen ? '×' : '?'}
                </span>
            </button>
            <div
                className={`grid transition-all duration-300 ease-out ${isOpen ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'}`}
            >
                <div className="overflow-hidden">
                    <div className="px-5 pb-5 text-sm text-slate-600 leading-relaxed bg-[#F8FAFC]/50 border-t border-slate-100 pt-4">
                        {a}
                    </div>
                </div>
            </div>
        </div>
    );
});

export default function FaqIsland({ faqs = [] }) {
    const [open, setOpen] = useState(0);
    const [q, setQ] = useState('');
    const deferredQ = useDeferredValue(q);

    // Normalisasi: faqs bisa array flat, array grouped object, atau collection groupBy
    const flatList = useMemo(() => {
        if (!faqs) return [];
        // Jika object grouped { "Umum": [...], "Layanan": [...] }
        if (!Array.isArray(faqs) && typeof faqs === 'object') {
            return Object.entries(faqs).flatMap(([cat, items]) =>
                (Array.isArray(items) ? items : []).map((f) => ({ ...f, _cat: cat }))
            );
        }
        if (Array.isArray(faqs)) return faqs;
        return [];
    }, [faqs]);

    const grouped = useMemo(() => {
        if (!flatList.length) return {};
        const g = {};
        flatList.forEach((f) => {
            const cat = f._cat ?? f.category ?? 'Umum';
            if (!g[cat]) g[cat] = [];
            g[cat].push(f);
        });
        return g;
    }, [flatList]);

    const filtered = useMemo(() => {
        const term = deferredQ.trim().toLowerCase();
        if (!term) return flatList;
        return flatList.filter((f) => {
            const hay = `${f.question ?? f.q ?? ''} ${f.answer ?? f.a ?? ''} ${f._cat ?? f.category ?? ''}`.toLowerCase();
            return hay.includes(term);
        });
    }, [flatList, deferredQ]);

    const filteredGrouped = useMemo(() => {
        if (!deferredQ.trim()) return grouped;
        const g = {};
        filtered.forEach((f) => {
            const cat = f._cat ?? f.category ?? 'Umum';
            if (!g[cat]) g[cat] = [];
            g[cat].push(f);
        });
        return g;
    }, [filtered, grouped, deferredQ]);

    const toggle = useCallback((idx) => setOpen((prev) => (prev === idx ? null : idx)), []);

    if (!flatList.length) {
        // Fallback default bila belum ada data dari admin — tetap tampil agar tidak kosong (sentuhan tipis)
        const defaults = [
            { q: 'SM STUDIO itu siapa? Apakah benar dikelola oleh siswa SMK?', a: 'Ya, SM STUDIO merupakan Unit Produksi PPLG SMK BPPI Baleendah yang dikelola oleh siswa dengan pendampingan mentor. Kami mengerjakan project nyata dengan menerapkan standar kerja yang relevan dengan dunia industri.' },
            { q: 'Apakah hasil project-nya bisa terlihat profesional?', a: 'Tentu. Setiap project melalui proses review bersama mentor, quality assurance (QA), serta revisi secara terstruktur untuk memastikan hasil akhir sesuai kebutuhan dan standar yang telah disepakati.' },
            { q: 'Berapa lama waktu pengerjaannya?', a: 'Untuk project seperti landing page atau company profile, estimasi pengerjaan umumnya sekitar 2–4 minggu, tergantung kompleksitas, jumlah halaman, fitur, dan kebutuhan project.' },
            { q: 'Apakah bisa konsultasi terlebih dahulu secara gratis?', a: 'Tentu bisa! Kami menyediakan konsultasi awal gratis selama 30 menit melalui WhatsApp atau Zoom untuk memahami kebutuhan, tujuan, dan konsep project Anda sebelum proses pengerjaan dimulai.' },
        ];
        return (
            <div className="space-y-3">
                {defaults.map((f, i) => (
                    <Item key={i} faq={f} isOpen={open === i} onToggle={() => toggle(i)} idx={i} />
                ))}
            </div>
        );
    }

    const hasSearch = deferredQ.trim().length > 0;
    const total = flatList.length;
    const shown = filtered.length;

    return (
        <div>
            {/* Search — sentuhan tipis performa: deferred value */}
            <div className="relative mb-6">
                <span className="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400">
                    <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M21 21l-4.35-4.35M10 18a8 8 0 110-16 8 8 0 010 16z" /></svg>
                </span>
                <input
                    type="search"
                    placeholder="Cari pertanyaan..."
                    value={q}
                    onChange={(e) => setQ(e.target.value)}
                    className="w-full rounded-full border border-slate-200 pl-10 pr-10 py-3 text-sm bg-white focus:border-[#0F2A4A] focus:ring-2 focus:ring-[#0F2A4A]/10 outline-none transition"
                />
                {q && (
                    <button onClick={() => setQ('')} className="absolute right-2 top-1/2 -translate-y-1/2 w-7 h-7 rounded-full bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500">
                        ×
                    </button>
                )}
            </div>

            {hasSearch && (
                <p className="text-xs text-slate-500 mb-4">
                    Menampilkan <span className="font-semibold text-[#0B1D33]">{shown}</span> dari {total} pertanyaan untuk “{deferredQ}”
                </p>
            )}

            {hasSearch ? (
                filtered.length === 0 ? (
                    <div className="bg-white rounded-2xl border border-dashed border-slate-300 p-8 text-center">
                        <p className="text-sm text-slate-600">Tidak ada FAQ untuk “{q}”.</p>
                        <button onClick={() => setQ('')} className="mt-3 px-4 py-2 rounded-full bg-[#0F2A4A] text-white text-xs font-semibold">Reset</button>
                    </div>
                ) : (
                    <div className="space-y-3">
                        {filtered.map((f, i) => (
                            <Item key={f.id ?? f.question ?? i} faq={f} isOpen={open === i} onToggle={() => toggle(i)} idx={i} />
                        ))}
                    </div>
                )
            ) : (
                Object.entries(filteredGrouped).map(([cat, items]) => (
                    <div key={cat} className="mt-8 first:mt-0">
                        {Object.keys(grouped).length > 1 && (
                            <h3 className="font-semibold text-[#0B1D33] mb-3 text-sm tracking-wide capitalize">{cat}</h3>
                        )}
                        <div className="space-y-3">
                            {items.map((f, i) => {
                                const globalIdx = flatList.indexOf(f);
                                return <Item key={f.id ?? f.question ?? globalIdx} faq={f} isOpen={open === globalIdx} onToggle={() => toggle(globalIdx)} idx={globalIdx} />;
                            })}
                        </div>
                    </div>
                ))
            )}
        </div>
    );
}
