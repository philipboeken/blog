<template>
    <div>
        <div class="modal" :class="{'is-active': active}">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Contact</p>
                    <a class="delete" @click="close()"></a>
                </header>
                <section class="modal-card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Voornaam</td>
                                <td>{{ this.contact.first_name }}</td>
                            </tr>
                            <tr>
                                <td>Achternaam</td>
                                <td>{{ this.contact.surname }}</td>
                            </tr>
                            <tr>
                                <td>Email adres</td>
                                <td>{{ this.contact.email }}</td>
                            </tr>
                            <tr>
                                <td>{{ this.contact.phonenumber1_description }}</td>
                                <td>{{ this.contact.phonenumber1 }}</td>
                            </tr>
                            <tr>
                                <td>{{ this.contact.phonenumber2_description }}</td>
                                <td>{{ this.contact.phonenumber2 }}</td>
                            </tr>
                            <tr>
                                <td>Datum toegevoegd</td>
                                <td>{{ this.contact.created_at }}</td>
                            </tr>
                            <tr>
                                <td>Datum gewijzigd</td>
                                <td>{{ this.contact.updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <footer class="modal-card-foot">
                    <a class="button" @click="close()">Sluit venster</a>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    components: {},
    props: {
        active: {
            type: Boolean,
            default: false
        },
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
        close() {
            this.$emit('close');
        }
    }
}
</script>