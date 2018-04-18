<template>
  <div id="app">
    <full-calendar ref="calendar" :events="events" @event-selected="eventSelected" @event-created="eventCreated" @day-click="dayClick" @event-drop="editEvent" @event-resize="editEvent" :config="config"></full-calendar>
    <event-show-modal :active="showActive" :event="selected" @close="showActive=false" @edit="showActive=false;editActive=true"></event-show-modal>
    <event-add-modal :active="addActive" :event="selected" @close="addActive=false" :add="true"></event-add-modal>
    <event-add-modal :active="editActive" :event="selected" @close="editActive=false"></event-add-modal>

  </div>
</template>

<script>
import EventAddModal from './EventAddModal.vue'
import EventShowModal from './EventShowModal.vue'

export default {
    components: {
        'event-add-modal': EventAddModal,
        'event-show-modal': EventShowModal,
    },
    props: {
        events: {
            type: Array,
            default() {
                return [];
            }
        }
    },
    data() {
        return {
            config: {
                defaultView: 'month',
                fixedWeekcount: false,
                aspectRatio: 1.5,
                buttonText: {
                    today: 'Vandaag',
                    month: 'Maand',
                    week: 'Week',
                    day: 'Dag',
                    list: 'Lijst'
                },
                timezone: 'local',
                locale: 'nl',
                views: {
                    month: {
                        selectable: false
                    },
                    agendaWeek: {
                        allDayText: 'hele dag',
                        slotLabelFormat: 'HH:mm'
                    }
                },
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek listMonth'
                }
            },
            selected: {},
            addActive: false,
            editActive: false,
            showActive: false
        };
    },
    methods: {
        refreshEvents() {
            this.$refs.calendar.$emit('refetch-events');
        },
        removeEvent() {
            this.$refs.calendar.$emit('remove-event', this.selected);
            this.selected = {};
        },
        eventSelected(event) {
            this.showActive = true
            this.selected = event;
        },
        eventCreated(test) {
            this.addActive = true;
            this.selected = test;
        },
        dayClick(date, jsEvent, view) {
            if (view.name === 'month') {
                this.$refs.calendar.fireMethod('changeView', 'agendaWeek');
                this.$refs.calendar.fireMethod('gotoDate', date);
            }
        },
        editEvent(event) {
            this.selected = event;
            axios.post('/agenda/' + event.id + '/edit', {
                id: event.id,
                title: event.title,
                start: event.start,
                end: event.end,
                allDay: event.allDay,
                location: event.location,
                note: event.note
            }).then(function (response) {
                console.log(response);
            }).catch(function (error) {
                console.log(error);
            });
        }
    },
};
</script>
