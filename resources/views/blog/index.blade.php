@extends('layouts.app')

@section('title', 'Artigos | coffee.dev')
@section('description', 'Notícias e análises sobre tecnologia, produto e inteligência artificial pela coffee.dev.')

@push('head')
    <link rel="canonical" href="{{ route('blog.index') }}" />
@endpush

@section('content')
    <section class="border-b border-stone-800">
        <div class="mx-auto max-w-7xl px-5 py-20 sm:px-8 lg:py-28">
            <x-eyebrow>caderno técnico</x-eyebrow>

            <h1
                class="mt-6 max-w-4xl text-5xl font-extrabold leading-[.98] tracking-[-0.055em] text-stone-100 sm:text-7xl"
            >
                Ideias para construir o próximo.
            </h1>

            <p class="mt-8 max-w-2xl text-lg leading-8 text-stone-400">
                Acompanhe as notícias e os assuntos que estão movendo tecnologia, produto e inteligência artificial.
            </p>
        </div>
    </section>

    <section>
        <div class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:py-24">
            <div class="blog-list border-b border-stone-800">
                @forelse ($posts as $post)
                    <x-post-row :post="$post" />
                @empty
                    <p class="border-t border-stone-800 py-12 text-center font-mono text-xs text-stone-600">
                        Nenhuma notícia publicada por enquanto.
                    </p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
