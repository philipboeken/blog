<form method="GET" action="/posts">
    <h3 class="subtitle">
        Filter
    </h3>
    <div class="field">
        <label class="label">Auteurs</label>
        <div class="control">
            <multi-select :options="{{ $users }}"
                          placeholder="Kies auteurs"
                          form-name="filter_users"
                          label="first_name"
                          :value="{{ $filter_users }}"></multi-select>
        </div>
    </div>
    <div class="field">
        <label class="label">Label</label>
        <div class="control">
            <multi-select :options="{{ $labels }}"
                          placeholder="Kies labels"
                          form-name="filter_labels"
                          label="title"
                          :value="{{ $filter_labels }}"></multi-select>
        </div>
    </div>
    <div class="field">
        <label class="label">Vanaf</label>
        <div class="control">
            <datepicker name="filter_min_date" min-date="{{ $date_min }}" max-date="{{ $date_max }}"
                        placeholder="Kies een datum" value="{{ $filter_min_date }}"></datepicker>
        </div>
    </div>
    <div class="field">
        <label class="label">Tot</label>
        <div class="control">
            <datepicker name="filter_max_date" min-date="{{ $date_min }}" max-date="{{ $date_max }}"
                        placeholder="Kies een datum" value="{{ $filter_max_date }}"></datepicker>
        </div>
    </div>
    <button class="button is-info" type="send">Filter</button>
    <a class="button" href="/posts">Reset Filters</a>
</form>