import Vue from 'vue';
import { ValidationObserver, ValidationProvider, extend ,configure} from 'vee-validate';
 import { i18n } from "./../lang";

// Register it globally
Vue.component("ValidationObserver", ValidationObserver);
Vue.component('ValidationProvider', ValidationProvider);


import * as rules from 'vee-validate/dist/rules';

Object.keys(rules).forEach(rule => {
  extend(rule, rules[rule]);
});

// with typescript
for (let [rule, validation] of Object.entries(rules)) {
  extend(rule, {
    ...validation
  });
}

configure({
  classes: {
    valid: 'is-valid',
    invalid: 'is-invalid', 
    dirty: ['is-dirty', 'is-dirty'], // multiple classes per flag!
    // ...
  },
  defaultMessage: (field, values) => {
    values._field_ = i18n.t(`fields.${field}`);
    return i18n.t(`validation.${values._rule_}`, values);
  },
})
