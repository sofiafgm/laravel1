import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import inject from '@rollup/plugin-inject';

export default defineConfig({
    hmr: {
        host: 'localhost:5174',
      },
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
            refresh: true
        }),
        inject({   // => that should be first under plugins array
                     $: 'jquery',
                     jQuery: 'jquery',
                   })
    ]
});
