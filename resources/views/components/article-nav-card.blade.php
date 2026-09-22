{{-- Previous/next card in the article footer. --}}
@props(['post', 'label', 'arrow'])

<a
    class="article group flex items-center justify-between gap-5 border border-stone-800 p-5"
    href="{{ route('blog.show', $post['slug']) }}"
>
    <x-post-cover
        :src="$post['capa']"
        class="h-16 w-16 flex-none border border-stone-800 bg-coffee-900 object-cover"
        placeholder="flex items-center justify-center font-mono text-[8px] uppercase tracking-[.1em] text-stone-700"
        label="Sem imagem"
        element="span"
        loading="lazy"
    />
    <span class="flex-1">
        <span class="mb-2 block font-mono text-[9px] uppercase tracking-[.18em] text-stone-600">{{ $label }}</span>
        <span class="article-title block text-base font-semibold text-stone-200">{{ $post['titulo'] }}</span>
    </span>
    <span class="font-mono text-sm text-stone-600 group-hover:text-amber-100" aria-hidden="true">{{ $arrow }}</span>
</a>
