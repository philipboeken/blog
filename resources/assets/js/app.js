/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("jspolyfill-array.prototype.find");
require('es6-object-assign').polyfill();
require('./bootstrap');
require('es6-promise').polyfill();
require('./bulma');
require('./froala');

let entries = require('object.entries');
if (!Object.entries) {
  entries.shim();
}
let includes = require('array-includes');
if (!Array.prototype.includes) {
  includes.shim();
}

window.Vue = require('vue');

import VueFlatpickr from 'vue-flatpickr';
import 'vue-flatpickr/theme/airbnb.css';

Vue.use(VueFlatpickr);

import Vue from 'vue'
import Buefy from 'buefy'

Vue.use(Buefy, {
  defaultIconPack: 'fa'
});

Vue.component('contact-modal', require('./components/ContactModal.vue'));
Vue.component('datepicker', require('./components/Datepicker.vue'));
Vue.component('drag-and-drop', require('./components/DragAndDrop.vue'));
Vue.component('file-modal', require('./components/FileModal.vue'));
Vue.component('label-modal', require('./components/LabelModal.vue'));
Vue.component('multi-select', require('./components/MultiSelect.vue'));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  components: {},
  el: '#app'
});
