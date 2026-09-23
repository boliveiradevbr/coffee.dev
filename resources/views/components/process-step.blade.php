{{-- One cell of the process grid. The icon slot takes a 24x24 stroke SVG. --}}
@props(['number', 'title'])

<article {{ $attributes->class('process-item border-stone-800 p-7') }}>
    <div class="flex items-center justify-between">
        <div
            class="process-icon flex h-12 w-12 items-center justify-center border border-stone-800 text-stone-500"
            aria-hidden="true"
        >
            {{ $icon }}
        </div>

        <span class="process-arrow font-mono text-sm text-stone-700" aria-hidden="true">↗</span>
    </div>

    <div class="mt-10">
        <div class="font-mono text-[11px] uppercase tracking-[.18em] text-stone-700">etapa / {{ $number }}</div>

        <h3 class="mt-3 text-lg font-semibold text-stone-100">{{ $title }}</h3>

        <p class="mt-4 text-sm leading-6 text-stone-500">{{ $slot }}</p>
    </div>
</article>
