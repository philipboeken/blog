@extends('layouts.hasleft')

@section('title')
    All Posts
@endsection

@section('content-left')
    <form method="GET" action="/posts">
        <h2 class="subtitle">
            Search
        </h2>
        <div class="field">
            <div class="control">
                <input class="input" name="search" type="text" placeholder="Voer hier uw zoekopdracht in" value="{{ old('search') }}">
            </div>
        </div>
        <hr>
        <h2 class="subtitle">
            Filter
        </h2>
        <div class="field">
            <label class="label">Author</label>
            <div class="control">
                <div class="select">
                    <select name="userId">
                        <option disabled selected class="hidden"> ----</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name() }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="field">
            <label class="label">Label</label>
            <div class="control">
                <div class="select">
                    <select name="labelId">
                        <option disabled selected class="hidden"> ----</option>
                        @foreach($labels as $label)
                            <option value="{{ $label->id }}">@include('components.label', compact('label'))</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="field">
            <label class="label">From</label>
            <div class="control">
                <datepicker name="date_min" min-date="{{ $date_min }}" max-date="{{ $date_max }}"
                            placeholder="Pick a date"></datepicker>
            </div>
        </div>
        <div class="field">
            <label class="label">Till</label>
            <div class="control">
                <datepicker name="date_max" min-date="{{ $date_min }}" max-date="{{ $date_max }}"
                            placeholder="Pick a date"></datepicker>
            </div>
        </div>
        <button class="button" type="send">Search</button>
    </form>
@endsection

@section('content-mid')
    <div class="columns is-centered">
        <div class="column is-narrow">
            <a class="is-centered" href="/posts/create">Schrijf je eigen bericht!</a>
        </div>
    </div>
    @foreach($posts as $post)
        @include('posts.postcard', ['user' => $post->user, 'post' => $post])
    @endforeach
@endsection
