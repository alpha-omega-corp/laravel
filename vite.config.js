import tailwindcss from '@tailwindcss/vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import { defineConfig, lazyPlugins } from 'vite-plus';

export default defineConfig({
    plugins: lazyPlugins(() => [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            fonts: [
                bunny('Space Grotesk', {
                    weights: [500, 700],
                    preload: [{ weight: 700 }],
                }),
                bunny('IBM Plex Sans', {
                    weights: [400, 500],
                    preload: [{ weight: 400 }],
                }),
                // The faces of the other six palettes. Only orchard, the default, is
                // preloaded: the rest are fetched when a palette that uses them is
                // picked. A generated project keeps the families of its own palette
                // and drops the others from here and from @fonts in the shell.
                bunny('Fraunces', {
                    weights: [600],
                    preload: false,
                }),
                bunny('Source Sans 3', {
                    weights: [400, 500],
                    preload: false,
                }),
                bunny('Inter Tight', {
                    weights: [600],
                    preload: false,
                }),
                bunny('Inter', {
                    weights: [400, 500],
                    preload: false,
                }),
                bunny('JetBrains Mono', {
                    weights: [500],
                    preload: false,
                }),
                bunny('Plus Jakarta Sans', {
                    weights: [400, 500, 800],
                    preload: false,
                }),
                bunny('Outfit', {
                    weights: [600],
                    preload: false,
                }),
                bunny('Instrument Serif', {
                    weights: [400],
                    preload: false,
                }),
            ],
        }),
        tailwindcss(),
    ]),
    server: {
        cors: true,
        watch: {
            ignored: [
                '**/.agents/**',
                '**/.claude/**',
                '**/.cursor/**',
                '**/.junie/**',
                '**/storage/framework/views/**',
                '**/vendor/**',
            ],
        },
    },
});
