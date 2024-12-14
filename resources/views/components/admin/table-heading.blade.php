@props(['heading', 'route'])
<div class="d-flex justify-content-between">
    <x-admin.breadcrumb heading="{{ $heading }}" />

    <div>
        <a href="{{ $route }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i>
            {{ $slot }}
        </a>
    </div>
</div>