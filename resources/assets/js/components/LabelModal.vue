<template>
    <div>
        <a class="button is-centered" @click="active=true">
            <span>Maak een nieuw label</span>
            <b-icon icon="plus"></b-icon>
        </a>

        <div class="modal" :class="{'is-active': active}">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Maak een nieuw label</p>
                    <a class="delete" @click="active=false"></a>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">Titel</label>
                        <div class="control">
                            <input class="input" type="text" v-model="title">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Kleur</label>
                        <div class="control">
                            <chrome-picker v-model="colors"></chrome-picker>
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <a class="button is-success" @click="send()">Opslaan</a>
                    <a class="button" @click="active=false">Annuleer</a>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
import { Chrome } from 'vue-color'

export default {
    components: {
        'chrome-picker': Chrome
    },
    data() {
        return {
            active: false,
            title: '',
            colors: function () {
                return {};
            }
        }
    },
    props: {},
    methods: {
        send() {
            axios.post('/labels/create', {
                title: this.title,
                color: this.colors.hex
            }).then(function (response) {
                location.reload();
            }).catch(function (error) {
                console.log(error);
            });
        }
    }
}
</script>