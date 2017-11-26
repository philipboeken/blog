@extends('layouts.left')

@section('title')
    All Posts
@endsection

@section('content-left')
    <form method="GET" action="/posts">
        <aside class="menu">
            <h3 class="subtitle">
                Filter
            </h3>
            <div class="field">
                <label class="label">Author</label>
                <div class="control">
                    <multi-select :options="{{ $users }}"
                                  placeholder="Authors"
                                  form-name="filter_users"
                                  label="first_name"
                                  :value="{{ $filter_users }}"></multi-select>
                </div>
            </div>
            <div class="field">
                <label class="label">Label</label>
                <div class="control">
                    <multi-select :options="{{ $labels }}"
                                  placeholder="Labels"
                                  form-name="filter_labels"
                                  label="title"
                                  :value="{{ $filter_labels }}"></multi-select>
                </div>
            </div>
            <div class="field">
                <label class="label">From</label>
                <div class="control">
                    <datepicker name="filter_min_date" min-date="{{ $date_min }}" max-date="{{ $date_max }}"
                                placeholder="Pick a date" value="{{ $filter_min_date }}"></datepicker>
                </div>
            </div>
            <div class="field">
                <label class="label">Till</label>
                <div class="control">
                    <datepicker name="filter_max_date" min-date="{{ $date_min }}" max-date="{{ $date_max }}"
                                placeholder="Pick a date"></datepicker>
                </div>
            </div>
            <button class="button is-info" type="send">Filter</button>
        </aside>
    </form>
@endsection

@section('content-mid')
    <div class="box is-info">
        <div class="columns is-centered">
            <div class="column is-narrow">
                <a class="is-centered" href="/posts/create">Schrijf je eigen bericht!</a>
            </div>
        </div>
    </div>
    @foreach($posts as $post)
        @include('posts.postcard', ['user' => $post->user, 'post' => $post])
    @endforeach
@endsection
