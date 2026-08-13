{{-- Previous/next card in the article footer. --}}
@props(['post', 'label', 'icon'])

<a class="article-navigation-card" href="{{ route('blog.show', $post['slug']) }}">
    <x-post-cover
        :src="$post['capa']"
        class="article-navigation-thumb"
        placeholder="article-navigation-placeholder"
        label="Sem imagem"
        element="span"
        loading="lazy"
    />
    <span>
        <span class="article-navigation-label">{{ $label }}</span>
        <span class="article-navigation-title">{{ $post['titulo'] }}</span>
    </span>
    <x-icon :name="$icon" class="text-primary-container" />
</a>
