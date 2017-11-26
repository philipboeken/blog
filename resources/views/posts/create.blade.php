@extends('layouts.right')

@section('title')
    Schrijf je eigen bericht!
@endsection

@section('subtitle')
@endsection

@section('form_start')
    <form method="POST" action="/posts/create">
    {{ csrf_field() }}
@endsection

@section('content-mid')
    <div class="field">
        <label class="label">Title</label>
        <div class="control">
            <input class="input" id="title" name="title" type="text" placeholder="Title input" required>
        </div>
    </div>
    <div class="field">
        <label class="label">Text</label>
        <div class="control">
            <textarea class="textarea post" id="title" name="text" placeholder="Textarea" required></textarea>
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
@endsection

@section('content-right')
    <h3 class="subtitle">
        Labels
    </h3>
    <div class="field">
        <div class="control">
            <multi-select :options="{{ $labels }}"
                          placeholder="Labels"
                          form-name="labelIDs"
                          label="title"></multi-select>
        </div>
    </div>
    <hr>
    <h3 class="subtitle">
        Contacts
    </h3>
    <div class="field">
        <div class="control">
            <multi-select :options="{{ $contacts }}"
                          placeholder="Contacts"
                          form-name="contactIDs"
                          :custom-label="function(contact) { return contact.first_name + ' ' + contact.surname}"></multi-select>
        </div>
    </div>
    <hr>
    <h2 class="subtitle">
        Files
    </h2>
    <div class="field">
        <div class="control">
            <multi-select :options="{{ $files }}"
                          placeholder="Files"
                          form-name="fileIDs"
                          label="title"></multi-select>
        </div>
    </div>
@endsection

@section('form_end')
    </form>
@endsection
