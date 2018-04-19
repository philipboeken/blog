<template>
<div>
    <div class="box add-button">
        <div class="columns is-centered">
            <div class="column is-narrow">
              <contact-add-modal @created="addContact"></contact-add-modal>
            </div>
        </div>
    </div>
    <div class="box">
        <contacts-table :contacts="contactsData" @updated="editContact" @deleted="removeContact"></contacts-table>
    </div>
</div>
</template>

<script>
import ContactsTable from './ContactsTable';

export default {
    components: {
        'contacts-table': ContactsTable
    },
    data () {
        return {
            contactsData: this.contacts
        }
    },
    props: {
        contacts: {
            type: Object,
            default() { return {}; }
        }
    },
    methods: {
        addContact(contact) {
            this.contactsData.push(contact);
        },
        editContact(contact) {
            this.removeContact(contact)
            this.addContact(contact);
        },
        removeContact(contact) {
            for (const c in this.contactsData) {
                if (this.contactsData[c].id === contact.id) {
                    Vue.delete(this.contactsData, c);
                }
            }
        }
    }
}
</script>
