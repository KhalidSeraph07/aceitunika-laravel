@php
    $variantClass = match($variant ?? 'primary') {
        'primary' => 'bg-[color:var(--color-primary)] text-white hover:bg-[color:var(--color-primary-hover)]',
        'secondary' => 'bg-gray-200 text-[color:var(--color-text)] hover:bg-gray-300',
        'danger' => 'bg-red-600 text-white hover:bg-red-700',
        default => 'bg-[color:var(--color-primary)] text-white',
    };
@endphp
<button {{ $attributes->merge(['class' => "px-4 py-2 rounded-lg font-medium transition {$variantClass}"]) }}>
    {{ $slot }}
</button>
