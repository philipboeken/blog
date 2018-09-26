<div class="filter">
    <form method="GET" action="{{ route('posts') }}">
        <h3 class="subtitle">
            Filter
        </h3>
        <div class="field">
            <label class="label">Auteurs</label>
            <div class="control">
                <multi-select :options="{{ $users }}" placeholder="Kies auteurs" form-name="by" label="first_name" :value="{{ app('request')->input('by', json_encode([])) }}"
                    type="authors"></multi-select>
            </div>
        </div>
        <div class="field">
            <label class="label">Label</label>
            <div class="control">
                <multi-select :options="{{ $labels->toJson() }}" placeholder="Kies labels" form-name="labeled" label="title" :value="{{ app('request')->input('labels', json_encode([])) }}"
                    type="labels"></multi-select>
            </div>
        </div>
        <div class="field">
            <label class="label">Vanaf</label>
            <div class="control">
                <datepicker name="from"
                    min-date="{{ $minDate }}"
                    max-date="{{ $maxDate }}"
                    {{-- :value="{{ app('request')->input('from', json_encode('')) }}" --}}
                    placeholder="Kies een datum"></datepicker>
            </div>
        </div>
        <div class="field">
            <label class="label">Tot</label>
            <div class="control">
                <datepicker name="till"
                    min-date="{{ $minDate }}"
                    max-date="{{ $maxDate }}"
                    {{-- :value="{{ app('request')->input('till', json_encode(null)) }}" --}}
                    placeholder="Kies een datum"></datepicker>
            </div>
        </div>
        <button class="button is-info" type="send">Filter</button>
        <a class="button" href="/posts">Reset Filters</a>
    </form>
</div>