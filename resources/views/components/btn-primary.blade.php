{{--
    Solid cream call to action. Renders an <a> when given an href, otherwise a
    <button>. Height and padding stay with the caller because they vary per
    placement; only the button identity lives here.
--}}
@props(['href' => null, 'external' => false])

@php
    $base = 'inline-flex items-center bg-amber-100 font-mono text-xs font-semibold uppercase tracking-[.12em] text-coffee-950 transition hover:bg-amber-200';
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
