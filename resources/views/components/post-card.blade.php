<!-- Post preview-->
@foreach ($posts as $post)

<div class="post-preview">
    <a href="{{ url('posts/' . $post->id) }}">
        <h2 class="post-title">{{ $post->title }}</h2>
        <h3 class="post-subtitle">{{ \Str::limit($post->content) }}</h3>
    </a>
    <p class="post-meta">
        Posted by
        <a href="#!">{{ $post->user->name }}</a>
        on {{ $post->created_at->format('F d, Y') }}
    </p>
</div>
<!-- Divider-->
<hr class="my-4" />

@endforeach

{{ $posts->links() }}