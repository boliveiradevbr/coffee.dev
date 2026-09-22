@props(['number', 'tags', 'title'])

<article {{ $attributes->class('service-row border-stone-800 py-10 lg:py-12') }}>
    <div class="grid gap-6 md:grid-cols-[70px_1fr_40px] md:items-start">
        <div class="service-index font-mono text-xs text-stone-600">{{ $number }}</div>

        <div>
            <div class="mb-3 font-mono text-[9px] uppercase tracking-[.2em] text-stone-600">{{ $tags }}</div>

            <h3 class="text-2xl font-bold tracking-tight text-stone-100">{{ $title }}</h3>

            <p class="mt-4 max-w-2xl text-sm leading-7 text-stone-500">{{ $slot }}</p>
        </div>

        <div class="service-arrow font-mono text-xl text-stone-600" aria-hidden="true">↗</div>
    </div>
</article>
