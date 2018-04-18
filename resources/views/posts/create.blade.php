@extends('layouts.right')

@section('title')
    Schrijf een nieuw bericht
@endsection

@section('subtitle')
@endsection

@section('form_start')
    <form method="POST" action="/posts/create">
    {{ csrf_field() }}
@endsection

@section('content-mid')
    <div class="field">
        <label class="label">Titel</label>
        <div class="control">
            <input class="input" id="title" name="title" type="text" placeholder="Titel input" required>
        </div>
    </div>
    <div class="field">
        <label class="label">Tekst</label>
        <div class="control">
            <input id="body" type="hidden" name="body" required>
            <trix-editor input="body"></trix-editor>
        </div>
    </div>
    <div class="field is-grouped">
        <div class="control">
            <button class="button">Verstuur</button>
        </div>
        <div class="control">
            <a class="button is-text" href="/posts">Annuleer</a>
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
                          placeholder="Kies labels"
                          form-name="labelIDs"
                          label="title"
                          type="labels"></multi-select>
        </div>
    </div>
    <div class="field">
        <div class="control is-expanded">
            <label-modal></label-modal>
        </div>
    </div>
    <hr>
    <h3 class="subtitle">
        Contacten
    </h3>
    <div class="field">
        <div class="control">
            <multi-select :options="{{ $contacts }}"
                          placeholder="Kies contacten"
                          form-name="contactIDs"
                          :custom-label="function(contact) { return contact.first_name + ' ' + contact.surname}"
                          type="contacts">
            </multi-select>
        </div>
    </div>
    <div class="field">
        <div class="control is-expanded">
            <contact-modal></contact-modal>
        </div>
    </div>
    <hr>
    <h2 class="subtitle">
        Bestanden
    </h2>
    <div class="field">
        <div class="control">
            <multi-select :options="{{ $files }}"
                          placeholder="Files"
                          form-name="fileIDs"
                          label="name"
                          type="labels"></multi-select>
        </div>
    </div>
    <div class="field">
        <div class="control is-expanded">
            <file-modal></file-modal>
        </div>
    </div>
@endsection

@section('form_end')
    </form>
@endsection
