import tailwindcss from '@tailwindcss/vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import { defineConfig, lazyPlugins } from 'vite-plus';
import { readFileSync } from 'node:fs';

// Every palette's faces, off the map a site's own vite.config.js reads, so the
// showcase and a site cannot load two different lists. Only orchard, the default,
// is preloaded: the rest are fetched when a palette that uses them is picked.
const palettes = JSON.parse(readFileSync(new URL('./resources/css/fonts.json', import.meta.url), 'utf8'));
const fonts = Object.entries(palettes).flatMap(([palette, faces]) =>
    Object.values(faces).map(({ family, weights }) =>
        bunny(family, { weights, preload: palette === 'orchard' ? [{ weight: weights[0] }] : false }),
    ),
);

export default defineConfig({
    plugins: lazyPlugins(() => [
        laravel({
            // The showcase is the package's workbench, served by Testbench: its
            // assets build into workbench/public, the directory it serves.
            input: ['workbench/resources/css/app.css', 'workbench/resources/js/app.js'],
            publicDirectory: 'workbench/public',
            refresh: ['resources/views/**', 'lang/**', 'workbench/resources/views/**', 'workbench/routes/**', 'workbench/lang/**'],
            fonts,
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
