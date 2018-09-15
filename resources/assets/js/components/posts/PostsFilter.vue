<template>
    <div class="filter">
        <h3 class="subtitle">
            Filter
        </h3>
        <div class="field">
            <label class="label">Auteurs</label>
            <div class="control">
                <multi-select :options="filter.users.options"
                            placeholder="Kies auteurs"
                            form-name="filter_users"
                            label="first_name"
                            :value="filter.users.value"
                            type="authors"></multi-select>
            </div>
        </div>
        <div class="field">
            <label class="label">Label</label>
            <div class="control">
                <multi-select :options="filter.labels.options"
                            placeholder="Kies labels"
                            form-name="filter_labels"
                            label="title"
                            :value="filter.labels.value"
                            type="labels"></multi-select>
            </div>
        </div>
        <div class="field">
            <label class="label">Vanaf</label>
            <div class="control">
                <datepicker name="filter_min_date" :min-date="filter.date_min.lower" :max-date="filter.date_min.upper"
                            placeholder="Kies een datum" :value="filter.date_min.value"></datepicker>
            </div>
        </div>
        <div class="field">
            <label class="label">Tot</label>
            <div class="control">
                <datepicker name="filter_max_date" :min-date="filter.date_max.lower" :max-date="filter.date_max.upper"
                            placeholder="Kies een datum" :value="filter.date_max.value"></datepicker>
            </div>
        </div>
        <button class="button is-info" type="send">Filter</button>
        <a class="button" href="/posts">Reset Filters</a>
    </div>
</template>
<script>
export default {
  props: {
      filter:{
          type: Object,
          default () { return {}; }
      }
  }
}
</script>
