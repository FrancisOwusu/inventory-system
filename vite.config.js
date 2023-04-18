import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        vue(),
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
    ],
    // resolve: {
    //     alias: {
    //         '~': '/node_modules/noty/src'
    //         // this is required for the SCSS modules
    //         find: /^~(.*)$/,
    //         replacement: '$1',
    //     }
    // },
    // resolve: {
    //     alias: [
    //         {
    //             // this is required for the SCSS modules
    //             // '~': '/node_modules/noty/src',
    //             // find: /^~(.*)$/,
    //             // replacement: '$1',
    //         },
    //     ],
    // },
    // resolve: {
    //     alias: {
    //         '~noty': 'node_modules/noty/src/'
    //     }
    // }
});