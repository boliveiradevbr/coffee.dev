{{-- Material Symbols Outlined ligature. Decorative by definition, so always hidden from assistive tech. --}}
@props(['name'])

<span aria-hidden="true" {{ $attributes->class('material-symbols-outlined') }}>{{ $name }}</span>
