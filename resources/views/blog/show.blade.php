@extends('layouts.app')

@section('title', $post['titulo'].' | coffee.dev')
@section('description', $post['headline'])
@section('main_class', 'article-page')

@push('head')
    <link rel="canonical" href="{{ route('blog.show', $post['slug']) }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $post['titulo'] }}" />
    <meta property="og:description" content="{{ $post['headline'] }}" />
    <meta property="og:url" content="{{ route('blog.show', $post['slug']) }}" />
    <meta property="article:published_time" content="{{ $post['data_iso'] }}" />
    @if (filled($post['capa']))
        <meta property="og:image" content="{{ $post['capa'] }}" />
    @endif
@endpush

@section('content')
    <a class="article-back" href="{{ route('blog.index') }}">
        <x-icon name="arrow_back" />
        Voltar para o blog
    </a>

    <article class="article-content-wrap">
        <time datetime="{{ $post['data_iso'] }}">{{ $post['data'] }}</time>
        <h1>{{ $post['titulo'] }}</h1>
        <p class="article-headline">{{ $post['headline'] }}</p>

        <x-post-cover
            :src="$post['capa']"
            class="article-cover"
            placeholder="article-cover__placeholder"
        />

        {{--
            The callout and the navigation live inside .article-body on purpose:
            they inherit its measure and typography, as in the prototype.
        --}}
        <div class="article-body">
            @foreach (preg_split('/\n{2,}/', $post['conteudo'] ?: $post['headline']) as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach

            <div class="article-callout">
                <p>Tem um desafio digital para resolver?</p>
                <x-btn-primary
                    :href="config('site.whatsapp')"
                    external
                    class="py-4 px-6 inline-flex items-center gap-2"
                >
                    <x-icon name="local_cafe" class="text-lg" />
                    Falar com especialista
                </x-btn-primary>
            </div>

            <nav class="article-navigation" aria-label="Navegação entre notícias">
                @if ($previous)
                    <x-article-nav-card :post="$previous" label="Notícia anterior" icon="arrow_upward" />
                @endif

                @if ($next)
                    <x-article-nav-card :post="$next" label="Próxima notícia" icon="arrow_downward" />
                @endif
            </nav>
        </div>
    </article>
@endsection
