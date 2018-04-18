<div class="box">
    <a :href="'/posts/' + {{ $post->id }}" class="has-text-textcolor">
    <h2 class="subtitle">
        {{ $post->title }}
    </h2>
    <div class="media-content">
        <hr class="postcard-hr">
        <div class="content is-ellipsis-4">
            {!! $post->body !!}
        </div>
        <div>
            <strong>
                {{ $user->first_name }} | {{ $post->created_at_formatted }}
                @if($post->labels->isNotEmpty())
                     | 
                    @foreach($post->labels as $label)
                        <b-tag style="background-color: {{ $label->color }}">
                            {{ $label->title }}
                        </b-tag>
                    @endforeach
                @endif
            </strong>
        </div>
    </div>
</a>
</div>
