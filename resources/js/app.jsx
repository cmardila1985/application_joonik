import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createRoot } from 'react-dom/client';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

const resolve = (name) => {
    if (name.endsWith('.jsx')) {
        return resolvePageComponent(`./pages/${name}.jsx`, import.meta.glob('./pages/**/*.jsx'));
    } else {
        return resolvePageComponent(`./pages/${name}.tsx`, import.meta.glob('./pages/**/*.tsx'));
    }
};

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: resolve,
    setup({ el, App, props }) {
        const root = createRoot(el);

        root.render(<App {...props} />);
    },
    progress: {
        color: '#4B5563',
    },
});
