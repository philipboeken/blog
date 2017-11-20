<div class="card">
    <div class="card-title">
        <p class="title">
            <a :href="'/posts/' + {{ $post->id }}">{{ $post->title }}</a>
            @if($post->isMine())
                <span class="is-pulled-right">
                    <a :href="'/posts/'+ {{ $post->id }}+'/edit'">
                        <i class="fa fa-pencil"></i>
                    </a>
                </span>
            @endif
        </p>
        <h2 class="subtitle">
            Door: {{ $user->first_name }}
            <div class="is-pulled-right">
                {{ $post->created_at }}
            </div>
        </h2>
        <div>
            @foreach($post->labels as $label)
                @include('components.label', compact('label'))
            @endforeach
        </div>
    </div>
    <div class="card-content">
        {!! $post->text !!}
    </div>
    <footer class="card-footer">
        <p class="card-footer-item">
      <span>
        <a :href="'/posts/' + {{ $post->id }}">Bekijk bericht</a>
      </span>
        </p>
    </footer>
</div>
