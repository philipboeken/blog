@extends('layouts.center')
@section('title') Alle berichten
@endsection

@section('content-mid')
<div class="columns">
    <aside class="column is-3 left-container">
        @include('components.posts-filter')
    </aside>
    <div class="column is-main-content">
        <div class="box add-button">
            <a class="is-centered" href="/posts/create">
                <div class="columns is-centered">
                    <div class="column is-narrow">
                        <div class="button is-white">
                            <span>Voeg een bericht toe</span>
                            <b-icon icon="plus"></b-icon>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @foreach($posts as $post)
        <div class="box">
            <a href="/posts/{{ $post->id }}"  class="has-text-textcolor">
                <h2 class="subtitle">
                    {{ $post->title }}
                </h2>
                <div class="media-content">
                    <hr class="postcard-hr">
                    <div class="content">
                        <vue-markdown>{{ str_limit($post->body, $limit = 330, $end = '...') }}</vue-markdown>
                    </div>
                    <div>
                        <strong>
                            {{ $post->user->first_name }} | {{ $post->created_at_formatted }}
                            @foreach($post->labels as $label)
                            <b-tag>
                                {{ $label->title }}
                            </b-tag>
                            @endforeach
                        </strong>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection