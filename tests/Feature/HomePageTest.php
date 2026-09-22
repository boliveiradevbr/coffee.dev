<?php

declare(strict_types=1);

use App\Repositories\PostRepository;

it('renders the home page', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('coffee.dev — Software feito com código limpo e café forte.', false)
        ->assertSee('café forte.', false);
});

it('renders every section anchored by the navigation', function () {
    $response = $this->get('/');

    foreach (['id="servicos"', 'id="processo"', 'id="artigos"', 'id="contato"'] as $anchor) {
        $response->assertSee($anchor, false);
    }
});

it('renders both nav variants on every page', function (string $path) {
    $this->get($path)
        ->assertOk()
        ->assertSee('class="desktop-nav', false)
        ->assertSee('id="mobile-menu"', false);
})->with([
    '/',
    '/blog',
    '/blog/ia-generativa-e-o-novo-padrao-no-desenvolvimento-de-software',
]);

it('shows the three newest posts in the teaser list', function () {
    $expected = app(PostRepository::class)->latest(3);

    $response = $this->get('/');

    foreach ($expected as $post) {
        $response->assertSee($post['titulo'], false);
        $response->assertSee(route('blog.show', $post['slug']), false);
    }

    // The fourth post belongs to /blog only.
    $response->assertDontSee(app(PostRepository::class)->all()[3]['titulo'], false);
});

it('serves the logo locally instead of from googleusercontent', function () {
    $this->get('/')
        ->assertSee('/images/logo-40x40.png', false)
        ->assertDontSee('lh3.googleusercontent.com', false);
});

it('does not show the blog badge on the home header', function () {
    $this->get('/')->assertDontSee('site-badge', false);
});

it('points the primary buttons at the WhatsApp channel', function () {
    $this->get('/')->assertSee(config('site.whatsapp'), false);
});
