<template>
    <div>
        <a class="button" @click="viewActive=true">Bekijk</a>
        <a class="button is-info" @click="editActive= true">Bewerk</a>
        <a class="button is-danger" @click="removeContact">Verwijder</a>
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
                            <input class="input" type="text" v-model="contactData.first_name">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Achternaam</label>
                        <div class="control">
                            <input class="input" type="text" v-model="contactData.surname">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input" type="text" v-model="contactData.email">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Tel 1</label>
                        <div class="control">
                            <input class="input" type="text" v-model="contactData.tel1">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Tel 2</label>
                        <div class="control">
                            <input class="input" type="text" v-model="contactData.tel2">
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <a class="button is-success" @click="updateContact()">Opslaan</a>
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
            contactData: {
                id: this.contact.id,
                first_name: this.contact.first_name,
                surname: this.contact.surname,
                email: this.contact.email,
                tel1: this.contact.phonenumber1,
                tel2: this.contact.phonenumber2
            }
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
                    phonenumber2_description: ''
                }
            }
        }
    },
    methods: {
        updateContact() {
            axios.put('/contacts/' + this.contactData.id, this.contactData)
                .then(response => {
                    this.$emit('updated', response.data);
                    this.editActive = false;
                }).catch(error => {
                    console.log(error);
                });
        },
        removeContact() {
            this.$dialog.confirm({
                title: 'Verwijder contact: ' + this.contactData.first_name + ' ' + this.contactData.surname,
                message: 'Weet je zeker dat je dit contact wilt verwijderen?',
                cancelText: 'Annuleer',
                confirmText: 'Verwijder',
                type: 'is-danger',
                hasIcon: true,
                onConfirm: () => {
                    axios.delete('/contacts/' + this.contactData.id)
                        .then(() => {
                            this.$toast.open({
                                message: 'Contact verwijderd!',
                                type: 'is-success'
                            });
                            this.$emit('deleted', this.contactData);
                        });
                }
            })
        }
    }
}
</script>