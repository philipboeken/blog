<template>
    <div>
        <div class="modal" :class="{'is-active': active}">
            <div class="event-modal modal-background" @click="close()"></div>
            <div class="modal-card">
                <section class="modal-card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Titel</td>
                                <td>{{ this.event.title }}</td>
                            </tr>
                            <tr>
                                <td>Lokatie</td>
                                <td>{{ this.event.location }}</td>
                            </tr>
                            <tr>
                                <td>Activiteteit duurt de hele dag</td>
                                <td>{{ this.event.allDay }}</td>
                            </tr>
                            <tr>
                                <td>Begin</td>
                                <td>{{ format(this.event.start) }}</td>
                            </tr>
                            <tr>
                                <td>Einde</td>
                                <td>{{ format(this.event.end) }}</td>
                            </tr>
                            <tr>
                                <td>Notitie</td>
                                <td>{{ this.event.note }}</td>
                            </tr>
                            <tr>
                                <td>Aangemaakt door</td>
                                <td>{{ this.event.userID }}</td>
                            </tr>
                            <tr>
                                <td>Datum toegevoegd</td>
                                <td>{{ format(this.event.created_at) }}</td>
                            </tr>
                            <tr>
                                <td>Datum gewijzigd</td>
                                <td>{{ format(this.event.updated_at) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <b-field grouped>
                        <p class="control">
                            <a class="button is-success" @click="edit()">Bewerk</a>
                        </p>
                        <p class="control">
                            <a class="button" @click="close()">Sluit</a>
                        </p>
                    </b-field>
                </section>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment';
export default {
    props: {
        active: {
            type: Boolean,
            default: false
        },
        event: {
            type: Object,
            default() {
                return {};
            }
        }
    },
    methods: {
        edit() {
            this.$emit('edit');
        },
        close() {
            this.$emit('close');
        },
        format(date) {
            return moment(date).format('HH:mm d-MM-Y')
        }
    }
}
</script>