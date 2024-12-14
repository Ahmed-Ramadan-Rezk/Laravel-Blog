@props(['action', 'class'])

<form action="{{ $action }}" method="POST">
    @csrf
    @method('DELETE')

    <button class="{{ $class }}" type="submit">{{ $slot }}</button>
</form>