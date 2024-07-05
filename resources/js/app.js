import './bootstrap'
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { createPinia } from 'pinia';

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Components/Pages/**/*.vue', {eager: true})
        return pages[`./Components/Pages/${name}.vue`]
    },
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .use(createPinia())
            .mount(el)
    },
}).then()
