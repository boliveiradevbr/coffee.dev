@extends('layouts.app')

@section('content')
    {{-- Hero --}}
    <section class="relative overflow-hidden border-b border-stone-800">
        <div class="coffee-smoke" aria-hidden="true">
            <svg class="coffee-smoke-svg" viewBox="0 0 900 700" preserveAspectRatio="xMidYMid slice">
                <defs>
                    <filter id="smokeBlur">
                        <feGaussianBlur stdDeviation="18" />
                    </filter>

                    <filter id="smokeBlurSoft">
                        <feGaussianBlur stdDeviation="32" />
                    </filter>

                    <radialGradient id="smokeGradient">
                        <stop offset="0%" stop-color="#FDE68A" stop-opacity=".30" />
                        <stop offset="35%" stop-color="#92400E" stop-opacity=".18" />
                        <stop offset="75%" stop-color="#78350F" stop-opacity=".06" />
                        <stop offset="100%" stop-color="#78350F" stop-opacity="0" />
                    </radialGradient>
                </defs>

                <g class="smoke-cloud smoke-cloud-1" filter="url(#smokeBlur)">
                    <path d="M420 690 C350 620 470 570 400 500 C330 430 470 380 410 310 C350 240 470 180 420 70"
                        fill="none" stroke="url(#smokeGradient)" stroke-width="115" stroke-linecap="round" />
                </g>

                <g class="smoke-cloud smoke-cloud-2" filter="url(#smokeBlurSoft)">
                    <path d="M500 700 C590 620 470 570 540 490 C610 410 480 350 550 270 C620 190 520 120 580 20"
                        fill="none" stroke="url(#smokeGradient)" stroke-width="90" stroke-linecap="round" />
                </g>

                <g class="smoke-cloud smoke-cloud-3" filter="url(#smokeBlur)">
                    <path d="M330 700 C250 630 350 570 280 500 C210 430 330 350 270 280 C220 220 290 140 250 60"
                        fill="none" stroke="url(#smokeGradient)" stroke-width="75" stroke-linecap="round" />
                </g>
            </svg>

            <div class="coffee-smoke-vignette"></div>
        </div>

        <div class="pointer-events-none absolute left-1/2 top-0 h-full w-px bg-linear-to-b from-transparent via-stone-800/40 to-transparent"
            aria-hidden="true"></div>

        <div class="relative mx-auto max-w-7xl px-5 py-24 sm:px-8 sm:py-32 lg:py-40">
            <div class="grid lg:grid-cols-[1fr_280px] lg:gap-16">
                <div>
                    <div
                        class="mb-8 flex items-center gap-3 font-mono text-[12px] uppercase tracking-[.22em] text-stone-500">
                        <span class="coffee-cursor h-1.5 w-1.5 bg-amber-200"></span>
                        engenharia de software independente
                    </div>

                    <h1
                        class="max-w-5xl text-5xl font-extrabold leading-[.98] tracking-[-0.055em] text-stone-100 sm:text-7xl lg:text-[88px]">
                        Software feito com
                        <span class="text-amber-100">código limpo</span>
                        e café forte.
                    </h1>

                    <div class="mt-10 grid max-w-4xl gap-8 md:grid-cols-[1fr_240px]">
                        <p class="max-w-2xl text-lg leading-8 text-stone-400 sm:text-xl">
                            Criamos produtos digitais para startups e empresas que entendem que performance,
                            experiência e arquitetura sustentável não são detalhes.
                        </p>

                        <div class="border-l border-stone-800 pl-5 font-mono text-[12px] leading-6 text-stone-600">
                            <div>STACK / PHP · LARAVEL</div>
                            <div>FRONT / VUE · REACT</div>
                            <div>DATA / SQL · REDIS</div>
                            <div>INFRA / CLOUD · DOCKER</div>
                        </div>
                    </div>

                    <div class="mt-12 flex flex-col gap-3 sm:flex-row">
                        <x-btn-primary href="https://wa.me/5518936191084?text=Olá,+gostaria+de+tirar+meu+projeto+do+papel:" class="h-12 justify-center px-6" external="true">
                            Quero iniciar um projeto
                            <span class="ml-4" aria-hidden="true">↗</span>
                        </x-btn-primary>

                        <a href="#servicos"
                            class="inline-flex h-12 items-center justify-center border border-stone-700 px-6 font-mono text-xs uppercase tracking-[.12em] text-stone-300 transition hover:border-stone-500 hover:text-white">
                            Explorar serviços
                        </a>
                    </div>
                </div>

                <div class="mt-16 hidden lg:block" aria-hidden="true">
                    <div class="border border-stone-800 bg-coffee-900/80 backdrop-blur-sm">
                        <div class="flex items-center justify-between border-b border-stone-800 px-4 py-3">
                            <span class="font-mono text-[11px] uppercase tracking-[.18em] text-stone-600">
                                /coffee.config
                            </span>
                            <span class="font-mono text-[11px] text-stone-700">001</span>
                        </div>

                        <div class="space-y-4 p-5 font-mono text-[12px] leading-5">
                            <div>
                                <span class="text-stone-600">const</span>
                                <span class="text-stone-300"> stack</span>
                                <span class="text-stone-600"> =</span>
                            </div>
                            <div class="pl-4 text-amber-200">engineering</div>

                            <div>
                                <span class="text-stone-600">const</span>
                                <span class="text-stone-300"> quality</span>
                                <span class="text-stone-600"> =</span>
                            </div>
                            <div class="pl-4 text-amber-200">non_negotiable</div>

                            <div>
                                <span class="text-stone-600">const</span>
                                <span class="text-stone-300"> coffee</span>
                                <span class="text-stone-600"> =</span>
                            </div>
                            <div class="pl-4 text-amber-200">"strong"</div>

                            <div class="pt-3 text-stone-700">// ship with intention</div>
                        </div>
                    </div>

                    <div class="mt-4 font-mono text-[11px] leading-5 text-stone-700">
                        BUILD WITH INTENTION.<br />
                        SHIP WITH CONFIDENCE.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Services --}}
    <section id="servicos" class="border-b border-stone-800">
        <div class="mx-auto max-w-7xl px-5 sm:px-8">
            <div class="grid lg:grid-cols-[280px_1fr]">
                <div class="border-b border-stone-800 py-16 lg:border-b-0 lg:border-r lg:py-24 lg:pr-12">
                    <x-eyebrow>01 / capacidades</x-eyebrow>

                    <h2 class="mt-5 text-3xl font-bold tracking-tight text-stone-100">Engenharia antes de decoração.</h2>

                    <p class="mt-6 text-sm leading-7 text-stone-500">
                        Construímos software pensando no problema, no negócio e no que acontece depois do lançamento.
                    </p>
                </div>

                <div class="lg:pl-12">
                    <x-service-row number="01" tags="arquitetura · performance · escala" title="Software sob medida"
                        class="border-b">
                        Sistemas desenhados para a realidade do seu negócio, com arquitetura sustentável, código
                        legível e capacidade para crescer sem transformar cada mudança em uma operação de risco.
                    </x-service-row>

                    <x-service-row number="02" tags="produto · MVP · crescimento" title="SaaS & Plataformas"
                        class="border-b">
                        Do primeiro MVP à operação em escala. Modelamos produto, experiência e infraestrutura para que
                        decisões técnicas acompanhem a evolução do negócio.
                    </x-service-row>

                    <x-service-row number="03" tags="APIs · segurança · automação" title="APIs & Integrações">
                        Conectamos sistemas, dados e serviços externos com APIs bem estruturadas, autenticação,
                        observabilidade e uma preocupação constante com segurança.
                    </x-service-row>
                </div>
            </div>
        </div>
    </section>

    {{-- Process --}}
    <section id="processo" class="border-b border-stone-800">
        <div class="mx-auto max-w-7xl px-5 py-20 sm:px-8 lg:py-28">
            <div class="mb-14 flex flex-col justify-between gap-6 md:flex-row md:items-end">
                <div>
                    <x-eyebrow>02 / processo</x-eyebrow>

                    <h2 class="mt-4 max-w-2xl text-4xl font-bold tracking-tighter text-stone-100 sm:text-5xl">
                        Menos improviso.
                        <br />
                        Mais engenharia.
                    </h2>
                </div>

                <p class="max-w-sm text-sm leading-7 text-stone-500">
                    Um processo enxuto para transformar uma ideia em software útil, sustentável e pronto para evoluir.
                </p>
            </div>

            <div class="grid border border-stone-800 md:grid-cols-4">
                <x-process-step number="01" title="Entendimento" class="border-b md:border-b-0 md:border-r">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            class="h-5 w-5">
                            <circle cx="11" cy="11" r="6.5" />
                            <path d="m16 16 4 4" />
                            <path d="M8.5 11h5" />
                            <path d="M11 8.5v5" />
                        </svg>
                    </x-slot:icon>
                    Entendemos o problema, usuários, contexto e objetivos antes de escrever código.
                </x-process-step>

                <x-process-step number="02" title="Estratégia" class="border-b md:border-b-0 md:border-r">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            class="h-5 w-5">
                            <circle cx="12" cy="12" r="8" />
                            <path d="m15.5 8.5-2.1 4.9-4.9 2.1 2.1-4.9z" />
                        </svg>
                    </x-slot:icon>
                    Definimos arquitetura, prioridades e um caminho técnico compatível com o produto.
                </x-process-step>

                <x-process-step number="03" title="Construção" class="border-b md:border-b-0 md:border-r">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            class="h-5 w-5">
                            <path d="m8 8-4 4 4 4" />
                            <path d="m16 8 4 4-4 4" />
                            <path d="m14 5-4 14" />
                        </svg>
                    </x-slot:icon>
                    Desenvolvemos em ciclos curtos, mantendo qualidade, clareza e feedback contínuo.
                </x-process-step>

                <x-process-step number="04" title="Evolução">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            class="h-5 w-5">
                            <path d="M4 17 9 12l4 3 7-8" />
                            <path d="M16 7h4v4" />
                        </svg>
                    </x-slot:icon>
                    Medimos, corrigimos e evoluímos o produto conforme novas necessidades aparecem.
                </x-process-step>
            </div>
        </div>
    </section>

    {{-- Articles --}}
    <section id="artigos" class="border-b border-stone-800">
        <div class="mx-auto max-w-7xl px-5 py-20 sm:px-8 lg:py-28">
            <div class="grid lg:grid-cols-[280px_1fr] lg:gap-16">
                <div>
                    <x-eyebrow>03 / caderno técnico</x-eyebrow>

                    <h2 class="mt-5 text-3xl font-bold tracking-tight text-stone-100">Ideias que sobrevivem ao hype.</h2>

                    <p class="mt-5 text-sm leading-7 text-stone-500">
                        Engenharia, produto e tecnologia sem transformar cada novidade em uma solução procurando um
                        problema.
                    </p>

                    <a href="{{ route('blog.index') }}"
                        class="line-hover mt-8 inline-block font-mono text-[12px] uppercase tracking-[.15em] text-stone-300">
                        Ver todos os artigos →
                    </a>
                </div>

                <div class="mt-12 border-b border-stone-800 lg:mt-0">
                    @foreach ($posts as $post)
                        <x-post-row :post="$post" />
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Contact --}}
    <section id="contato">
        <div class="mx-auto max-w-7xl px-5 py-20 sm:px-8 lg:py-32">
            <div class="grid gap-16 lg:grid-cols-[1fr_1.1fr] lg:gap-24">
                <div>
                    <x-eyebrow>04 / contato</x-eyebrow>

                    <h2
                        class="mt-6 max-w-xl text-5xl font-extrabold leading-none tracking-tighter text-stone-100 sm:text-6xl">
                        Tem um problema que precisa virar software?
                    </h2>

                    <p class="mt-7 max-w-lg text-base leading-8 text-stone-500">
                        Conte um pouco sobre o que você está construindo. A primeira conversa serve para entender o
                        contexto, não para empurrar uma solução pronta.
                    </p>

                    <div class="mt-12 border-t border-stone-800">
                        <x-contact-link :href="config('site.whatsapp')" channel="WhatsApp" label="Falar com especialista" external />
                        <x-contact-link :href="config('site.social.instagram.url')" channel="Instagram" :label="config('site.social.instagram.label')" external />
                        <x-contact-link :href="config('site.social.linkedin.url')" channel="LinkedIn" :label="config('site.social.linkedin.label')" external />
                        <x-contact-link :href="config('site.social.github.url')" channel="GitHub" :label="config('site.social.github.label')" external />
                    </div>
                </div>

                <form action="{{ route('contact.send') }}" method="POST" class="border border-stone-800 bg-coffee-900" data-contact-form>
                    @csrf
                    <div class="flex items-center justify-between border-b border-stone-800 px-6 py-4">
                        <span
                            class="font-mono text-[11px] uppercase tracking-[.18em] text-stone-600">novo_projeto.form</span>
                        <span class="font-mono text-[11px] text-stone-700">[04]</span>
                    </div>

                    <div class="space-y-6 p-6 sm:p-8">
                        @if (session('contact_status'))
                            <p role="status" class="border border-emerald-800 bg-emerald-950/30 p-4 font-mono text-xs leading-6 text-emerald-200">
                                {{ session('contact_status') }}
                            </p>
                        @endif

                        <div>
                            <x-contact-field id="name" name="name" label="Seu nome" placeholder="Como podemos chamar você?"
                                value="{{ old('name') }}" :aria-invalid="$errors->has('name') ? 'true' : 'false'" />
                            @error('name')
                                <p class="mt-2 font-mono text-[11px] text-red-300">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-contact-field id="email" name="email" label="E-mail" type="email" placeholder="voce@empresa.com"
                                value="{{ old('email') }}" :aria-invalid="$errors->has('email') ? 'true' : 'false'" />
                            @error('email')
                                <p class="mt-2 font-mono text-[11px] text-red-300">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-contact-field id="project" name="project" label="Sobre o projeto" textarea rows="6"
                                placeholder="O que você está construindo? Qual problema precisa resolver?"
                                :aria-invalid="$errors->has('project') ? 'true' : 'false'">{{ old('project') }}</x-contact-field>
                            @error('project')
                                <p class="mt-2 font-mono text-[11px] text-red-300">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" data-contact-submit
                            class="submit-button flex h-12 w-full items-center justify-between bg-amber-100 px-5 font-mono text-[12px] font-semibold uppercase tracking-[.14em] text-coffee-950 transition disabled:cursor-wait disabled:bg-stone-500 disabled:text-stone-100">
                            <span data-contact-submit-label>Enviar briefing</span>
                            <span class="flex size-4 items-center justify-center" aria-hidden="true">
                                <span data-contact-submit-arrow>→</span>
                                <span data-contact-submit-spinner class="hidden size-3.5 border-2 border-coffee-950/25 border-t-coffee-950 motion-safe:animate-spin"></span>
                            </span>
                        </button>

                        <p class="sr-only" aria-live="polite" data-contact-submit-status></p>

                        <p class="font-mono text-[11px] leading-5 text-stone-700">
                            Ao enviar, você inicia uma conversa. Sem spam. Sem pitch automático.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
