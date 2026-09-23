{{--
    Labelled field for the briefing form. focus:ring-0 cancels the blue focus
    ring that @tailwindcss/forms adds on top of the border change.
--}}
@props(['id', 'label', 'textarea' => false])

@php
    $base = 'w-full border border-stone-800 bg-coffee-950 font-mono text-xs text-stone-200 outline-none placeholder:text-stone-700 focus:border-stone-600 focus:ring-0';
@endphp

<div>
    <label for="{{ $id }}" class="mb-2 block font-mono text-[11px] uppercase tracking-[.16em] text-stone-600">
        {{ $label }}
    </label>

    @if ($textarea)
        <textarea id="{{ $id }}" {{ $attributes->class([$base, 'resize-none p-4 leading-6']) }}></textarea>
    @else
        <input id="{{ $id }}" {{ $attributes->class([$base, 'h-12 px-4'])->merge(['type' => 'text']) }} />
    @endif
</div>
