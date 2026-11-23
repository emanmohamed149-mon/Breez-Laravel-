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
                // إضافة خطوط السايبربانك
                sans: ['Space Mono', ...defaultTheme.fontFamily.sans],
                title: ['Orbitron', 'sans-serif'],
                mono: ['Space Mono', 'monospace'],
            },
            colors: {
                // تخصيص ألوان النيون لو حبيتي تستخدميها بأسماء واضحة
                'cyber-pink': '#ec4899', // Pink-500
                'cyber-cyan': '#06b6d4', // Cyan-500
                'cyber-dark': '#0b0f19',
                'cyber-gray': '#121826',
            },
        },
    },

    plugins: [forms],
};