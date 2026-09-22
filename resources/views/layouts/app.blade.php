<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>@yield('title', 'coffee.dev — Software feito com código limpo e café forte.')</title>
        <meta name="description" content="@yield('description', 'Software sob medida, plataformas SaaS e integrações robustas para empresas que levam tecnologia a sério.')" />
        <link rel="icon" href="/images/logo-40x40.png" type="image/png" />
        <link rel="apple-touch-icon" href="/images/logo-40x40.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&amp;family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap"
            rel="stylesheet"
        />
        @stack('head')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <x-site.header :badge="$badge ?? null" />

        <main class="@yield('main_class')">
            @yield('content')
        </main>

        <x-site.footer />
    </body>
</html>
