{{-- Previous/next card in the article footer. --}}
@props(['post', 'label', 'direction' => 'previous'])

<a
    @class([
        'article group flex flex-row-reverse items-center gap-5 border border-stone-800 p-5 text-right',
        'sm:col-start-2' => $direction === 'next',
    ])
    href="{{ route('blog.show', $post['slug']) }}"
>
    <x-post-cover
        :src="$post['capa']"
        class="h-16 w-16 flex-none border border-stone-800 bg-coffee-900 object-cover"
        placeholder="flex items-center justify-center font-mono text-[10px] uppercase tracking-[.1em] text-stone-700"
        label="Sem imagem"
        element="span"
        loading="lazy"
    />
    <span class="flex-1">
        <span class="mb-2 block font-mono text-[11px] uppercase tracking-[.18em] text-stone-600">{{ $label }}</span>
        <span class="article-title block text-base font-semibold text-stone-200">{{ $post['titulo'] }}</span>
    </span>
</a>
