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
                    {{ new Date(props.row.created_at).toLocaleDateString() }}
                </b-table-column>
                <b-table-column field="actions" label="Acties">
                    <contact-actions :contact="props.row"></contact-actions>
                </b-table-column>
            </template>
        </b-table>
    </section>
</template>

<script>
export default {
    data() {
        return {
            isPaginated: true,
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
    }
}
</script>
