@extends('layouts.hasleftright')

@section('title')
    {{ $post->title }}
@endsection

@section('subtitle')
    Geschreven door:
    {{ $post->user->first_name }}
    <div class="is-pulled-right">
        {{ $post->created_at }}
    </div>
@endsection

@section('content-mid')
    <div>
        {!! $post->text !!}
    </div>
    @foreach($post->comments as $comment)
        <div class="card">
            <div class="card-content">
                <div class="content">
                    {{ $comment->user->first_name }}: {!! $comment->body !!}
                </div>
            </div>
        </div>
    @endforeach

    <div class="card">
        <div class="card-content">
            <div class="content">
                <form method="POST" action="/posts/{{ $post->id }}/comment">
                    {{ csrf_field() }}
                    {{ $user->first_name }}: <textarea class="comment" title="comment" name="comment" id="comment"></textarea>
                    <button class="button">Send</button>
                </form>
            </div>
        </div>
    </div>

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
            <div class="field-label is-normal">Naam</div>
            <div class="field-body">
                <div class="control">
                    {{ $contact->name() }}
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">Email</div>
            <div class="field-body">
                <div class="control">
                    {{ $contact->email }}
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">{{ $contact->phonenumber1_description }}</div>
            <div class="field-body">
                <div class="control">
                    {{ $contact->phonenumber1 }}
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">{{ $contact->phonenumber2_description }}</div>
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
@endsection