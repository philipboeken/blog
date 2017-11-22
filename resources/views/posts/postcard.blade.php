<div class="box">
    <h1 class="title">
        <a :href="'/posts/' + {{ $post->id }}">{{ $post->title }}</a>
        @if($post->isMine())
            <span class="is-pulled-right">
                <a :href="'/posts/'+ {{ $post->id }}+'/edit'">
                    <i class="fa fa-pencil"></i>
                </a>
            </span>
        @endif
    </h1>

    <div class="media-content">
        @foreach($post->labels as $label)
            @include('components.label', compact('label'))
        @endforeach
        <div class="is-pulled-right">
            <strong>
            Door: {{ $user->first_name }} //
            {{ $post->created_at }}
            </strong>
        </div>
        <br>
        <div class="content">
            {!! $post->text !!}
        </div>
    </div>
    <p class="card-footer-item">
      <span>
        <a :href="'/posts/' + {{ $post->id }}">Bekijk bericht</a>
      </span>
    </p>
</div>
