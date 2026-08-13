<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Support\Facades\File;
use RuntimeException;

/**
 * Reads the editorial content from resources/data/blog.json.
 *
 * The file is decoded at most once per request; the cache store is deliberately
 * not involved because CACHE_STORE=database would trade a 30KB local read for a
 * query, and the payload changes only on deploy.
 *
 * @phpstan-type Post array{slug: string, capa: string, data: string, data_iso: string, titulo: string, headline: string, conteudo: string}
 */
class PostRepository
{
    /** @var list<Post>|null */
    private ?array $posts = null;

    /**
     * Every post, in the order the JSON declares it.
     *
     * The order is authored, not chronological, and previous/next navigation
     * depends on it — do not sort by data_iso.
     *
     * @return list<Post>
     */
    public function all(): array
    {
        return $this->posts ??= File::json($this->path());
    }

    /**
     * The first $limit posts, used by the home page teaser grid.
     *
     * @return list<Post>
     */
    public function latest(int $limit): array
    {
        return array_slice($this->all(), 0, $limit);
    }

    /**
     * @return Post|null
     */
    public function find(string $slug): ?array
    {
        $index = $this->indexOf($slug);

        return $index === null ? null : $this->all()[$index];
    }

    /**
     * A post plus its neighbours in file order, for the article footer navigation.
     *
     * @return array{post: Post, previous: Post|null, next: Post|null}|null
     */
    public function findWithNeighbours(string $slug): ?array
    {
        $index = $this->indexOf($slug);

        if ($index === null) {
            return null;
        }

        $posts = $this->all();

        return [
            'post' => $posts[$index],
            'previous' => $index > 0 ? $posts[$index - 1] : null,
            'next' => $posts[$index + 1] ?? null,
        ];
    }

    private function indexOf(string $slug): ?int
    {
        $index = array_search($slug, array_column($this->all(), 'slug'), true);

        return $index === false ? null : $index;
    }

    private function path(): string
    {
        $path = resource_path('data/blog.json');

        if (! File::exists($path)) {
            throw new RuntimeException("Arquivo de posts não encontrado em [{$path}].");
        }

        return $path;
    }
}
