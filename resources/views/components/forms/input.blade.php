@props(['field' => 'input'])

@if ($field === 'input')
<input {{ $attributes(['class'=> 'form-control']) }} />
@else
<textarea {{ $attributes(['class'=> 'form-control']) }}>{{ $slot }}</textarea>
@endif