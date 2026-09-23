@extends('layouts.app')

@section('title', $post['titulo'].' | coffee.dev')
@section('description', $post['headline'])

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
    <article class="article-page mx-auto max-w-4xl px-5 py-16 sm:px-8 lg:py-24">
        <a
            href="{{ route('blog.index') }}"
            class="line-hover inline-block font-mono text-[12px] uppercase tracking-[.15em] text-stone-400 hover:text-stone-100"
        >
            ← Voltar para os artigos
        </a>

        <x-eyebrow class="mt-14">
            <time datetime="{{ $post['data_iso'] }}">{{ $post['data'] }}</time>
        </x-eyebrow>

        <h1 class="mt-6 text-4xl font-extrabold leading-[1.02] tracking-[-0.045em] text-stone-100 sm:text-6xl">
            {{ $post['titulo'] }}
        </h1>

        <p class="mt-6 max-w-2xl text-lg leading-8 text-stone-400 sm:text-xl">{{ $post['headline'] }}</p>

        <x-post-cover
            :src="$post['capa']"
            class="mt-12 block max-h-[500px] w-full border border-stone-800 bg-coffee-900 object-cover"
            placeholder="flex min-h-[420px] items-center justify-center font-mono text-[12px] uppercase tracking-[.2em] text-stone-700"
        />

        <div class="mt-12 space-y-6 text-base leading-8 text-stone-300 sm:text-lg">
            @foreach (preg_split('/\n{2,}/', $post['conteudo'] ?: $post['headline']) as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach
        </div>

        <div class="mt-14 border border-stone-800 bg-coffee-900">
            <div class="flex items-center justify-between border-b border-stone-800 px-6 py-4">
                <span class="font-mono text-[11px] uppercase tracking-[.18em] text-stone-600">proximo_passo.md</span>
                <span class="font-mono text-[11px] text-stone-700">[→]</span>
            </div>

            <div class="flex flex-col gap-6 p-6 sm:flex-row sm:items-center sm:justify-between sm:p-8">
                <p class="text-xl font-bold tracking-tight text-stone-100">Tem um desafio digital para resolver?</p>

                <x-btn-primary :href="config('site.whatsapp')" external class="h-12 flex-none justify-center px-6">
                    Falar com especialista
                    <span class="ml-4" aria-hidden="true">↗</span>
                </x-btn-primary>
            </div>
        </div>

        <nav class="mt-12 grid gap-4 sm:grid-cols-2" aria-label="Navegação entre notícias">
            @if ($previous)
                <x-article-nav-card :post="$previous" label="Notícia anterior" direction="previous" />
            @endif

            @if ($next)
                <x-article-nav-card :post="$next" label="Próxima notícia" direction="next" />
            @endif
        </nav>
    </article>
@endsection
