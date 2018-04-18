<template>
    <div>
        <a class="button is-white" @click="active=true">
            <span>Voeg een contactpersoon toe</span>
            <b-icon icon="plus"></b-icon>
        </a>

        <div class="modal" :class="{'is-active': active}">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Voeg een contactpersoon toe</p>
                    <a class="delete" @click="active=false"></a>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">Voornaam</label>
                        <div class="control">
                            <input class="input" type="text" v-model="first_name">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Achternaam</label>
                        <div class="control">
                            <input class="input" type="text" v-model="surname">
                        </div>
                    </div>
                     <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input" type="text" v-model="email">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Tel 1</label>
                        <div class="control">
                            <input class="input" type="text" v-model="tel1">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Tel 2</label>
                        <div class="control">
                            <input class="input" type="text" v-model="tel2">
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <a class="button is-success" @click="send()">Voeg toe</a>
                    <a class="button" @click="active=false">Annuleer</a>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    components: {},
    data() {
        return {
            active: false,
            first_name: '',
            surname: '',
            email: '',
            tel1: '',
            tel2: ''
        }
    },
    props: {},
    methods: {
        send() {
            axios.post('/contacts/create', {
                first_name: this.first_name,
                surname: this.surname,
                email: this.email,
                tel1: this.tel1,
                tel2: this.tel2
            }).then(function (response) {
                location.reload();
            }).catch(function (error) {
                console.log(error);
            });
        }
    }
}
</script>