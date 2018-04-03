@extends('layouts.right')

@section('title')
    Verander een post!
@endsection

@section('form_start')
    <form method="POST">
    {{ csrf_field() }}
@endsection

@section('content-mid')
    <div class="field">
        <label class="label">Title</label>
        <div class="control">
            <input class="input" name="title" type="text" placeholder="Title input" value="{{ $post->title }}">
        </div>
    </div>
    <div class="field">
        <label class="label">Text</label>
        <div class="control">
            <input id="body" type="hidden" name="body" value="{{ $post->body }}">
            <trix-editor input="body"></trix-editor>
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
                          label="title"
                          :value="{{ $post->labels()->get() }}"></multi-select>
        </div>
    </div>
    <div class="field">
        <div class="control is-expanded">
            <label-modal></label-modal>
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
                          :custom-label="function(contact) { return contact.first_name + ' ' + contact.surname}"
                          :value="{{ $post->contacts()->get() }}"></multi-select>
        </div>
    </div>
    <div class="field">
        <div class="control is-expanded">
            <contact-modal></contact-modal>
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
                          label="title"
                          :value="{{ $post->files()->get() }}"></multi-select>
        </div>
    </div>
    <file-modal></file-modal>
@endsection

@section('form_end')
    </form>
@endsection