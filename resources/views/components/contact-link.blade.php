{{-- Channel name + address, as listed under "contato direto". --}}
@props(['href', 'channel', 'label', 'external' => false])

<a
    href="{{ $href }}"
    class="group flex items-baseline justify-between gap-6 border-b border-stone-800 py-3"
    @if ($external) target="_blank" rel="noopener noreferrer" @endif
>
    <span class="font-mono text-[11px] uppercase tracking-[.18em] text-stone-600">{{ $channel }}</span>
    <span class="line-hover font-mono text-xs text-stone-300 transition group-hover:text-amber-100">{{ $label }}</span>
</a>
