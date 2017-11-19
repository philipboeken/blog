@extends('layouts.app')

@section('title')
    Schrijf je eigen bericht!
@endsection

@section('subtitle')
@endsection

@section('content')
    <form method="POST" action="/posts/create">
        {{ csrf_field() }}
            <div class="field">
                <label class="label">Title</label>
                <div class="control">
                    <input class="input" id="title" name="title" type="text" placeholder="Title input">
                </div>
            </div>
            <div class="field">
                <label class="label">Text</label>
                <div class="control">
                    <textarea class="textarea post" id="title" name="text" placeholder="Textarea"></textarea>
                </div>
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link">Submit</button>
                </div>
                <div class="control">
                    <a class="button is-text" href="/posts">Cancel</a>
                </div>
            </div>
    </form>
@endsection