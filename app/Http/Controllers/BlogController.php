<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Chip shown next to the wordmark on the editorial pages.
     */
    private const HEADER_BADGE = 'Blog';

    public function __construct(private readonly PostRepository $posts) {}

    public function index(): View
    {
        return view('blog.index', [
            'posts' => $this->posts->all(),
            'badge' => self::HEADER_BADGE,
        ]);
    }

    public function show(string $slug): View
    {
        $article = $this->posts->findWithNeighbours($slug);

        abort_if($article === null, 404);

        return view('blog.show', [...$article, 'badge' => self::HEADER_BADGE]);
    }
}
