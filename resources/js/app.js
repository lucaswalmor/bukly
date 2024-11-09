import '../css/app.css';
import './bootstrap';
import 'sweetalert2/dist/sweetalert2.min.css';
import '@mdi/font/css/materialdesignicons.css';

import {
    createInertiaApp
} from '@inertiajs/vue3';
import {
    resolvePageComponent
} from 'laravel-vite-plugin/inertia-helpers';
import {
    createApp,
    h
} from 'vue';
import {
    ZiggyVue
} from '../../vendor/tightenco/ziggy';

// LIB VUETIFY
import {
    createVuetify
} from 'vuetify';
import 'vuetify/styles';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';

const vuetify = createVuetify({
    components,
    directives,
    theme: {
        defaultTheme: 'light',
        themes: {
            light: {
                colors: {
                    primary: '#1976D2',
                    secondary: '#424242',
                    accent: '#82B1FF',
                    error: '#FF5252',
                },
            },
        },
    },
    icons: {
      iconfont: 'mdi', // Ou o pacote de ícones que você estiver utilizando
    },
});

// LIB VUE THE MASK
import VueTheMask from 'vue-the-mask';

// LIB VUE SWEETALERT
import VueSweetalert2 from 'vue-sweetalert2';

const appName =
    import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({
        el,
        App,
        props,
        plugin
    }) {
        return createApp({
                render: () => h(App, props)
            })
            .use(plugin)
            .use(ZiggyVue)
            .use(VueTheMask)
            .use(VueSweetalert2)
            .use(vuetify)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
