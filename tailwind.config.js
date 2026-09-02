import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.{js,jsx}',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', 'Inter', ...defaultTheme.fontFamily.sans],
                display: ['Outfit', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                navy: {
                    50: '#EFF6FF',
                    100: '#DBEAFE',
                    200: '#BFDBFE',
                    300: '#93C5FD',
                    400: '#60A5FA',
                    500: '#1E3A5F',
                    600: '#162F4A',
                    700: '#0F2440', // utama biru tua
                    800: '#0B1D33',
                    900: '#071425',
                    950: '#040A1A',
                },
                brand: {
                    DEFAULT: '#0F2A4A',
                    light: '#1A3A5C',
                    dark: '#0B1D33',
                    accent: '#C5A880', // gold muted untuk aksen
                },
                surface: {
                    50: '#F8FAFC',
                    100: '#F1F5F9',
                }
            },
            boxShadow: {
                'soft': '0 2px 15px -3px rgba(15,36,64,0.07), 0 10px 20px -2px rgba(15,36,64,0.04)',
                'card': '0 1px 3px rgba(15,36,64,0.08), 0 4px 12px rgba(15,36,64,0.05)',
            }
        },
    },

    plugins: [forms],
};
