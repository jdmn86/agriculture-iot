require("./bootstrap");

import Vue from "vue";
import MainApp from "./layouts/MainApp";
import stores from "./stores/index";
import Router from "./routes";

//bootstrap  and awesome
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

import VueI18n from 'vue-i18n';
import VueInternationalization from 'vue-i18n';
import Locale from './lang/translations/vue-i18n-locales.generated';

Vue.use(VueI18n);

import messages from './lang';

export const i18n = new VueI18n({
  locale: 'en',
  fallbackLocale: 'en',
  messages
});

import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'


// library.add(fas, faTwitter)

// Vue.component('font-awesome-icon', FontAwesomeIcon)

import Permissions from './mixins/Permissions.vue';
Vue.mixin(Permissions);


/**
 * Initialize v-toaster
 */
// import Toaster from "v-toaster";
// import "v-toaster/dist/v-toaster.css";
// Vue.use(Toaster, { timeout: 5000 });

const app = new Vue({
    el: "#app",

    router: Router,
    store: stores,
    i18n,

    render: h => h(MainApp)
});
