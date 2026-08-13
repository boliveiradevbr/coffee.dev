@extends('layouts.app')

@section('title', 'Página não encontrada | coffee.dev')
@section('description', 'O endereço que você acessou não existe ou a notícia foi removida.')
@section('main_class', 'article-page min-h-[75vh] flex items-center justify-center text-center')

@section('content')
    <div class="max-w-2xl mx-auto">
        <span class="blog-eyebrow">Erro 404</span>
        <h1>Página não encontrada.</h1>
        <p class="blog-intro mx-auto mb-10">
            O endereço que você acessou não existe ou a notícia foi removida.
        </p>
        <x-btn-primary :href="route('home')" class="px-8 py-4 inline-flex items-center gap-2">
            <x-icon name="home" class="text-lg" />
            Voltar para o início
        </x-btn-primary>
    </div>
@endsection
