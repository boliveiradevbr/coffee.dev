<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $posts = [
        [
            'title' => 'Por que código limpo importa mais do que você imagina',
            'date' => '12 Jan 2026',
            'excerpt' => 'Código limpo não é frescura. É performance, manutenção e escala.'
        ],
        [
            'title' => 'Stack moderna para SaaS em 2026',
            'date' => '05 Jan 2026',
            'excerpt' => 'Uma visão prática sobre stacks eficientes para produtos digitais.'
        ],
        [
            'title' => 'Lifestyle dev: produtividade, café e foco',
            'date' => '22 Dez 2025',
            'excerpt' => 'Como equilibrar código, rotina e criatividade no dia a dia.'
        ]
    ];
    return Inertia::render('Welcome', ['posts' => $posts]);
})->name('home');
