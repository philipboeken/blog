<div class="box">
    <a :href="'/posts/' + {{ $post->id }}" class="has-text-textcolor">
    <h2 class="subtitle">
        {{ $post->title }}
    </h2>
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
        <hr class="postcard-hr">
        <div class="content is-ellipsis-4">
            {!! $post->body !!}
        </div>
    </div>
</a>
</div>
