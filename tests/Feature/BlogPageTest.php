<?php

declare(strict_types=1);

use App\Repositories\PostRepository;

function posts(): array
{
    return app(PostRepository::class)->all();
}

it('lists every post on the index', function () {
    $response = $this->get('/blog')
        ->assertOk()
        ->assertSee('Ideias para construir o próximo.', false)
        ->assertSee('class="blog-page"', false);

    foreach (posts() as $post) {
        $response->assertSee($post['titulo'], false);
    }

    expect(substr_count($response->getContent(), 'class="blog-card"'))->toBe(count(posts()));
});

it('shows the blog badge in the header of the editorial pages', function (string $path) {
    $this->get($path)->assertOk()->assertSee('inset-ring-gray-400/20', false);
})->with([
    '/blog',
    '/noticias/mercado-de-saas-no-brasil-projeta-crescimento-acelerado',
]);

it('renders an article by slug', function () {
    $post = posts()[0];

    $this->get(route('blog.show', $post['slug']))
        ->assertOk()
        ->assertSee($post['titulo'], false)
        ->assertSee($post['headline'], false)
        ->assertSee($post['conteudo'], false)
        ->assertSee('class="article-page"', false)
        ->assertSee('datetime="'.$post['data_iso'].'"', false);
});

it('derives previous and next from array order, not from the date', function () {
    $all = posts();
    $current = $all[5];

    $response = $this->get(route('blog.show', $current['slug']))->assertOk();

    $response->assertSee('Notícia anterior', false)
        ->assertSee(route('blog.show', $all[4]['slug']), false)
        ->assertSee('Próxima notícia', false)
        ->assertSee(route('blog.show', $all[6]['slug']), false);
});

it('omits the previous card on the first post and the next card on the last', function () {
    $all = posts();

    $this->get(route('blog.show', $all[0]['slug']))
        ->assertOk()
        ->assertDontSee('Notícia anterior', false)
        ->assertSee('Próxima notícia', false);

    $this->get(route('blog.show', $all[count($all) - 1]['slug']))
        ->assertOk()
        ->assertSee('Notícia anterior', false)
        ->assertDontSee('Próxima notícia', false);
});

it('returns the branded 404 page for an unknown slug', function () {
    $this->get('/noticias/slug-que-nao-existe')
        ->assertNotFound()
        ->assertSee('Página não encontrada.', false)
        ->assertSee('Erro 404', false)
        // Inherits the layout: header, footer and shader all present.
        ->assertSee('shader-canvas-ANIMATION_6', false)
        ->assertSee('Code. Coffee. Creativity.', false);
});

it('exposes canonical and Open Graph metadata on an article', function () {
    $post = posts()[0];

    $this->get(route('blog.show', $post['slug']))
        ->assertOk()
        ->assertSee('rel="canonical" href="'.route('blog.show', $post['slug']).'"', false)
        ->assertSee('property="og:title" content="'.$post['titulo'].'"', false)
        ->assertSee('property="og:image"', false);
});

it('falls back to a placeholder when a post has no cover', function () {
    $post = posts()[0];
    $post['capa'] = '';

    $markup = view('components.post-card', ['post' => $post])->render();

    expect($markup)
        ->toContain('blog-card__placeholder')
        ->toContain('Sem Imagem')
        ->not->toContain('<img');
});

it('renders the article cover and nav thumbnail placeholders when covers are missing', function () {
    $bare = ['slug' => 'x', 'capa' => '', 'titulo' => 'T', 'data' => '1 jan 2026', 'data_iso' => '2026-01-01'];

    expect(view('components.post-cover', [
        'src' => '',
        'placeholder' => 'article-cover__placeholder',
        'attributes' => new Illuminate\View\ComponentAttributeBag(['class' => 'article-cover']),
    ])->render())->toContain('article-cover__placeholder');

    expect(view('components.article-nav-card', [
        'post' => $bare,
        'label' => 'Notícia anterior',
        'icon' => 'arrow_upward',
    ])->render())
        ->toContain('article-navigation-placeholder')
        ->toContain('Sem imagem');
});

it('uses the same card markup on the home teaser and the blog index', function () {
    $post = app(PostRepository::class)->latest(1)[0];

    $home = $this->get('/')->getContent();
    $index = $this->get('/blog')->getContent();

    $card = fn (string $html) => substr($html, $start = strpos($html, '<a class="blog-card"'), strpos($html, '</a>', $start) - $start);

    expect($card($home))->toBe($card($index))
        ->and($card($home))->toContain($post['titulo']);
});
