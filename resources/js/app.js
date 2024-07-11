import './bootstrap'
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { createPinia } from 'pinia';

import { library } from '@fortawesome/fontawesome-svg-core';
import { faFacebookSquare, faInstagram } from '@fortawesome/free-brands-svg-icons';
import { faShoppingCart } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { fab } from '@fortawesome/free-brands-svg-icons';
import { fas } from '@fortawesome/free-solid-svg-icons';



createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Components/Pages/**/*.vue', {eager: true})
        return pages[`./Components/Pages/${name}.vue`]
    },
    setup({el, App, props, plugin}) {
        library.add(faShoppingCart, faInstagram, faFacebookSquare);
        library.add(fas);
        createApp({render: () => h(App, props)})
            .use(plugin)
            .use(createPinia())
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el)
    },
}).then()
