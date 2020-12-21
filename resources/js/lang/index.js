import EN from './translations/en';
import PT from './translations/pt';

// export default {
//   en,
//   pt
// }; 


import Vue from "vue";
import VueI18n from "vue-i18n";

Vue.use(VueI18n);

const i18n = new VueI18n({
  locale: "en",
  messages: {
    pt: PT,
    en: EN
  }
});

export { i18n };
