{{--
    Shared verbatim by /blog and the home teaser list so both read identically.
    Reading time assumes 200 words per minute.
--}}
@props(['post'])

@php
    $words = count(preg_split('/\s+/u', trim($post['conteudo'] ?: $post['headline'])));
    $minutes = max(1, (int) ceil($words / 200));
@endphp

<a class="article block border-t border-stone-800 py-7" href="{{ route('blog.show', $post['slug']) }}">
    <div class="grid gap-5 md:grid-cols-[110px_1fr_90px] md:items-start">
        <time datetime="{{ $post['data_iso'] }}" class="font-mono text-[10px] text-stone-600">
            {{ \Illuminate\Support\Carbon::parse($post['data_iso'])->format('d.m.Y') }}
        </time>

        <div>
            <h3 class="article-title text-xl font-semibold text-stone-200">{{ $post['titulo'] }}</h3>

            <p class="mt-3 max-w-2xl text-sm leading-6 text-stone-600">{{ $post['headline'] }}</p>
        </div>

        <div class="font-mono text-[9px] text-stone-700 md:text-right">{{ sprintf('%02d', $minutes) }} MIN</div>
    </div>
</a>
