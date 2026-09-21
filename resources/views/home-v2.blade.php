```html
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>coffee.dev — Software feito com código limpo e café forte.</title>
    <meta
        name="description"
        content="Software sob medida, plataformas SaaS e integrações robustas para empresas que levam tecnologia a sério."
    />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                    colors: {
                        coffee: {
                            950: '#0B0807',
                            900: '#0F0C0B',
                            800: '#1C1512',
                            700: '#29201C',
                            600: '#451A03',
                            500: '#78350F',
                            400: '#92400E',
                        },
                        cream: '#FEF3C7',
                    },
                    letterSpacing: {
                        tighter2: '-0.055em',
                    }
                }
            }
        }
    </script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background: #0B0807;
            color: #F5F5F4;
        }

        ::selection {
            background: #FEF3C7;
            color: #0B0807;
        }

        .grid-bg {
            background-image:
                linear-gradient(rgba(120, 53, 15, 0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(120, 53, 15, 0.08) 1px, transparent 1px);
            background-size: 48px 48px;
        }

        .noise {
            position: relative;
        }

        .noise::after {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: .025;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.45'/%3E%3C/svg%3E");
        }

        .line-hover {
            position: relative;
        }

        .line-hover::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 100%;
            height: 1px;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform .35s ease;
            background: #FEF3C7;
        }

        .line-hover:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        .service-row {
            transition:
                background-color .3s ease,
                padding-left .3s ease;
        }

        .service-row:hover {
            background: rgba(120, 53, 15, .10);
            padding-left: 1rem;
        }

        .service-row:hover .service-index {
            color: #FEF3C7;
        }

        .service-row:hover .service-arrow {
            transform: translate(4px, -4px);
        }

        .service-arrow {
            transition: transform .3s ease;
        }

        .process-item {
            transition: background-color .3s ease;
        }

        .process-item:hover {
            background: rgba(120, 53, 15, .08);
        }

        .process-item:hover .process-number {
            color: #FEF3C7;
        }

        .article {
            transition:
                background-color .3s ease,
                transform .3s ease;
        }

        .article:hover {
            background: #120E0C;
            transform: translateY(-2px);
        }

        .article:hover .article-title {
            color: #FEF3C7;
        }

        .article-title {
            transition: color .3s ease;
        }

        .submit-button {
            transition:
                background-color .25s ease,
                color .25s ease,
                transform .25s ease;
        }

        .submit-button:hover {
            background: #FDE68A;
            color: #0B0807;
            transform: translateY(-1px);
        }

        .coffee-cursor {
            animation: pulseCoffee 2.5s ease-in-out infinite;
        }

        @keyframes pulseCoffee {
            0%, 100% {
                opacity: .5;
            }

            50% {
                opacity: 1;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body class="font-sans antialiased noise">

<!-- ========================================================= -->
<!-- HEADER -->
<!-- ========================================================= -->

<header class="border-b border-stone-800 bg-[#0B0807]/95 backdrop-blur-md">
    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-5 sm:px-8">

        <a href="#" class="group flex items-center gap-3">
            <div class="flex h-9 w-9 items-center justify-center border border-stone-700 font-mono text-sm text-amber-100 transition group-hover:border-amber-100">
                &lt;/
            </div>

            <div>
                <div class="text-[15px] font-bold tracking-tight text-stone-100">
                    coffee<span class="text-amber-200">.</span>dev
                </div>

                <div class="font-mono text-[9px] uppercase tracking-[.2em] text-stone-600">
                    software foundry
                </div>
            </div>
        </a>

        <nav class="hidden items-center gap-8 md:flex">
            <a href="#servicos" class="line-hover font-mono text-[11px] uppercase tracking-[.16em] text-stone-400 hover:text-stone-100">
                Serviços
            </a>

            <a href="#processo" class="line-hover font-mono text-[11px] uppercase tracking-[.16em] text-stone-400 hover:text-stone-100">
                Processo
            </a>

            <a href="#artigos" class="line-hover font-mono text-[11px] uppercase tracking-[.16em] text-stone-400 hover:text-stone-100">
                Artigos
            </a>

            <a
                href="#contato"
                class="border border-stone-700 px-4 py-2 font-mono text-[11px] uppercase tracking-[.12em] text-amber-100 transition hover:border-amber-100 hover:bg-amber-100 hover:text-[#0B0807]"
            >
                Vamos conversar
            </a>
        </nav>

        <button
            class="flex h-10 w-10 items-center justify-center border border-stone-800 md:hidden"
            aria-label="Abrir menu"
        >
            <span class="font-mono text-sm text-stone-300">☰</span>
        </button>
    </div>
</header>


<!-- ========================================================= -->
<!-- HERO -->
<!-- ========================================================= -->

<main>

<section class="relative overflow-hidden border-b border-stone-800">

    <div class="absolute inset-0 grid-bg"></div>

    <div class="relative mx-auto max-w-7xl px-5 py-24 sm:px-8 sm:py-32 lg:py-40">

        <div class="grid lg:grid-cols-[1fr_280px] lg:gap-16">

            <div>

                <div class="mb-8 flex items-center gap-3 font-mono text-[10px] uppercase tracking-[.22em] text-stone-500">
                    <span class="coffee-cursor h-1.5 w-1.5 bg-amber-200"></span>
                    engenharia de software independente
                </div>

                <h1 class="max-w-5xl text-5xl font-extrabold leading-[.98] tracking-tighter2 text-stone-100 sm:text-7xl lg:text-[88px]">
                    Software feito com
                    <span class="text-amber-100">código limpo</span>
                    e café forte.
                </h1>

                <div class="mt-10 grid max-w-4xl gap-8 md:grid-cols-[1fr_240px]">

                    <p class="max-w-2xl text-lg leading-8 text-stone-400 sm:text-xl">
                        Criamos produtos digitais para startups e empresas que
                        entendem que performance, experiência e arquitetura
                        sustentável não são detalhes.
                    </p>

                    <div class="border-l border-stone-800 pl-5 font-mono text-[10px] leading-6 text-stone-600">
                        <div>STACK / PHP · LARAVEL</div>
                        <div>FRONT / VUE · REACT</div>
                        <div>DATA / SQL · REDIS</div>
                        <div>INFRA / CLOUD · DOCKER</div>
                    </div>

                </div>

                <div class="mt-12 flex flex-col gap-3 sm:flex-row">

                    <a
                        href="#contato"
                        class="inline-flex h-12 items-center justify-center bg-amber-100 px-6 font-mono text-xs font-semibold uppercase tracking-[.12em] text-[#0B0807] transition hover:bg-amber-200"
                    >
                        Iniciar um projeto
                        <span class="ml-4">↗</span>
                    </a>

                    <a
                        href="#servicos"
                        class="inline-flex h-12 items-center justify-center border border-stone-700 px-6 font-mono text-xs uppercase tracking-[.12em] text-stone-300 transition hover:border-stone-500 hover:text-white"
                    >
                        Explorar capacidades
                    </a>

                </div>
            </div>

            <div class="mt-16 hidden lg:block">

                <div class="border border-stone-800 bg-[#0F0C0B]">

                    <div class="flex items-center justify-between border-b border-stone-800 px-4 py-3">
                        <span class="font-mono text-[9px] uppercase tracking-[.18em] text-stone-600">
                            /coffee.config
                        </span>

                        <span class="font-mono text-[9px] text-stone-700">
                            001
                        </span>
                    </div>

                    <div class="space-y-4 p-5 font-mono text-[10px] leading-5">

                        <div>
                            <span class="text-stone-600">const</span>
                            <span class="text-stone-300"> stack</span>
                            <span class="text-stone-600"> =</span>
                        </div>

                        <div class="pl-4 text-amber-200">
                            engineering
                        </div>

                        <div>
                            <span class="text-stone-600">const</span>
                            <span class="text-stone-300"> quality</span>
                            <span class="text-stone-600"> =</span>
                        </div>

                        <div class="pl-4 text-amber-200">
                            non_negotiable
                        </div>

                        <div>
                            <span class="text-stone-600">const</span>
                            <span class="text-stone-300"> coffee</span>
                            <span class="text-stone-600"> =</span>
                        </div>

                        <div class="pl-4 text-amber-200">
                            "strong"
                        </div>

                        <div class="pt-3 text-stone-700">
                            // ship with intention
                        </div>

                    </div>
                </div>

                <div class="mt-4 font-mono text-[9px] leading-5 text-stone-700">
                    BUILD WITH INTENTION.<br>
                    SHIP WITH CONFIDENCE.
                </div>

            </div>

        </div>
    </div>
</section>


<!-- ========================================================= -->
<!-- SERVICES -->
<!-- ========================================================= -->

<section id="servicos" class="border-b border-stone-800">

    <div class="mx-auto max-w-7xl px-5 sm:px-8">

        <div class="grid lg:grid-cols-[280px_1fr]">

            <div class="border-b border-stone-800 py-16 lg:border-b-0 lg:border-r lg:py-24 lg:pr-12">

                <div class="font-mono text-[10px] uppercase tracking-[.2em] text-amber-200">
                    01 / capacidades
                </div>

                <h2 class="mt-5 text-3xl font-bold tracking-tight text-stone-100">
                    Engenharia antes de decoração.
                </h2>

                <p class="mt-6 text-sm leading-7 text-stone-500">
                    Construímos software pensando no problema,
                    no negócio e no que acontece depois do lançamento.
                </p>

            </div>

            <div class="lg:pl-12">

                <article class="service-row border-b border-stone-800 py-10 lg:py-12">

                    <div class="grid gap-6 md:grid-cols-[70px_1fr_40px] md:items-start">

                        <div class="service-index font-mono text-xs text-stone-600">
                            01
                        </div>

                        <div>
                            <div class="mb-3 font-mono text-[9px] uppercase tracking-[.2em] text-stone-600">
                                arquitetura · performance · escala
                            </div>

                            <h3 class="text-2xl font-bold tracking-tight text-stone-100">
                                Software sob medida
                            </h3>

                            <p class="mt-4 max-w-2xl text-sm leading-7 text-stone-500">
                                Sistemas desenhados para a realidade do seu negócio,
                                com arquitetura sustentável, código legível e
                                capacidade para crescer sem transformar cada mudança
                                em uma operação de risco.
                            </p>
                        </div>

                        <div class="service-arrow font-mono text-xl text-stone-600">
                            ↗
                        </div>

                    </div>

                </article>


                <article class="service-row border-b border-stone-800 py-10 lg:py-12">

                    <div class="grid gap-6 md:grid-cols-[70px_1fr_40px] md:items-start">

                        <div class="service-index font-mono text-xs text-stone-600">
                            02
                        </div>

                        <div>
                            <div class="mb-3 font-mono text-[9px] uppercase tracking-[.2em] text-stone-600">
                                produto · MVP · crescimento
                            </div>

                            <h3 class="text-2xl font-bold tracking-tight text-stone-100">
                                SaaS &amp; Plataformas
                            </h3>

                            <p class="mt-4 max-w-2xl text-sm leading-7 text-stone-500">
                                Do primeiro MVP à operação em escala. Modelamos
                                produto, experiência e infraestrutura para que
                                decisões técnicas acompanhem a evolução do negócio.
                            </p>
                        </div>

                        <div class="service-arrow font-mono text-xl text-stone-600">
                            ↗
                        </div>

                    </div>

                </article>


                <article class="service-row py-10 lg:py-12">

                    <div class="grid gap-6 md:grid-cols-[70px_1fr_40px] md:items-start">

                        <div class="service-index font-mono text-xs text-stone-600">
                            03
                        </div>

                        <div>
                            <div class="mb-3 font-mono text-[9px] uppercase tracking-[.2em] text-stone-600">
                                APIs · segurança · automação
                            </div>

                            <h3 class="text-2xl font-bold tracking-tight text-stone-100">
                                APIs &amp; Integrações
                            </h3>

                            <p class="mt-4 max-w-2xl text-sm leading-7 text-stone-500">
                                Conectamos sistemas, dados e serviços externos
                                com APIs bem estruturadas, autenticação,
                                observabilidade e uma preocupação constante
                                com segurança.
                            </p>
                        </div>

                        <div class="service-arrow font-mono text-xl text-stone-600">
                            ↗
                        </div>

                    </div>

                </article>

            </div>
        </div>
    </div>
</section>


<!-- ========================================================= -->
<!-- PROCESS -->
<!-- ========================================================= -->

<section id="processo" class="border-b border-stone-800">

    <div class="mx-auto max-w-7xl px-5 py-20 sm:px-8 lg:py-28">

        <div class="mb-14 flex flex-col justify-between gap-6 md:flex-row md:items-end">

            <div>
                <div class="font-mono text-[10px] uppercase tracking-[.2em] text-amber-200">
                    02 / processo
                </div>

                <h2 class="mt-4 max-w-2xl text-4xl font-bold tracking-tighter text-stone-100 sm:text-5xl">
                    Menos improviso.
                    <br>
                    Mais engenharia.
                </h2>
            </div>

            <p class="max-w-sm text-sm leading-7 text-stone-500">
                Um processo enxuto para transformar uma ideia
                em software útil, sustentável e pronto para evoluir.
            </p>

        </div>


        <div class="grid border border-stone-800 md:grid-cols-4">

            <article class="process-item border-b border-stone-800 p-7 md:border-b-0 md:border-r">
                <div class="process-number font-mono text-4xl text-stone-700 transition">
                    01
                </div>

                <h3 class="mt-14 text-lg font-semibold text-stone-100">
                    Entendimento
                </h3>

                <p class="mt-4 text-sm leading-6 text-stone-500">
                    Entendemos o problema, usuários, contexto e objetivos antes de escrever código.
                </p>
            </article>

            <article class="process-item border-b border-stone-800 p-7 md:border-b-0 md:border-r">
                <div class="process-number font-mono text-4xl text-stone-700 transition">
                    02
                </div>

                <h3 class="mt-14 text-lg font-semibold text-stone-100">
                    Estratégia
                </h3>

                <p class="mt-4 text-sm leading-6 text-stone-500">
                    Definimos arquitetura, prioridades e um caminho técnico compatível com o produto.
                </p>
            </article>

            <article class="process-item border-b border-stone-800 p-7 md:border-b-0 md:border-r">
                <div class="process-number font-mono text-4xl text-stone-700 transition">
                    03
                </div>

                <h3 class="mt-14 text-lg font-semibold text-stone-100">
                    Construção
                </h3>

                <p class="mt-4 text-sm leading-6 text-stone-500">
                    Desenvolvemos em ciclos curtos, mantendo qualidade, clareza e feedback contínuo.
                </p>
            </article>

            <article class="process-item p-7">
                <div class="process-number font-mono text-4xl text-stone-700 transition">
                    04
                </div>

                <h3 class="mt-14 text-lg font-semibold text-stone-100">
                    Evolução
                </h3>

                <p class="mt-4 text-sm leading-6 text-stone-500">
                    Medimos, corrigimos e evoluímos o produto conforme novas necessidades aparecem.
                </p>
            </article>

        </div>

    </div>
</section>


<!-- ========================================================= -->
<!-- BLOG -->
<!-- ========================================================= -->

<section id="artigos" class="border-b border-stone-800">

    <div class="mx-auto max-w-7xl px-5 py-20 sm:px-8 lg:py-28">

        <div class="grid lg:grid-cols-[280px_1fr] lg:gap-16">

            <div>
                <div class="font-mono text-[10px] uppercase tracking-[.2em] text-amber-200">
                    03 / caderno técnico
                </div>

                <h2 class="mt-5 text-3xl font-bold tracking-tight text-stone-100">
                    Ideias que sobrevivem ao hype.
                </h2>

                <p class="mt-5 text-sm leading-7 text-stone-500">
                    Engenharia, produto e tecnologia sem transformar
                    cada novidade em uma solução procurando um problema.
                </p>

                <a
                    href="#"
                    class="line-hover mt-8 inline-block font-mono text-[10px] uppercase tracking-[.15em] text-stone-300"
                >
                    Ver todos os artigos →
                </a>
            </div>


            <div class="mt-12 lg:mt-0">

                <article class="article border-t border-stone-800 py-7">

                    <div class="grid gap-5 md:grid-cols-[110px_1fr_90px] md:items-start">

                        <time class="font-mono text-[10px] text-stone-600">
                            18.09.2026
                        </time>

                        <div>
                            <div class="mb-2 font-mono text-[9px] uppercase tracking-[.16em] text-stone-600">
                                IA GENERATIVA · ARQUITETURA
                            </div>

                            <h3 class="article-title text-xl font-semibold text-stone-200">
                                Padrões para integrar IA generativa sem transformar o produto em uma caixa-preta
                            </h3>

                            <p class="mt-3 max-w-2xl text-sm leading-6 text-stone-600">
                                Contexto, observabilidade e limites claros para sistemas
                                que incorporam modelos generativos.
                            </p>
                        </div>

                        <div class="font-mono text-[9px] text-stone-700 md:text-right">
                            07 MIN
                        </div>

                    </div>
                </article>


                <article class="article border-t border-stone-800 py-7">

                    <div class="grid gap-5 md:grid-cols-[110px_1fr_90px] md:items-start">

                        <time class="font-mono text-[10px] text-stone-600">
                            11.09.2026
                        </time>

                        <div>
                            <div class="mb-2 font-mono text-[9px] uppercase tracking-[.16em] text-stone-600">
                                SAAS · PRODUTO
                            </div>

                            <h3 class="article-title text-xl font-semibold text-stone-200">
                                O que muda tecnicamente quando um SaaS deixa de ser pequeno
                            </h3>

                            <p class="mt-3 max-w-2xl text-sm leading-6 text-stone-600">
                                Multi-tenancy, observabilidade, filas e decisões de
                                arquitetura que aparecem conforme o produto cresce.
                            </p>
                        </div>

                        <div class="font-mono text-[9px] text-stone-700 md:text-right">
                            09 MIN
                        </div>

                    </div>
                </article>


                <article class="article border-y border-stone-800 py-7">

                    <div class="grid gap-5 md:grid-cols-[110px_1fr_90px] md:items-start">

                        <time class="font-mono text-[10px] text-stone-600">
                            04.09.2026
                        </time>

                        <div>
                            <div class="mb-2 font-mono text-[9px] uppercase tracking-[.16em] text-stone-600">
                                GOVERNANÇA · ENGENHARIA
                            </div>

                            <h3 class="article-title text-xl font-semibold text-stone-200">
                                Dívida técnica: quando acelerar agora custa mais depois
                            </h3>

                            <p class="mt-3 max-w-2xl text-sm leading-6 text-stone-600">
                                Como identificar dívida técnica, comunicar seu impacto
                                e decidir quando vale a pena resolvê-la.
                            </p>
                        </div>

                        <div class="font-mono text-[9px] text-stone-700 md:text-right">
                            08 MIN
                        </div>

                    </div>
                </article>

            </div>
        </div>
    </div>
</section>


<!-- ========================================================= -->
<!-- CONTACT -->
<!-- ========================================================= -->

<section id="contato">

    <div class="mx-auto max-w-7xl px-5 py-20 sm:px-8 lg:py-32">

        <div class="grid gap-16 lg:grid-cols-[1fr_1.1fr] lg:gap-24">

            <div>

                <div class="font-mono text-[10px] uppercase tracking-[.2em] text-amber-200">
                    04 / contato
                </div>

                <h2 class="mt-6 max-w-xl text-5xl font-extrabold leading-[1] tracking-tighter text-stone-100 sm:text-6xl">
                    Tem um problema que precisa virar software?
                </h2>

                <p class="mt-7 max-w-lg text-base leading-8 text-stone-500">
                    Conte um pouco sobre o que você está construindo.
                    A primeira conversa serve para entender o contexto,
                    não para empurrar uma solução pronta.
                </p>


                <div class="mt-12 border-t border-stone-800 pt-7">

                    <div class="font-mono text-[9px] uppercase tracking-[.18em] text-stone-600">
                        contato direto
                    </div>

                    <a
                        href="mailto:hello@coffee.dev.br"
                        class="line-hover mt-3 inline-block text-lg text-amber-100"
                    >
                        hello@coffee.dev.br
                    </a>

                </div>

            </div>


            <form class="border border-stone-800 bg-[#0F0C0B]">

                <div class="border-b border-stone-800 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <span class="font-mono text-[9px] uppercase tracking-[.18em] text-stone-600">
                            novo_projeto.form
                        </span>

                        <span class="font-mono text-[9px] text-stone-700">
                            [04]
                        </span>
                    </div>
                </div>


                <div class="space-y-6 p-6 sm:p-8">

                    <div>
                        <label
                            for="nome"
                            class="mb-2 block font-mono text-[9px] uppercase tracking-[.16em] text-stone-600"
                        >
                            Seu nome
                        </label>

                        <input
                            id="nome"
                            type="text"
                            placeholder="Como podemos chamar você?"
                            class="h-12 w-full border border-stone-800 bg-[#0B0807] px-4 font-mono text-xs text-stone-200 outline-none placeholder:text-stone-700 focus:border-stone-600"
                        />
                    </div>


                    <div>
                        <label
                            for="email"
                            class="mb-2 block font-mono text-[9px] uppercase tracking-[.16em] text-stone-600"
                        >
                            E-mail
                        </label>

                        <input
                            id="email"
                            type="email"
                            placeholder="voce@empresa.com"
                            class="h-12 w-full border border-stone-800 bg-[#0B0807] px-4 font-mono text-xs text-stone-200 outline-none placeholder:text-stone-700 focus:border-stone-600"
                        />
                    </div>


                    <div>
                        <label
                            for="projeto"
                            class="mb-2 block font-mono text-[9px] uppercase tracking-[.16em] text-stone-600"
                        >
                            Sobre o projeto
                        </label>

                        <textarea
                            id="projeto"
                            rows="6"
                            placeholder="O que você está construindo? Qual problema precisa resolver?"
                            class="w-full resize-none border border-stone-800 bg-[#0B0807] p-4 font-mono text-xs leading-6 text-stone-200 outline-none placeholder:text-stone-700 focus:border-stone-600"
                        ></textarea>
                    </div>


                    <button
                        type="submit"
                        class="submit-button flex h-12 w-full items-center justify-between bg-amber-100 px-5 font-mono text-[10px] font-semibold uppercase tracking-[.14em] text-[#0B0807]"
                    >
                        <span>Enviar briefing</span>
                        <span>→</span>
                    </button>

                    <p class="font-mono text-[9px] leading-5 text-stone-700">
                        Ao enviar, você inicia uma conversa.
                        Sem spam. Sem pitch automático.
                    </p>

                </div>
            </form>

        </div>
    </div>
</section>

</main>


<!-- ========================================================= -->
<!-- FOOTER -->
<!-- ========================================================= -->

<footer class="border-t border-stone-800">

    <div class="mx-auto max-w-7xl px-5 py-8 sm:px-8">

        <div class="flex flex-col justify-between gap-6 md:flex-row md:items-center">

            <div>
                <div class="font-mono text-xs text-stone-500">
                    coffee<span class="text-amber-200">.</span>dev
                </div>

                <div class="mt-1 font-mono text-[9px] uppercase tracking-[.16em] text-stone-700">
                    software feito com código limpo e café forte.
                </div>
            </div>


            <div class="flex flex-wrap gap-6 font-mono text-[9px] uppercase tracking-[.15em] text-stone-600">

                <a href="#servicos" class="hover:text-stone-300">
                    Serviços
                </a>

                <a href="#processo" class="hover:text-stone-300">
                    Processo
                </a>

                <a href="#artigos" class="hover:text-stone-300">
                    Artigos
                </a>

                <a href="mailto:hello@coffee.dev.br" class="hover:text-stone-300">
                    E-mail
                </a>

            </div>


            <div class="font-mono text-[9px] text-stone-700">
                © 2026 coffee.dev
            </div>

        </div>

    </div>
</footer>

</body>
</html>
```
