@props(['icon', 'title'])

<div class="elevated-card p-8 rounded-xl">
    <x-icon :name="$icon" class="text-primary-container text-3xl mb-6" />
    <h3 class="font-headline-lg text-headline-lg text-crema-white mb-4">{{ $title }}</h3>
    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">{{ $slot }}</p>
</div>
