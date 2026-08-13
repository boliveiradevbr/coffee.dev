<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Number of posts shown in the home page teaser grid.
     */
    private const TEASER_COUNT = 3;

    public function __invoke(PostRepository $posts): View
    {
        return view('home', [
            'posts' => $posts->latest(self::TEASER_COUNT),
        ]);
    }
}
