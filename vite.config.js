import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        react({
            // Fast Refresh untuk DX, babel auto
            jsxImportSource: 'react',
        }),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.jsx'],
            refresh: true,
        }),
    ],
    build: {
        // Sentuhan performa tipis — target modern, minify oxc (tanpa esbuild), code-split
        target: 'es2018',
        cssCodeSplit: true,
        sourcemap: false,
        minify: true,
        rollupOptions: {
            output: {
                // Rolldown/Vite 8 butuh function, bukan object
                manualChunks(id) {
                    if (!id.includes('node_modules')) return;
                    if (id.includes('react-dom') || id.includes('/react/') || id.includes('/scheduler/')) return 'react-vendor';
                    if (id.includes('alpinejs')) return 'alpine';
                },
            },
        },
        chunkSizeWarningLimit: 600,
    },
    optimizeDeps: {
        include: ['react', 'react-dom', 'alpinejs'],
    },
});
