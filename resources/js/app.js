import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";
import 'flowbite/dist/flowbite';
import 'feather-icons/dist/feather';

import { createApp } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";
const el = document.getElementById("app");
import { replace } from 'feather-icons';

replace();
import SubKategorySelect from './components/SubKategorySelect.vue';
createApp({
    render: renderSpladeApp({ el })
})
    .use(SpladePlugin, {
        "max_keep_alive": 10,
        "transform_anchors": false,
        "progress_bar": true,
        "components": {
            SubKategorySelect,
        },
    })
    .mount(el);
    
    