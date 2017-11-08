@extends('layouts.app')

@section('title')
    All Posts
@endsection

@section('content')
    @foreach($posts as $post)
        <post-card :post="{{ $post }}"></post-card>

    @endforeach

@endsection