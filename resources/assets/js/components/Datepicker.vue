<template>
    <div>
        <b-datepicker
                v-model="date"
                :first-day-of-week="1"
                :placeholder="placeholder">
            <!--:min-date="toDate(minDate)"-->
            <!--:max-date="toDate(maxDate)">-->
        </b-datepicker>
        <input :name="name" hidden v-model="date">
    </div>
</template>

<script>
  export default {
    data() {
      return {
        date: new Date()
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
    methods: {
      toDate(date) {
        return Date(Date.format(date))
      }
    },
  };
</script>
<style>

</style>
