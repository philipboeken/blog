@extends('layouts.hasleftright')

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
    <div class="field has-addons">
        <div class="control">
            <div class="select">
                <select name="labelId">
                    <option disabled selected class="hidden"> ----</option>
                    @foreach($labels as $label)
                        <option value="{{ $label->id }}">@include('components.label', compact('label'))</option>
                    @endforeach
                </select>
            </div>
        </div>
        <p class="control">
            <a class="button is-static">
                <i class="fa fa-plus"></i>
            </a>
        </p>
    </div>
    <hr>
    <h3 class="subtitle">
        Contacts
    </h3>
    <div class="field has-addons">
        <div class="control">
            <div class="select">
                <select name="contactId">
                    <option disabled selected class="hidden"> ----</option>
                    @foreach($contacts as $contact)
                        <option value="{{ $contact->id }}">{{ $contact->name() }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <p class="control">
            <a class="button is-static">
                <i class="fa fa-plus"></i>
            </a>
        </p>
    </div>
    <hr>
    <h2 class="subtitle">
        Files
    </h2>
    <div class="field has-addons">
        <div class="control">
            <div class="select">
                <select name="fileId">
                    <option disabled selected class="hidden"> ----</option>
                    @foreach($files as $file)
                        <option value="{{ $file->id }}">{{ $file->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="control">
            <div class="file">
                <label class="file-label">
                    <input class="file-input" type="file" name="resume">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fa fa-upload"></i>
                        </span>
                        <span class="file-label"></span>
                    </span>
                </label>
            </div>
        </div>
    </div>
@endsection