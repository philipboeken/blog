@extends('layouts.right')

@section('title')
    {{ $post->title }}
@endsection

@section('subtitle')
    <div class="is-pulled-right">
        <strong>
            {{ $post->user->first_name }} | {{ $post->created_at_formatted }}
        </strong>
    </div>
@endsection

@section('content-mid')
    {!! $post->body !!}
    <hr>
    @foreach($post->comments as $comment)
        <article class="media">
            <figure class="media-left">
                <p class="image is-64x64">
                    <img src="https://bulma.io/images/placeholders/128x128.png">
                </p>
            </figure>
            <div class="media-content">
                <div class="content">
                    <p>
                        <strong>{{ $comment->user->first_name }}</strong>
                        <br>
                        {!! $comment->body !!}
                        <br>
                        <small>{{ $comment->created_at }} @if($comment->created_at != $comment->updated_at)| Bewerkt: {{ $comment->updated_at }}@endif</small>
                    </p>
                </div>
            </div>
        </article>
    @endforeach

    <article class="media">
        <figure class="media-left">
            <p class="image is-64x64">
                <img src="https://bulma.io/images/placeholders/128x128.png">
            </p>
        </figure>
        <div class="media-content">
            <form method="POST" action="/posts/{{ $post->id }}/comment">
                {{ csrf_field() }}
                <div class="field">
                    <p class="control">
                        <textarea name="comment" class="textarea" placeholder="Add a comment..."></textarea>
                    </p>
                </div>
                <nav class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <button class="button is-info">Submit</button>
                        </div>
                    </div>
                </nav>
            </form>
        </div>
    </article>
@endsection

@section('content-right')
    @if($post->isMine())
        <h3 class="subtitle">
            Actions
        </h3>
        <a :href="/posts/ + {{ $post->id }} + '/edit'">
            Bewerk
            <i class="fas fa-pencil-alt"></i>
        </a>
        <a href="{{ '/posts/' . $post->id }}"
           onclick="event.preventDefault(); document.getElementById('destroy-form').submit();">
            Verwijder
            <i class="fas fa-times"></i>
        </a>
        <form id="destroy-form" action="/posts/{{ $post->id }}/delete" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        <hr>
    @endif
    <h3 class="subtitle">
        Labels
    </h3>
    @foreach($post->labels as $label)
        <b-tag style="background-color: {{ $label->color }}">
            {{ $label->title }}
        </b-tag>
    @endforeach
    <hr>
    <h3 class="subtitle">
        Contacts
    </h3>
    @foreach($post->contacts as $contact)
        <contact-button :contact="{{ $contact }}"></contact-button>
    @endforeach
    <hr>
    <h2 class="subtitle">
        Files
    </h2>
    @foreach($post->files as $file)
        <div class="field is-horizontal">
            <div class="field-label">Naam</div>
            <div class="field-body">
                <div class="control">
                    {{ $file->title }}
                </div>
            </div>
        </div>
    @endforeach
@endsection