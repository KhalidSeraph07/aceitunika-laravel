<x-layouts.app>
    <x-page-header title="Dashboard" subtitle="Resumen general del sistema" />

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <x-card>
            <div class="text-sm text-[color:var(--color-muted)]">Lotes ingresados</div>
            <div class="text-2xl font-bold text-[color:var(--color-text)]">0</div>
        </x-card>
        <x-card>
            <div class="text-sm text-[color:var(--color-muted)]">Kilos totales</div>
            <div class="text-2xl font-bold text-[color:var(--color-text)]">0 kg</div>
        </x-card>
        <x-card>
            <div class="text-sm text-[color:var(--color-muted)]">Stock en almacén</div>
            <div class="text-2xl font-bold text-[color:var(--color-text)]">0 kg</div>
        </x-card>
        <x-card>
            <div class="text-sm text-[color:var(--color-muted)]">Préstamos pendientes</div>
            <div class="text-2xl font-bold text-[color:var(--color-text)]">0</div>
        </x-card>
    </div>

    <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h3 class="text-lg font-semibold mb-4">Actividad reciente</h3>
        <p class="text-[color:var(--color-muted)]">El feed de actividad se implementa en el sub-proyecto <code>dashboard-module</code>.</p>
    </div>
</x-layouts.app>
