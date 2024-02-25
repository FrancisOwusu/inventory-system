import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    // plugins: [
    //     vue(),
    //     laravel([
    //         'resources/css/app.css',
    //         'resources/js/app.js',
    //     ]),
    // ],
    plugins: [
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    // resolve: {
    //     alias: {
    //         vue: 'vue/dist/vue.esm-bundler.js',
    //     },
    // },
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
// module.exports = {
//     publicPath: process.env.NODE_ENV === 'production'
//         ? '/dist/'
//         : '/'
// }
