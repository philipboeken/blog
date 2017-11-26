<div class="box">
    <h1 class="title">
        <a :href="'/posts/' + {{ $post->id }}">{{ $post->title }}</a>
    </h1>

    <div class="media-content">
        @foreach($post->labels as $label)
            @include('components.label', compact('label'))
        @endforeach
        <div class="is-pulled-right">
            <strong>
            Door {{ $user->first_name }} op
            {{ $post->created_at->format('d-m-Y') }}
            </strong>
        </div>
        <br>
        <hr>
        <div class="content is-ellipsis-4">
            {!! $post->text !!}
        </div>
    </div>
    <p class="card-footer-item">
        <a :href="'/posts/' + {{ $post->id }}">Bekijk bericht</a>
    </p>
</div>
