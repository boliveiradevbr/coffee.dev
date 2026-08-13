{{--
    Solid gold call to action. Renders an <a> when given an href, otherwise a
    <button>. Padding and layout utilities stay with the caller because they vary
    per placement; only the button identity lives here.

    rounded-lg resolves to 4px in this theme — the radius DESIGN.md specifies for
    buttons, and which the prototype's `rounded-DEFAULT` never emitted.
--}}
@props(['href' => null, 'external' => false])

@php
    $base = 'btn-primary font-label-caps text-label-caps rounded-lg font-bold';
@endphp

@if ($href)
    <a
        href="{{ $href }}"
        @if ($external) target="_blank" rel="noopener noreferrer" @endif
        {{ $attributes->class($base) }}
    >{{ $slot }}</a>
@else
    <button {{ $attributes->class($base)->merge(['type' => 'button']) }}>{{ $slot }}</button>
@endif
