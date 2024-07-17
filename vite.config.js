import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    server: {
        host: true,
        port: 5173,
        hmr: {
            host: ''
        },
        // watch:{
        //     usePolling: true
        // }
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/base.css',
                'resources/css/index.scss',
                'resources/css/main.css',
                'resources/css/newsList.scss',
                'resources/js/app.js',
                'resources/asset/vendor/fonts/materialdesignicons.css',
                'resources/asset/vendor/libs/node-waves/node-waves.css',
                'resources/asset/vendor/css/core.css',
                'resources/asset/vendor/css/theme-default.css',
                'resources/asset/vendor/css/pages/page-auth.css',
                'resources/css/demo.css',
                'resources/asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css',
                'resources/asset/vendor/libs/apex-charts/apex-charts.css',
                'resources/asset/js/config.js',
                'resources/asset/vendor/libs/jquery/jquery.js',
                'resources/asset/vendor/libs/popper/popper.js',
                'resources/asset/vendor/js/bootstrap.js',
                'resources/asset/vendor/libs/node-waves/node-waves.js',
                'resources/asset/vendor/libs/apex-charts/apexcharts.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                }
            }
        })
    ],
    resolve: name => {
        const pages = import.meta.glob('./Components/Pages/**/*.vue', { eager: true })
        return pages[`./Components/Pages/${name}.vue`]
    },
});
