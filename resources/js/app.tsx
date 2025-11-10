import '../css/app.css';

import { createInertiaApp } from '@inertiajs/react';
import { createRoot } from 'react-dom/client';
import React from 'react';

createInertiaApp({
    title: (title: string) => `${title}`,
    resolve: (name: string) => {
        const pages = import.meta.glob('./pages/**/*.tsx', { eager: true });
        return pages[`./pages/${name}.tsx`];
    },
    setup({ el, App, props }: { el: Element; App: React.ComponentType<any>; props: any }) {
        createRoot(el).render(<App {...props} />);
    },
});   