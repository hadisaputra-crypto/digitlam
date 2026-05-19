import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'lam-green': '#14532d',
                'lam-yellow': '#facc15',
                'lam-purple': '#8b5cf6',
                'royal-gold': '#fcd34d',
                'royal-emerald': '#064e3b',
            },
            backgroundImage: {
                'batik': "url(\"data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23fcd34d' fill-opacity='0.08' fill-rule='evenodd'%3E%3Cpath d='M40 0l20 40-20 40-20-40zM0 40l40-20 40 20-40 20z'/%3E%3Ccircle cx='40' cy='40' r='4'/%3E%3C/g%3E%3C/svg%3E\")",
            }
        },
    },

    plugins: [forms],
};
