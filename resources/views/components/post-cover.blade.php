{{--
    A post cover, or the "Sem Imagem" plate when `capa` is empty. Used at three
    scales — card, article cover and 64px navigation thumbnail — which differ only
    in the classes and the element the placeholder renders as.
--}}
@props([
    'src' => null,
    'placeholder' => '',
    'label' => 'Sem Imagem',
    'element' => 'div',
])

@if (filled($src))
    <img src="{{ $src }}" alt="" {{ $attributes }} />
@else
    <{{ $element }} {{ $attributes->class($placeholder) }}>{{ $label }}</{{ $element }}>
@endif
