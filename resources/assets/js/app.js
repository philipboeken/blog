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
require('trix');
require('fullcalendar/dist/locale/nl.js');

let entries = require('object.entries');
if (!Object.entries) {
    entries.shim();
}
let includes = require('array-includes');
if (!Array.prototype.includes) {
    includes.shim();
}

window.Vue = require('vue');
window.axios = require('axios');

axios.defaults.baseURL = '/api/v1/';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

import VueFlatpickr from 'vue-flatpickr';
import 'vue-flatpickr/theme/airbnb.css';
import FullCalendar from 'vue-full-calendar'
import Vue from 'vue'
import Buefy from 'buefy'

Vue.use(VueFlatpickr);
Vue.use(FullCalendar)
Vue.use(Buefy, {
    defaultIconPack: 'fas'
});

Vue.component('account-menu', require('./components/AccountMenu.vue'));
Vue.component('calendar', require('./components/Calendar.vue'));
Vue.component('contact-button', require('./components/contacts/ContactButton.vue'));
Vue.component('contact-show-modal', require('./components/contacts/ContactShowModal.vue'));
Vue.component('contact-add-modal', require('./components/contacts/ContactAddModal.vue'));
Vue.component('contacts-page', require('./components/contacts/ContactsPage.vue'));
Vue.component('custom-label', require('./components/CustomLabel.vue'));
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
    el: '#app',

    directives: {
        'autofocus': {
            inserted(el) {
                el.focus();
            }
        }
    },

    data: {
        files: {},
        file: {},

        pagination: {},
        offset: 5,

        activeTab: 'image',
        isVideo: false,

        formData: {},
        fileName: '',
        attachment: [],

        editingFile: {},
        deletingFile: {},

        modalActive: false,
        message: '',
        errors: {}
    },

    methods: {
        isActive(tabItem) {
            return this.activeTab === tabItem;
        },

        setActive(tabItem) {
            this.activeTab = tabItem;
        },

        isCurrentPage(page) {
            return this.pagination.current_page === page;
        },

        fetchFile(type, page) {
            const loadingComponent = this.$loading.open();
            axios.get('files/' + type + '?page=' + page).then(result => {
                loadingComponent.close();
                this.files = result.data.data.data;
                this.pagination = result.data.pagination;
            }).catch(error => {
                console.log(error);
                loadingComponent.close();
            });

        },

        getFiles(type) {
            this.setActive(type);
            this.fetchFile(type);

            if (this.activeTab === 'video') {
                this.isVideo = true;
            } else {
                this.isVideo = false;
            }
        },

        submitForm() {
            this.formData = new FormData();
            this.formData.append('name', this.fileName);
            this.formData.append('file', this.attachment[0]);
            const loadingComponent = this.$loading.open();
            axios.post('files/add', this.formData, { headers: { 'Content-Type': 'multipart/form-data' } })
                .then(response => {
                    this.resetForm();
                    loadingComponent.close();
                    this.$toast.open({
                        message: 'File successfully upload!',
                        type: 'is-success'
                    })
                    this.setActive(this.attachment)
                    this.fetchFile(this.activeTab);
                })
                .catch(error => {
                    loadingComponent.close();
                    this.errors = error.response.data.errors;
                    this.$toast.open({
                        message: error.response.data.message,
                        type: 'is-danger'
                    });
                    this.fetchFile(this.activeTab);
                });
        },

        prepareToDelete(file) {
            this.deletingFile = file;
            this.$dialog.confirm({
                message: 'Bestand verwijderen?',
                onConfirm: () => this.deleteFile()
            })
        },

        deleteFile() {
            const loadingComponent = this.$loading.open();
            axios.post('files/delete/' + this.deletingFile.id)
                .then(response => {
                    loadingComponent.close();
                    this.$toast.open({
                        message: 'File successfully deleted!',
                        type: 'is-success'
                    });
                    this.fetchFile(this.activeTab, this.pagination.current_page);
                })
                .catch(error => {
                    loadingComponent.close();
                    this.errors = error.response.data.errors();
                    this.$toast.open({
                        message: 'Something went wrong! Please try again later.',
                        type: 'is-danger'
                    });
                    this.fetchFile(this.activeTab, this.pagination.current_page);
                });

            this.cancelDeleting();
        },

        editFile(file) {
            this.editingFile = file;
        },

        endEditing(file) {
            this.editingFile = {};

            if (file.name.trim() === '') {
                alert('Filename cannot be empty!');
                this.fetchFile(this.activeTab);
            } else {
                let formData = new FormData();
                formData.append('name', file.name);
                formData.append('type', file.type);
                formData.append('extension', file.extension);
                const loadingComponent = this.$loading.open();
                axios.post('files/edit/' + file.id, formData)
                    .then(response => {
                        loadingComponent.close();
                        if (response.data === true) {
                            this.$toast.open({
                                message: 'Filename succesfully changed!',
                                type: 'is-success'
                            })

                            var src = document.querySelector('[alt="' + file.name + '"]').getAttribute("src");
                            document.querySelector('[alt="' + file.name + '"]').setAttribute('src', src);
                        }
                    })
                    .catch(error => {
                        loadingComponent.close();
                        this.errors = error.response.data.errors;
                        this.$toast.open({
                            message: error.response.data.message,
                            type: 'is-danger'
                        });
                    });

                this.fetchFile(this.activeTab, this.pagination.current_page);
            }
        },

        showModal(file) {
            this.file = file;
            this.modalActive = true;
        },

        closeModal() {
            this.modalActive = false;
            this.file = {};
        },

        changePage(page) {
            this.fetchFile(this.activeTab, page);
        },

        resetForm() {
            this.formData = {};
            this.fileName = '';
            this.attachment = [];
        }
    },

    mounted() {
        this.fetchFile(this.activeTab, this.pagination.current_page);
    }
});