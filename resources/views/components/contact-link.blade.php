{{-- Icon badge + monospaced label, as used in the contact section. --}}
@props(['href', 'label', 'ariaLabel', 'external' => false])

<a
    aria-label="{{ $ariaLabel }}"
    class="flex items-center gap-4 text-on-surface-variant hover:text-primary transition-colors"
    href="{{ $href }}"
    @if ($external) target="_blank" rel="noopener noreferrer" @endif
>
    {{ $icon }}
    <span class="font-code-sm text-code-sm">{{ $label }}</span>
</a>
