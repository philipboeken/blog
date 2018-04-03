<template>
    <div>
        <b-datepicker
                v-model="date"
                :first-day-of-week="1"
                :placeholder="placeholder"
                :min-date="toDate(minDate)"
                :max-date="toDate(maxDate)">
        </b-datepicker>
        <input :name="name" hidden v-model="dateFormatted">
    </div>
</template>

<script>
export default {
  data() {
    return {
      date: this.toDate(this.value)
    }
  },
  props: {
    value: {
      default: null
    },
    defaultDate: {
      type: String
    },
    minDate: {
      type: String
    },
    maxDate: {
      type: String
    },
    name: {
      type: String
    },
    placeholder: {
      type: String,
      default: 'dd-mm-YYYY'
    }
  },
  computed: {
    dateFormatted() {
      return !this.date ? this.date : [this.date.getDate(), this.date.getMonth() + 1, this.date.getFullYear()].join('-');
    }
  },
  methods: {
    toDate(str) {
      return str ? new Date([str.split('-')[2], str.split('-')[1], str.split('-')[0]].join('-')) : null
    }
  }
};
</script>
