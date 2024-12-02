@props(['field' => 'input'])

@if ($field === 'input')
<input {{ $attributes(['class'=> 'form-control']) }} />
@else
<textarea {{ $attributes->merge(['class'=> 'form-control', 'style' => 'height: 12rem']) }}></textarea>
@endif
