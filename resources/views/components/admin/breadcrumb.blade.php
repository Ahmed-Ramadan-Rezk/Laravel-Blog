@props(['heading', 'item' => false, 'activeItem' => false])

<div class="pagetitle">
    <h1>{{ $heading }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            @if ($item)
            <li class="breadcrumb-item">{{ $item }}</li>
            @endif
            <li class="breadcrumb-item active">{{ !$activeItem ? $heading : $activeItem }}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->