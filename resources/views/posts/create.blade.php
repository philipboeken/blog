@extends('layouts.right')

@section('title')
    Schrijf je eigen bericht!
@endsection

@section('subtitle')
@endsection

@section('content-mid')
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

@section('content-right')
    <h3 class="subtitle">
        Labels
    </h3>
    <div class="field">
        <div class="control">
            <div class="select is-fullwidth">
                <select name="labelId">
                    <option disabled selected class="hidden"> ----</option>
                    @foreach($labels as $label)
                        <option value="{{ $label->id }}">@include('components.label', compact('label'))</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <hr>
    <h3 class="subtitle">
        Contacts
    </h3>
    <div class="field">
        <div class="control">
            <div class="select is-fullwidth">
                <select name="contactId">
                    <option disabled selected class="hidden"> ----</option>
                    @foreach($contacts as $contact)
                        <option value="{{ $contact->id }}">{{ $contact->name() }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <hr>
    <h2 class="subtitle">
        Files
    </h2>
    <div class="field">
        <div class="control">
            <div class="select is-fullwidth">
                <select name="fileId">
                    <option disabled selected class="hidden"> ----</option>
                    @foreach($files as $file)
                        <option value="{{ $file->id }}">{{ $file->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
@endsection