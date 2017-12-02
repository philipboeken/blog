@extends('layouts.right')

@section('title')
    {{ $post->title }}
@endsection

@section('subtitle')
    <div class="is-pulled-right">
        <strong>
            Door {{ $post->user->first_name }} op
            {{ $post->created_at->format('d-m-Y') }}
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
                        <small><a>Like</a> · <a>Reply</a> · 3 hrs</small>
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
            <i class="fa fa-pencil"></i>
        </a>
        <a href="{{ '/posts/' . $post->id }}"
           onclick="event.preventDefault(); document.getElementById('destroy-form').submit();">
            Verwijder
            <i class="fa fa-times"></i>
        </a>
        <form id="destroy-form" action="{{ '/posts/' . $post->id }}" method="DELETE" style="display: none;">
            {{ csrf_field() }}
        </form>
        <hr>
    @endif
    <h3 class="subtitle">
        Labels
    </h3>
    @foreach($post->labels as $label)
        @include('components.label', compact('label'))
    @endforeach
    <hr>
    <h3 class="subtitle">
        Contacts
    </h3>
    @foreach($post->contacts as $contact)
        <div class="field is-horizontal">
            <div class="field-label">Naam</div>
            <div class="field-body">
                <div class="control">
                    {{ $contact->name() }}
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label">Email</div>
            <div class="field-body">
                <div class="control">
                    {{ $contact->email }}
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label">{{ $contact->phonenumber1_description }}</div>
            <div class="field-body">
                <div class="control">
                    {{ $contact->phonenumber1 }}
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label">{{ $contact->phonenumber2_description }}</div>
            <div class="field-body">
                <div class="control">
                    {{ $contact->phonenumber2 }}
                </div>
            </div>
        </div>
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