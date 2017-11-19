@extends('layouts.app')

@section('title')
    All Posts
@endsection

@section('left-container')
    <h1>
        Filters
    </h1>
@endsection

@section('content')
    <div class="columns is-centered">
        <div class="column is-narrow">
            <a class="is-centered" href="/posts/create">Schrijf je eigen bericht!</a>
        </div>
    </div>
    @foreach($posts as $post)
        @include('posts.postcard', ['user' => $post->user, 'post' => $post])
    @endforeach
@endsection
