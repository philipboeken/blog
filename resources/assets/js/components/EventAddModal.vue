<template>
    <div>
        <div class="modal" :class="{'is-active': active}">
            <div class="event-modal modal-background" @click="close()"></div>
            <div class="modal-card">
                <section class="modal-card-body">
                    <b-field horizontal label="Titel">
                        <b-input v-model="title"></b-input>
                    </b-field>
                    <b-field horizontal>
                        <b-checkbox v-model="allDay">Activiteit duurt de hele dag</b-checkbox>
                    </b-field>
                    <b-field horizontal label="Begin" grouped>
                        <b-datepicker placeholder="Kies een datum" v-model="startDate"></b-datepicker>
                        <b-timepicker v-if="!allDayData" placeholder="Kies een tijd" v-model="startTime"></b-timepicker>
                    </b-field>
                    <b-field horizontal label="Einde" grouped>
                        <b-datepicker placeholder="Kies een datum" v-model="endDate" :readonly="allDay"></b-datepicker>
                        <b-timepicker v-if="!allDayData" placeholder="Kies een tijd" v-model="endTime"></b-timepicker>
                    </b-field>
                    <b-field horizontal label="Lokatie">
                        <b-input v-model="location"></b-input>
                    </b-field>
                    <b-field horizontal label="Notitie">
                        <b-input type="textarea"
                                 v-model="note"
                                 maxlength="100">
                        </b-input>
                    </b-field>
                    <b-field horizontal grouped>
                        <p class="control">
                            <a v-if="add" class="button is-success" @click="store()">Voeg toe</a>
                            <a v-else class="button is-success" @click="edit()">Wijziginen opslaan</a>
                        </p>
                        <p class="control">
                            <a class="button" @click="close()">Annuleer</a>
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
    components: {},
    data() {
        return {
            titleData: this.event.title,
            startDateData: this.event.start,
            startTimeData: this.event.start,
            endDateData: this.event.end,
            endTimeData: this.event.end,
            allDayData: this.event.allDay,
            locationData: this.event.location,
            noteData: this.event.note
        }
    },
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
        },
        add: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        store() {
            axios.post('/agenda/create', {
                title: this.titleData,
                start: this.startDateData,
                end: this.endDateData,
                allDay: this.allDayData,
                location: this.locationData,
                note: this.noteData
            }).then(function (response) {
                console.log(response);
            }).catch(function (error) {
                console.log(error);
            });
        },
        edit() {
            axios.post('/agenda/' + this.event.id + '/edit', {
                id: this.event.id,
                title: this.titleData,
                start: this.startData,
                end: this.endData,
                allDay: this.allDayData,
                location: this.locationData,
                note: this.noteData
            }).then(function (response) {
                location.reload();
            }).catch(function (error) {
                console.log(error);
            });
        },
        close() {
            this.$emit('close');
        }
    },
    computed: {
        title: {
            get() { return this.event.title; },
            set(val) { this.titleData = val  }
        },
        startDate: {
            get() { return moment(this.event.start).toDate(); },
            set(val) { this.startDateData = val }
        },
        startTime: {
            get() { return moment(this.event.start).toDate(); },
            set(val) { this.startTimeData = val }
        },
        endDate: {
            get() { return moment(this.event.end).toDate(); },
            set(val) { this.endDateData = val }
        },
        endTime: {
            get() { return moment(this.event.end).toDate(); },
            set(val) { this.sendTimeData = val }
        },
        allDay: {
            get() { return this.event.allDay; },
            set(val) { this.allDayData = val }
        },
        location: {
            get() { return this.event.location; },
            set(val) { this.locationData = val }
        },
        note: {
            get() { return this.event.note; },
            set(val) { this.noteData = val }
        }
    }
}
</script>