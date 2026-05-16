import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'neutral-primary-soft': '#F9F3E9',
                'neutral-primary-medium': '#f3f4f6',
                'neutral-secondary-medium': '#e5e7eb',
                'neutral-tertiary-medium': '#d1d5db',
                'neutral-tertiary': '#9ca3af',
                'default': '#e5e7eb',
                'default-medium': '#d1d5db',
                'heading': '#111827',
                'body': '#4b5563',
                'fg-brand': '#1d4ed8',
                'fg-disabled': '#9ca3af',
                'danger-soft': '#fee2e2',
                'danger-subtle': '#fecaca',
                'fg-danger-strong': '#b91c1c',
            },
            borderRadius: {
                'base': '0.375rem',
            }
        },
    },

    plugins: [forms, typography, require('flowbite/plugin')],
};
