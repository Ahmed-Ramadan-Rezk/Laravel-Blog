@props(['name'])

@if (session()->has($name))
<div class="alert alert-success">{{ session($name) }}</div>
@endif