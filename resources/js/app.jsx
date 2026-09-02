import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// --- React Islands (progressive, performa tipis) ---
// Alpine tetap untuk interaksi ringan (header, toggle) — React hanya untuk island berat
import React from 'react';
import { createRoot } from 'react-dom/client';

// Registry lazy — code-split per halaman, hanya load yang dibutuhkan
const islands = {
    'testimonials-root': () => import('./components/TestimonialsIsland.jsx'),
    'testimonials-page-root': () => import('./components/TestimonialsIsland.jsx'),
    'portfolio-root': () => import('./components/PortfolioGrid.jsx'),
    'portfolio-home-root': () => import('./components/PortfolioGrid.jsx'),
    'faq-root': () => import('./components/FaqIsland.jsx'),
};

function getProps(el) {
    try {
        // 1. data-props JSON (paling umum)
        if (el.dataset.props) return JSON.parse(el.dataset.props);
        if (el.dataset.testimonials) return { testimonials: JSON.parse(el.dataset.testimonials) };
        if (el.dataset.portfolios) return { portfolios: JSON.parse(el.dataset.portfolios) };
        if (el.dataset.faqs) return { faqs: JSON.parse(el.dataset.faqs) };

        // 2. Global fallback via window (performa: tidak parse attribute besar dua kali)
        if (el.id === 'testimonials-root' && window.__SM_TESTIMONIALS__) return { testimonials: window.__SM_TESTIMONIALS__ };
        if (el.id === 'testimonials-page-root' && window.__SM_TESTIMONIALS_PAGE__) return { testimonials: window.__SM_TESTIMONIALS_PAGE__ };
        if ((el.id === 'portfolio-root' || el.id === 'portfolio-home-root') && window.__SM_PORTFOLIOS__) return { portfolios: window.__SM_PORTFOLIOS__ };
        if (el.id === 'faq-root' && window.__SM_FAQS__) return { faqs: window.__SM_FAQS__ };

        // 3. Script JSON fallback — <script id="xxx-data" type="application/json">
        const script = document.getElementById(el.id + '-data');
        if (script) return JSON.parse(script.textContent);
    } catch (e) {
        console.warn('Gagal parse props React island', el.id, e);
    }
    return {};
}

function mountIsland(id, loader) {
    const el = document.getElementById(id);
    if (!el || el.dataset.mounted === '1') return;

    const doMount = () => {
        loader()
            .then((mod) => {
                const Comp = mod.default;
                if (!Comp) return;
                const props = getProps(el);
                const root = createRoot(el);
                root.render(
                    <React.StrictMode>
                        <Comp {...props} />
                    </React.StrictMode>
                );
                el.dataset.mounted = '1';
                el.classList.remove('island-loading');
                // Sentuhan tipis: hilangkan skeleton setelah mount
                el.classList.add('island-mounted');
            })
            .catch((err) => console.error(`Gagal load island ${id}`, err));
    };

    // Eager untuk island di atas lipatan (hero-related), lazy untuk bawah
    const isEager = el.dataset.eager === '1';
    if (isEager) {
        if ('requestIdleCallback' in window) requestIdleCallback(doMount, { timeout: 400 });
        else setTimeout(doMount, 16);
        return;
    }

    // Performa: tunda mount sampai idle ATAU terlihat (IntersectionObserver)
    if ('IntersectionObserver' in window) {
        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    io.disconnect();
                    if ('requestIdleCallback' in window) requestIdleCallback(doMount, { timeout: 800 });
                    else setTimeout(doMount, 16);
                }
            });
        }, { rootMargin: '240px' });
        io.observe(el);
    } else if ('requestIdleCallback' in window) {
        requestIdleCallback(doMount, { timeout: 1000 });
    } else {
        setTimeout(doMount, 32);
    }
}

function mountAll() {
    Object.entries(islands).forEach(([id, loader]) => mountIsland(id, loader));
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', mountAll, { once: true });
} else {
    // next tick agar Alpine selesai init duluan
    setTimeout(mountAll, 0);
}

// HMR support
if (import.meta.hot) {
    import.meta.hot.accept(() => {
        // Vite akan reload island otomatis via dynamic import
    });
}
