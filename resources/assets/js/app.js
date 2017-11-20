/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("jspolyfill-array.prototype.find");
require('es6-object-assign').polyfill();
let entries = require('object.entries');
if (!Object.entries) {
  entries.shim();
}
let includes = require('array-includes');
if (!Array.prototype.includes) {
  includes.shim();
}
require('./bootstrap');
require('es6-promise').polyfill();

require('./bootstrap');
require('./bulma');
require('./froala');

window.Vue = require('vue');

Vue.component('datepicker', require('./components/Datepicker.vue'));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#app'
});
