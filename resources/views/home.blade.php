@extends('layouts.app')

@section('title', 'coffee.dev - Code. Coffee. Creativity.')

@section('content')
    {{-- Hero --}}
    <section
        class="relative min-h-[90vh] flex items-center justify-center pt-32 pb-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto"
    >
        <div class="w-full grid grid-cols-1 items-center">
            <div class="scroll-reveal visible text-center">
                <div class="flex justify-center items-center gap-4 mb-6 font-code-sm text-code-sm text-outline-variant">
                    <span class="flex items-center gap-1">
                        <x-icon name="code" class="text-sm" />
                        Código limpo
                    </span>
                    <span class="w-1 h-1 rounded-full bg-primary-container/30"></span>
                    <span class="flex items-center gap-1">
                        <x-icon name="local_cafe" class="text-sm" />
                        Muito café
                    </span>
                    <span class="w-1 h-1 rounded-full bg-primary-container/30"></span>
                    <span class="flex items-center gap-1">
                        <x-icon name="rocket_launch" class="text-sm" />
                        Produtos reais
                    </span>
                </div>

                <h1
                    class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-crema-white mb-8"
                >
                    Software feito com <br class="hidden md:block" />
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary-container to-amber-glow"
                    >código limpo</span>
                    e <br class="hidden md:block" />
                    café forte.
                </h1>

                <p class="font-body-lg text-body-lg text-on-surface-variant mb-10 max-w-2xl mx-auto leading-relaxed">
                    Criamos produtos digitais para startups e empresas que valorizam tecnologia bem feita,
                    performance e experiência.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 items-center justify-center">
                    <x-btn-primary
                        :href="config('site.whatsapp')"
                        external
                        class="px-8 py-4 flex items-center gap-2"
                    >
                        <x-icon name="local_cafe" class="text-lg" />
                        Falar com nossos especialistas
                    </x-btn-primary>
                </div>
            </div>
        </div>
    </section>

    {{-- Services --}}
    <section class="py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto" id="servicos">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <x-service-card icon="terminal" title="Software sob medida">
                Desenvolvimento focado em performance, escalabilidade e boas práticas.
            </x-service-card>
            <x-service-card icon="cloud" title="SaaS & Plataformas">
                Produtos digitais completos, do MVP à escala.
            </x-service-card>
            <x-service-card icon="api" title="APIs & Integrações">
                Integrações seguras e eficientes entre sistemas.
            </x-service-card>
        </div>
    </section>

    {{-- Process --}}
    <section
        class="py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto relative border-t border-white/5"
        id="processo"
    >
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 md:gap-6">
            <x-process-step number="01" title="Entendimento">Entendimento profundo do negócio</x-process-step>
            <x-process-step number="02" title="Estratégia">Arquitetura e plano de produto</x-process-step>
            <x-process-step number="03" title="Construção">Desenvolvimento iterativo</x-process-step>
            <x-process-step number="04" title="Evolução">Melhoria contínua e escala</x-process-step>
        </div>
    </section>

    {{-- Blog --}}
    <section
        class="py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/5"
        id="blog"
    >
        <div class="flex items-center gap-3 mb-6 scroll-reveal visible">
            <h2 class="font-headline-xl text-headline-xl text-crema-white">Blog</h2>
            <x-icon name="book" class="text-primary-container text-3xl" />
        </div>
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-12 max-w-2xl scroll-reveal visible">
            Conteúdo sobre programação, mercado, carreira dev, SaaS e bastidores de quem vive código e café
            todos os dias.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <x-post-card :post="$post" />
            @endforeach
        </div>
    </section>

    {{-- Contact --}}
    <section
        class="py-section-gap px-margin-mobile md:px-margin-desktop bg-surface-container-lowest border-t border-white/5"
        id="contato"
    >
        <div
            class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16"
        >
            <div class="scroll-reveal visible">
                <h2 class="font-headline-xl text-headline-xl text-crema-white mb-6">Pronto para construir?</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-8 leading-relaxed">
                    Conte um pouco sobre sua ideia ou desafio. Respondemos rápido e com objetividade.
                </p>

                <div class="flex flex-col gap-5">
                    <x-contact-link
                        :href="'mailto:'.config('site.email')"
                        :label="config('site.email_label')"
                        aria-label="Email da coffee.dev"
                    >
                        <x-slot:icon>
                            <x-icon-badge>
                                <x-icon name="mail" class="text-primary-container text-sm" />
                            </x-icon-badge>
                        </x-slot:icon>
                    </x-contact-link>

                    <x-contact-link
                        :href="config('site.social.instagram.url')"
                        :label="config('site.social.instagram.label')"
                        aria-label="Instagram da coffee.dev"
                        external
                    >
                        <x-slot:icon>
                            <x-icon-badge class="text-primary-container">
                                <x-icons.instagram />
                            </x-icon-badge>
                        </x-slot:icon>
                    </x-contact-link>

                    <x-contact-link
                        :href="config('site.social.linkedin.url')"
                        :label="config('site.social.linkedin.label')"
                        aria-label="LinkedIn da coffee.dev"
                        external
                    >
                        <x-slot:icon>
                            <x-icon-badge class="text-primary-container">
                                <x-icons.linkedin />
                            </x-icon-badge>
                        </x-slot:icon>
                    </x-contact-link>

                    <x-contact-link
                        :href="config('site.social.github.url')"
                        :label="config('site.social.github.label')"
                        aria-label="GitHub da coffee.dev"
                        external
                    >
                        <x-slot:icon>
                            <x-icon-badge class="text-primary-container">
                                <x-icons.github />
                            </x-icon-badge>
                        </x-slot:icon>
                    </x-contact-link>
                </div>
            </div>

            {{--
                The form is presentational, exactly as in the prototype: no action,
                no field names and a type="button" submit. Wiring it up needs a
                recipient, validation and spam handling — deliberately out of scope.
            --}}
            <div class="scroll-reveal visible" style="transition-delay: 100ms">
                <form class="glass-panel p-8 rounded-xl flex flex-col gap-6">
                    <div>
                        <x-contact-field type="text" placeholder="Seu nome" aria-label="Seu nome" />
                    </div>
                    <div>
                        <x-contact-field type="email" placeholder="Seu e-mail" aria-label="Seu e-mail" />
                    </div>
                    <div>
                        <x-contact-field
                            textarea
                            rows="4"
                            class="resize-none"
                            placeholder="Conte um pouco sobre o projeto"
                            aria-label="Conte um pouco sobre o projeto"
                        />
                    </div>
                    <x-btn-primary class="py-4 flex items-center justify-center gap-2 mt-2">
                        <x-icon name="send" class="text-lg" />
                        Enviar mensagem
                    </x-btn-primary>
                </form>
            </div>
        </div>
    </section>
@endsection
