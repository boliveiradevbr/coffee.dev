@extends('layouts.app')

@section('title', 'Blog | coffee.dev')
@section('description', 'Notícias e análises sobre tecnologia, produto e inteligência artificial pela coffee.dev.')
@section('main_class', 'blog-page')

@push('head')
    <link rel="canonical" href="{{ route('blog.index') }}" />
@endpush

@section('content')
    <span class="blog-eyebrow">Insights coffee.dev</span>
    <h1>Ideias para construir o próximo.</h1>
    <p class="blog-intro">
        Acompanhe as notícias e os assuntos que estão movendo tecnologia, produto e inteligência artificial.
    </p>
    <div class="blog-divider"></div>

    <section class="blog-grid">
        @forelse ($posts as $post)
            <x-post-card :post="$post" />
        @empty
            <p class="blog-status">Nenhuma notícia publicada por enquanto.</p>
        @endforelse
    </section>
@endsection
