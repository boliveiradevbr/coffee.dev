@extends('layouts.app')

@section('title', 'Página não encontrada | coffee.dev')
@section('description', 'O endereço que você acessou não existe ou a notícia foi removida.')

@section('content')
    <section class="mx-auto flex min-h-[70vh] max-w-7xl items-center px-5 py-24 sm:px-8">
        <div>
            <x-eyebrow>Erro 404</x-eyebrow>

            <h1
                class="mt-6 max-w-4xl text-5xl font-extrabold leading-[.98] tracking-[-0.055em] text-stone-100 sm:text-7xl"
            >
                Página não encontrada.
            </h1>

            <p class="mt-8 max-w-xl text-lg leading-8 text-stone-400">
                O endereço que você acessou não existe ou a notícia foi removida.
            </p>

            <x-btn-primary :href="route('home')" class="mt-12 h-12 justify-center px-6">
                <span class="mr-4" aria-hidden="true">←</span>
                Voltar para o início
            </x-btn-primary>
        </div>
    </section>
@endsection
