<div {{ $attributes->merge(['class' => 'mb-6']) }}>
    <h1 class="text-2xl font-bold text-[color:var(--color-text)]">{{ $title }}</h1>
    @if(isset($subtitle))
        <p class="text-sm text-[color:var(--color-muted)] mt-1">{{ $subtitle }}</p>
    @endif
    {{ $slot ?? '' }}
</div>
