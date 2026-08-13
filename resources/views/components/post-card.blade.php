{{-- Shared verbatim by /blog and the home teaser grid so both read identically. --}}
@props(['post'])

<a class="blog-card" href="{{ route('blog.show', $post['slug']) }}">
    <x-post-cover
        :src="$post['capa']"
        class="blog-card__image"
        placeholder="blog-card__placeholder"
        loading="lazy"
    />
    <div class="blog-card__content">
        <time datetime="{{ $post['data_iso'] }}">{{ $post['data'] }}</time>
        <h2>{{ $post['titulo'] }}</h2>
        <p>{{ $post['headline'] }}</p>
        <span class="blog-read-more">
            LER NOTÍCIA
            <x-icon name="arrow_forward" />
        </span>
    </div>
</a>
