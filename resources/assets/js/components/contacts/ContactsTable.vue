<template>
    <section>
        <b-table
            :data="contacts"
            :paginated="isPaginated"
            :per-page="perPage"
            :current-page.sync="currentPage"
            :pagination-simple="isPaginationSimple"
            :default-sort-direction="defaultSortDirection"
            default-sort="user.surname">
            <template slot-scope="props">
                <b-table-column field="first_name" label="Voornaam" sortable>
                    {{ props.row.first_name }}
                </b-table-column>
                <b-table-column field="surname" label="Achternaam" sortable>
                    {{ props.row.surname }}
                </b-table-column>
                <b-table-column field="date" label="Datum toegevoegd" sortable>
                    {{ props.row.created_at_formatted }}
                </b-table-column>
                <b-table-column field="actions" label="Acties">
                    <contact-actions :contact="props.row" @updated="editContact" @deleted="removeContact"></contact-actions>
                </b-table-column>
            </template>
        </b-table>
    </section>
</template>

<script>
import ContactActions from './ContactActions';
export default {
    components: {
        'contact-actions': ContactActions
    },
    data() {
        return {
            isPaginated: false,
            isPaginationSimple: false,
            defaultSortDirection: 'asc',
            currentPage: 1,
            perPage: 10
        }
    },
    props: {
        contacts: {
            type: Array,
            default() {
                return [];
            }
        }
    },
    methods: {
        editContact(contact) {
            this.$emit('updated', contact);
        },
        removeContact(contact) {
            this.$emit('deleted', contact);
        }
    }
}
</script>
