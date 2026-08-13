@props(['number', 'title'])

<div>
    <div class="font-display-lg text-display-lg text-surface-bright font-bold mb-4 opacity-50">{{ $number }}</div>
    <div class="w-8 h-1 bg-primary-container/50 mb-6"></div>
    <h4 class="font-code-sm text-code-sm text-crema-white font-bold mb-3 uppercase tracking-wider">{{ $title }}</h4>
    <p class="font-body-md text-body-md text-on-surface-variant">{{ $slot }}</p>
</div>
