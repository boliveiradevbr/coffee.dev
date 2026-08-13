{{-- 40x40 circular badge behind a contact icon. rounded-full is a true pill in this theme. --}}
<span {{ $attributes->class('w-10 h-10 rounded-full bg-surface-container flex items-center justify-center border border-white/5') }}>
    {{ $slot }}
</span>
