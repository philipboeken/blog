<template>
    <div>
        <b-datepicker
                v-model="date"
                :first-day-of-week="1"
                :placeholder="placeholder"
                :min-date="new Date(minDate)"
                :max-date="new Date(maxDate)">
        </b-datepicker>
        <input :name="name" hidden :value="date">
    </div>
</template>

<script>
export default {
  data() {
    return {
      date: this.value ? new Date(this.value) : null
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
  }
};
</script>
