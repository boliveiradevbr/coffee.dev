<footer class="border-t border-stone-800">
    <div class="mx-auto max-w-7xl px-5 py-8 sm:px-8">
        <div class="flex flex-col justify-between gap-6 md:flex-row md:items-center">
            <div>
                <div class="font-mono text-xs text-stone-500">coffee<span class="text-amber-200">.</span>dev</div>

                <div class="mt-1 font-mono text-[9px] uppercase tracking-[.16em] text-stone-700">
                    software feito com código limpo e café forte.
                </div>
            </div>

            <div class="flex flex-wrap gap-6 font-mono text-[9px] uppercase tracking-[.15em] text-stone-600">
                <a href="{{ route('home') }}#servicos" class="hover:text-stone-300">Serviços</a>
                <a href="{{ route('home') }}#processo" class="hover:text-stone-300">Processo</a>
                <a href="{{ route('blog.index') }}" class="hover:text-stone-300">Artigos</a>
                <a href="mailto:{{ config('site.email') }}" class="hover:text-stone-300">E-mail</a>
            </div>

            <div class="font-mono text-[9px] text-stone-700">© {{ now()->year }} coffee.dev</div>
        </div>
    </div>
</footer>
