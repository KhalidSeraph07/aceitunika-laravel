<x-layouts.app>
    <x-page-header title="Ventas" />
    <div class="bg-white rounded-lg border border-gray-200 p-8 text-center">
        <h2 class="text-xl font-semibold text-[color:var(--color-text)] mb-2">Módulo Ventas</h2>
        <p class="text-[color:var(--color-muted)] mb-4">
            Este módulo se implementa en el sub-proyecto <code>ventas-module</code>.
        </p>
        <a href="{{ route('dashboard') }}" class="text-[color:var(--color-primary)] hover:underline">
            ← Volver al dashboard
        </a>
    </div>
</x-layouts.app>
