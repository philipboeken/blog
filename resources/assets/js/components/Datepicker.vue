
<template>
    <div class="datePickerContainer">
        <Flatpickr :placeholder="placeholder" class="input" :name="name" :options="defaultConfig" @input="onInput"></Flatpickr>
        <a v-if="clearbutton" @click="clearDate" class="button is-small is-outlined"><span class="icon is-small"><i class="fa fa-times"></i></span></a>
    </div>
</template>

<script>
    import moment from 'moment';
    export default {
      props: {
        datePickerConfig: {
          type: Object,
          default: () => {
            return {
              dateFormat: 'Y-m-d',
              altInput: true,
              altFormat: 'd-m-Y'
            };
          }
        },
        value: {
          default: ''
        },
        clearbutton: {
          default: false
        },
        defaultDate: {
          type: String,
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
        }
      },
      computed: {
        defaultConfig () {
          const config = Object.assign({}, this.datePickerConfig);
          config.defaultDate = moment(this.defaultDate, 'YYYY-MM-DD').toDate();
          config.minDate = this.minDate;
          config.maxDate = this.maxDate;
          return config;
        }
      },
      methods: {
        onInput (value) {
          this.$emit('input', value);
        },
        clearDate () {
          this.$refs.FlatPickr.fp.clear();
        }
      },
      mounted () {
        if (this.value !== '') {
          this.$refs.FlatPickr.fp.setDate(this.value);
        }
      }
    };
</script>
