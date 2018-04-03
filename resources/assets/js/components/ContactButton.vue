<template>
    <div>
        <contact-show-modal :active="active" @close="active=false"></contact-show-modal>
        <div class="button is-fullwidth has-text-left" @click="active=true">
            <b-icon icon="user" size="is-small"></b-icon>
            <span>{{ fullName }}</span>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return  {
            active: false
        }
    },
    props: {
        contact: {
            type: Object,
            default() {
                return {
                    first_name: '',
                    surname: ''
                }
            }
        }
    },
    computed: {
        fullName() {
            return this.contact.first_name + ' ' + this.contact.surname;
        }
    }
}
</script>
