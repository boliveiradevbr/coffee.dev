{{--
    Fixed glass header, 80px tall. Collapses to a hamburger below 1099px — the
    .desktop-nav / .desktop-cta / .mobile-nav-toggle visibility is driven entirely
    by the @media (min-width: 1099px) block in app.css, which is why the desktop
    elements ship with `hidden`.

    $badge renders the "Blog" chip that the editorial pages show next to the
    wordmark.
--}}
@props(['badge' => null])

@php
    $links = [
        ['label' => 'Serviços', 'url' => route('home').'#servicos'],
        ['label' => 'Processo', 'url' => route('home').'#processo'],
        ['label' => 'Contato', 'url' => route('home').'#contato'],
        ['label' => 'Blog', 'url' => route('blog.index')],
    ];

    $desktopLinkClasses = 'font-label-caps text-label-caps text-on-surface-variant font-medium hover:text-primary transition-colors py-2 relative after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-primary hover:after:w-full after:transition-all after:duration-300';

    $mobileLinkClasses = 'mobile-menu-link font-label-caps text-label-caps text-on-surface-variant font-medium hover:text-primary transition-colors py-3';
@endphp

<header
    class="fixed top-0 w-full z-50 glass-panel border-b border-white/10 shadow-2xl transition-all duration-300 ease-in-out"
>
    <div
        class="flex justify-between items-center max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop h-20"
    >
        <a class="flex items-center gap-3 group" href="{{ route('home') }}">
            <img
                alt="coffee.dev logo"
                class="w-10 h-10 object-contain group-hover:scale-110 transition-transform duration-300"
                src="/images/logo-40x40.png"
                width="40"
                height="40"
            />
            <span class="font-display-lg text-headline-lg font-bold text-crema-white tracking-tight">
                coffee<span class="text-primary-container">.</span>dev
                @if ($badge)
                    <span
                        class="inline-flex items-center rounded-full bg-gray-400/10 px-2 py-1 text-xs text-gray-400 inset-ring inset-ring-gray-400/20"
                    >{{ $badge }}</span>
                @endif
            </span>
        </a>

        <nav class="desktop-nav hidden gap-8 items-center">
            @foreach ($links as $link)
                <a class="{{ $desktopLinkClasses }}" href="{{ $link['url'] }}">{{ $link['label'] }}</a>
            @endforeach
        </nav>

        <x-btn-primary
            :href="config('site.whatsapp')"
            external
            class="desktop-cta hidden items-center gap-2 px-6 py-3"
        >
            Falar com especialista
        </x-btn-primary>

        <button
            aria-controls="mobile-menu"
            aria-expanded="false"
            aria-label="Abrir menu de navegação"
            class="mobile-nav-toggle text-on-surface hover:text-primary transition-colors"
            id="mobile-menu-toggle"
            type="button"
        >
            <x-icon name="menu" class="text-3xl" />
        </button>
    </div>

    <nav aria-label="Navegação mobile" class="mobile-menu" id="mobile-menu">
        <div class="px-margin-mobile pb-5 flex flex-col gap-1 border-t border-white/5">
            @foreach ($links as $link)
                <a class="{{ $mobileLinkClasses }}" href="{{ $link['url'] }}">{{ $link['label'] }}</a>
            @endforeach

            <x-btn-primary
                :href="config('site.whatsapp')"
                external
                class="mobile-menu-link px-6 py-3 text-center mt-2"
            >
                Falar com especialista
            </x-btn-primary>
        </div>
    </nav>
</header>
