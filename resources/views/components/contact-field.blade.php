{{-- Dark field with a gold bottom border on focus. See .contact-field in app.css. --}}
@props(['textarea' => false])

@php
    $base = 'w-full py-3 px-4 rounded-lg font-body-md text-body-md placeholder:text-outline contact-field';
@endphp

@if ($textarea)
    <textarea {{ $attributes->class($base) }}></textarea>
@else
    <input {{ $attributes->class($base)->merge(['type' => 'text']) }} />
@endif
