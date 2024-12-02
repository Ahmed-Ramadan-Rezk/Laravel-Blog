<p class="small text-muted">
    {{ $description ?? '' }}
    <a {{ $attributes(['class'=> 'text-decoration-underline' ]) }}>{{ $slot }}</a>
</p>