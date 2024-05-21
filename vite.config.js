import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [

        laravel({
            // Указываем ссылки на входные файлы SCSS и JS.
            // Изначально указаны  css файлы
            input: ['resources/scss/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),

    ],
});