<template>
    <div>
        <multiselect v-if="type === 'labels'" 
                     v-model="selectedValues"
                     :placeholder="placeholder"
                     :options="options"
                     :track-by="trackBy"
                     :multiple="true"
                     :hide-selected="true"
                     :searchable="true"
                     :custom-label="normalLabel"
                     selectLabel="">
          <template slot="tag" slot-scope="props">
            <b-tag :style="{'background-color': props.option.color}" closable @close="props.remove(props.option)">
              {{ props.option.title }}
            </b-tag>
          </template>
        </multiselect>
        <multiselect v-else-if="type === 'authors'"
                     v-model="selectedValues"
                     :placeholder="placeholder"
                     :options="options"
                     :track-by="trackBy"
                     :multiple="true"
                     :hide-selected="true"
                     :searchable="true"
                     :custom-label="normalLabel"
                     selectLabel="">
          <template slot="tag" slot-scope="props">
            <b-tag type="is-primary" closable @close="props.remove(props.option)">
              {{ props.option.first_name }}
            </b-tag>
          </template>
        </multiselect>
        <multiselect v-else-if="type === 'contacts'"
                     v-model="selectedValues"
                     :placeholder="placeholder"
                     :options="options"
                     :track-by="trackBy"
                     :multiple="true"
                     :hide-selected="true"
                     :searchable="true"
                     :custom-label="fullNameLabel"
                     selectLabel="">
          <template slot="tag" slot-scope="props">
            <b-tag type="is-primary" closable @close="props.remove(props.option)">
              {{ props.option.first_name + ' ' + props.option.surname }}
            </b-tag>
          </template>
        </multiselect>
        <input type="hidden" :name="formName" :value="values">
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect';

export default {
  components: { Multiselect },
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
      default: 'name'
    },
    type: {
      type: String,
      default: 'labels'
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
    },
    normalLabel(option) {
      return option[this.label];
    },
    fullNameLabel(option) {
      return option.first_name + ' ' + option.surname;
    }
  },
  computed: {
    values() {
      return this.selectedValues.map((val) => val[this.trackBy]);
    }
  }
};
</script>
