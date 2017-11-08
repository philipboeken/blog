@extends('layouts.app')

@section('title')
    Create Timeline
@endsection

@section('content')
    <div class="container">
        Create a new Timeline
    </div>
    <div class="container">
        <form method="POST">
            {{ csrf_field() }}
            <label for="title">Title</label>
            <input name="title">
            <label for="description">Description</label>
            <input name="description">
            <button class="button submit" type="submit">Submit</button>
        </form>
    </div>
@endsection