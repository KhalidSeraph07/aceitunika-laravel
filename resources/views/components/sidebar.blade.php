@php
    $user = auth()->user();
    $modules = [
        ['name' => 'Dashboard', 'route' => 'dashboard', 'icon' => '📊', 'roles' => ['admin', 'ing', 'operario', 'consulta']],
        ['name' => 'Curado', 'route' => 'curado.index', 'icon' => '🫒', 'roles' => ['admin', 'ing']],
        ['name' => 'Entradas', 'route' => 'entradas.index', 'icon' => '📥', 'roles' => ['admin', 'ing']],
        ['name' => 'Almacén', 'route' => 'almacen.index', 'icon' => '🏭', 'roles' => ['admin', 'ing', 'operario']],
        ['name' => 'Insumos', 'route' => 'insumos.index', 'icon' => '💧', 'roles' => ['admin', 'operario']],
        ['name' => 'Ventas', 'route' => 'ventas.index', 'icon' => '💰', 'roles' => ['admin']],
        ['name' => 'Préstamos', 'route' => 'prestamos.index', 'icon' => '🤝', 'roles' => ['admin', 'operario']],
        ['name' => 'Historial', 'route' => 'historial.index', 'icon' => '📋', 'roles' => ['admin', 'ing', 'operario', 'consulta']],
    ];
    $userRoles = $user?->getRoleNames()->toArray() ?? [];
@endphp

<aside class="w-64 bg-white border-r border-gray-200 hidden lg:block">
    <nav class="p-4 space-y-1">
        @foreach($modules as $module)
            @if(array_intersect($userRoles, $module['roles']))
                <a href="{{ route($module['route']) }}"
                   class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-[color:var(--color-surface)] text-[color:var(--color-text)]">
                    <span>{{ $module['icon'] }}</span>
                    <span>{{ $module['name'] }}</span>
                </a>
            @endif
        @endforeach
    </nav>
</aside>
