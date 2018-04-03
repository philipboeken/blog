<template>
    <div>
        <multiselect v-if="customLabel"
                     :placeholder="placeholder"
                     :options="options"
                     :track-by="trackBy"
                     v-model="selectedValues"
                     :multiple="true"
                     :hide-selected="true"
                     :searchable="true"
                     :custom-label="customLabel"
                     selectLabel=""
        ></multiselect>
        <multiselect v-else
                     :placeholder="placeholder"
                     :options="options"
                     :label="label"
                     :track-by="trackBy"
                     v-model="selectedValues"
                     :multiple="true"
                     :hide-selected="true"
                     :searchable="true"
                     selectLabel=""
        ></multiselect>
        <input type="hidden" :name="formName" :value="values">
    </div>
</template>

<script>
  import Multiselect from 'vue-multiselect';

  export default {
    components: {Multiselect},
    data() {
      return {
        selectedValues: Object.keys(this.value).length > 0 ? this.ObjectToArray(this.value) : []
      }
    },
    props: {
      value: {
        type: Array,
        default() {
          return [];
        }
      },
      options: {
        type: Array
      },
      placeholder: {
        type: String
      },
      formName: {
        type: String
      },
      trackBy: {
        type: String,
        default: 'id'
      },
      label: {
        type: String,
      },
      customLabel: {
        type: Function,
        default: null
      }
    },
    methods: {
      ObjectToArray: function (obj) {
        let arr = [];
        for (let key in obj) {
          if (!obj.hasOwnProperty(key)) continue;
          arr.push(obj[key]);
        }
        return arr;
      }
    },
    computed: {
      values() {
        return this.selectedValues.map((val) => val[this.trackBy]);
      }
    }
  };
</script>
