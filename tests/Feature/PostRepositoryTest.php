<?php

declare(strict_types=1);

use App\Repositories\PostRepository;

beforeEach(function () {
    $this->posts = new PostRepository;
});

it('reads all posts from resources/data/blog.json', function () {
    $all = $this->posts->all();

    expect($all)->toHaveCount(20)
        ->and($all[0])->toHaveKeys(['slug', 'capa', 'data', 'data_iso', 'titulo', 'headline', 'conteudo']);
});

it('normalizes every record', function () {
    foreach ($this->posts->all() as $post) {
        expect($post['slug'])->toMatch('/^[a-z0-9-]+$/')
            ->and($post['data_iso'])->toMatch('/^\d{4}-\d{2}-\d{2}$/')
            ->and($post['titulo'])->not->toBeEmpty()
            ->and($post['conteudo'])->not->toBeEmpty();
    }
});

it('has unique slugs', function () {
    $slugs = array_column($this->posts->all(), 'slug');

    expect(array_unique($slugs))->toHaveCount(count($slugs));
});

it('appends resize parameters to the Unsplash covers', function () {
    foreach ($this->posts->all() as $post) {
        if (str_contains($post['capa'], 'images.unsplash.com')) {
            expect($post['capa'])->toContain('w=1200')->toContain('q=75');
        }
    }
});

it('limits the latest posts without reordering them', function () {
    expect($this->posts->latest(3))->toBe(array_slice($this->posts->all(), 0, 3));
});

it('finds a post by slug', function () {
    $expected = $this->posts->all()[7];

    expect($this->posts->find($expected['slug']))->toBe($expected);
});

it('returns null for an unknown slug', function () {
    expect($this->posts->find('nao-existe'))->toBeNull()
        ->and($this->posts->findWithNeighbours('nao-existe'))->toBeNull();
});

it('resolves neighbours by array position', function () {
    $all = $this->posts->all();

    expect($this->posts->findWithNeighbours($all[3]['slug']))->toBe([
        'post' => $all[3],
        'previous' => $all[2],
        'next' => $all[4],
    ]);
});

it('leaves previous null on the first post and next null on the last', function () {
    $all = $this->posts->all();
    $last = count($all) - 1;

    expect($this->posts->findWithNeighbours($all[0]['slug'])['previous'])->toBeNull()
        ->and($this->posts->findWithNeighbours($all[$last]['slug'])['next'])->toBeNull();
});

it('preserves the authored order rather than sorting by date', function () {
    $dates = array_column($this->posts->all(), 'data_iso');

    // Index 2 is deliberately newer than index 1; sorting would break prev/next.
    expect($dates[1])->toBe('2026-08-12')
        ->and($dates[2])->toBe('2026-08-13');
});

it('reads the file only once per instance', function () {
    $first = $this->posts->all();

    expect($this->posts->all())->toBe($first);
});
