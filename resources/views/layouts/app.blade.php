<!doctype html>
<html class="dark scroll-smooth" lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>@yield('title', 'coffee.dev - Code. Coffee. Creativity.')</title>
        <meta name="description" content="@yield('description', 'Software sob medida para startups e empresas que valorizam tecnologia bem feita. Code. Coffee. Creativity.')" />
        <link rel="icon" href="/images/logo-40x40.png" type="image/png" />
        <link rel="apple-touch-icon" href="/images/logo-40x40.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=JetBrains+Mono:wght@500;700&amp;display=swap"
            rel="stylesheet"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
            rel="stylesheet"
        />
        @stack('head')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body
        class="bg-background text-on-surface font-body-md antialiased overflow-x-hidden relative selection:bg-primary-container selection:text-espresso-black"
    >
        <x-site.shader-background />

        <x-site.header :badge="$badge ?? null" />

        <main class="@yield('main_class')">
            @yield('content')
        </main>

        <x-site.footer />
    </body>
</html>
