@extends('layouts.left')

@section('title')
    Alle berichten
@endsection

@section('content-left')
    @include('components.filter')
@endsection

@section('content-mid')
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
        @include('posts.postcard', ['user' => $post->user, 'post' => $post])
    @endforeach
@endsection
