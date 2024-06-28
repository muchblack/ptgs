import './bootstrap'
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import CKEditor from '@ckeditor/ckeditor5-vue'

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Components/Pages/**/*.vue', {eager: true})
        return pages[`./Components/Pages/${name}.vue`]
    },
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .use(CKEditor)
            .mount(el)
    },
}).then()
