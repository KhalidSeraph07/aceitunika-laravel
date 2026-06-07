<div class="mb-4">
    @if(isset($label))
        <label for="{{ $name }}" class="block text-sm font-medium text-[color:var(--color-text)] mb-1">
            {{ $label }}
            @if(isset($required) && $required) <span class="text-red-500">*</span> @endif
        </label>
    @endif
    <select
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes->merge(['class' => 'w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[color:var(--color-primary)]']) }}
        @if(isset($required) && $required) required @endif
    >
        {{ $slot }}
    </select>
    @error($name)
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
    @enderror
</div>
