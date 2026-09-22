{{--
    Hairline header, 80px tall. Collapses to a toggle below md; the mobile menu's
    open state is driven by app.js through .mobile-menu.is-open in app.css.

    $badge replaces the "software foundry" tagline on the editorial pages.
--}}
@props(['badge' => null])

@php
    $links = [
        ['label' => 'Serviços', 'url' => route('home').'#servicos'],
        ['label' => 'Processo', 'url' => route('home').'#processo'],
        ['label' => 'Artigos', 'url' => route('blog.index')],
    ];

    $ctaUrl = route('home').'#contato';
@endphp

<header class="border-b border-stone-800 bg-coffee-950/95 backdrop-blur-md">
    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-5 sm:px-8">
        <a href="{{ route('home') }}" class="group flex items-center gap-3">
            <img
                src="/images/logo-40x40.png"
                alt="coffee.dev logo"
                width="36"
                height="36"
                class="h-9 w-9 object-contain transition-transform duration-300 group-hover:scale-110"
            />

            <div>
                <div class="text-[15px] font-bold tracking-tight text-stone-100">
                    coffee<span class="text-amber-200">.</span>dev
                </div>

                @if ($badge)
                    <div class="site-badge font-mono text-[9px] uppercase tracking-[.2em] text-amber-200">
                        {{ $badge }}
                    </div>
                @else
                    <div class="font-mono text-[9px] uppercase tracking-[.2em] text-stone-600">software foundry</div>
                @endif
            </div>
        </a>

        <nav class="desktop-nav hidden items-center gap-8 md:flex">
            @foreach ($links as $link)
                <a
                    href="{{ $link['url'] }}"
                    class="line-hover font-mono text-[11px] uppercase tracking-[.16em] text-stone-400 hover:text-stone-100"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach

            <a
                href="{{ $ctaUrl }}"
                class="border border-stone-700 px-4 py-2 font-mono text-[11px] uppercase tracking-[.12em] text-amber-100 transition hover:border-amber-100 hover:bg-amber-100 hover:text-coffee-950"
            >
                Vamos conversar
            </a>
        </nav>

        <button
            id="mobile-menu-toggle"
            type="button"
            class="flex h-10 w-10 items-center justify-center border border-stone-800 md:hidden"
            aria-controls="mobile-menu"
            aria-expanded="false"
            aria-label="Abrir menu"
        >
            <span class="font-mono text-sm text-stone-300">☰</span>
        </button>
    </div>

    <nav id="mobile-menu" aria-label="Navegação mobile" class="mobile-menu md:hidden">
        <div class="flex flex-col gap-1 border-t border-stone-800 px-5 pb-5 pt-3 sm:px-8">
            @foreach ($links as $link)
                <a
                    href="{{ $link['url'] }}"
                    class="mobile-menu-link py-3 font-mono text-[11px] uppercase tracking-[.16em] text-stone-400 hover:text-stone-100"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach

            <a
                href="{{ $ctaUrl }}"
                class="mobile-menu-link mt-2 border border-stone-700 px-4 py-3 text-center font-mono text-[11px] uppercase tracking-[.12em] text-amber-100"
            >
                Vamos conversar
            </a>
        </div>
    </nav>
</header>
