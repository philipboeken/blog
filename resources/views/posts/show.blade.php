@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('subtitle')
    Geschreven door:
    {{ $post->user->first_name }}
@endsection

@section('content')
    <div>
        {!! $post->text !!}
    </div>
    @foreach($post->comments as $comment)
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    {{ $comment->user->first_name }}
                </p>
            </header>
            <div class="card-content">
                <div class="content">
                    {!! $comment->body !!}
                    <time datetime="{{ $comment->created_at }}"></time>
                </div>
            </div>
        </div>
    @endforeach

    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                {{ $user->first_name }}
            </p>
        </header>
        <div class="card-content">
            <div class="content">
                <form method="POST" action="/posts/{{ $post->id }}/comment">
                    {{ csrf_field() }}
                    <textarea class="comment" title="comment" name="comment" id="comment"></textarea>
                    <button class="button">Send</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('right-container')
    @if($post->isMine())
        <h3 class="title is-4">
            Actions
        </h3>
        <span>
            <a :href="/posts/ + {{ $post->id }} + '/edit'">
                Bewerk
                <i class="fa fa-pencil"></i>
            </a>
        </span>
        <span>
            <a href="{{ '/posts/' . $post->id }}"
               onclick="event.preventDefault(); document.getElementById('destroy-form').submit();">
                Verwijder
                <i class="fa fa-times"></i>
            </a>
            <form id="destroy-form" action="{{ '/posts/' . $post->id }}" method="DELETE" style="display: none;">
                {{ csrf_field() }}
            </form>
        </span>
        <hr>
    @endif
    <h3 class="title is-4">
        Contacts
    </h3>
    @foreach($post->contacts as $contact)
        <div class="field is-horizontal">
            <div class="field-label">Naam</div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        {{ $contact->surname . ', ' . $contact->first_name }}
                    </div>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">Email</div>
            <div class="field-body">
                <div class="field">
                    <div class="control is-expanded has-icons-left">
                        {{ $contact->email }}
                    </div>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">{{ $contact->phonenumber1_description }}</div>
            <div class="field-body">
                <div class="field">
                    <div class="control is-expanded has-icons-left">
                        {{ $contact->phonenumber1 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">{{ $contact->phonenumber2_description }}</div>
            <div class="field-body">
                <div class="field">
                    <div class="control is-expanded has-icons-left">
                        {{ $contact->phonenumber2 }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <hr>
    <h3 class="title is-4">
        Files
    </h3>
@endsection