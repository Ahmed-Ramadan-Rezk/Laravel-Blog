@props(['name'])

@error($name)
<div class="text-danger small pt-2">{{ $message }}</div>
@enderror