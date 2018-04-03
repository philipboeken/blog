<template>
    <div>
        <a class="button" @click="viewActive=true">Bekijk</a>
        <a class="button is-info" @click="editActive= true">Bewerk</a>
        <a class="button is-danger" @click="confirmCustomDelete">Verwijder</a>
        <contact-show-modal :contact="contact" :active="viewActive" @close="viewActive=false"></contact-show-modal>

        <div class="modal" :class="{'is-active': editActive}">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Bewerk contactpersoon</p>
                    <a class="delete" @click="editActive=false"></a>
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
                    <a class="button is-success" @click="send()">Opslaan</a>
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
            editActive: false,
            viewActive: false,
            id: this.contact.id,
            first_name: this.contact.first_name,
            surname: this.contact.surname,
            email: this.contact.email,
            tel1: this.contact.phonenumber1,
            tel2: this.contact.phonenumber2
        }
    },
    props: {
        contact: {
            type: Object,
            default() {
                return {
                    user_id: '',
                    first_name: '',
                    surname: '',
                    email: '',
                    phonenumber1: '',
                    phonenumber1_description: '',
                    phonenumber2: '',
                    phonenumber2_description: '',
                }
            }
        }
    },
    methods: {
        send() {
            axios.post('/contacts/update/' + this.id, {
                id: this.id,
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
        },
        confirmCustomDelete() {
            this.$dialog.confirm({
                title: 'Verwijder contact: ' + this.first_name + ' ' + this.surname,
                message: 'Weet u zeker dat u dit contact wilt verwijderen?',
                cancelText: 'Annuleer',
                confirmText: 'Verwijder',
                type: 'is-danger',
                hasIcon: true,
                onConfirm: () => {
                    axios.post('/contacts/delete/' + this.id).then(
                        this.$toast.open('Contact verwijderd!')
                    );
                }
            })
        }
    }
}
</script>