<header class="bg-white border-b border-gray-200">
    <div class="flex items-center justify-between px-4 py-3 lg:px-8">
        <div class="flex items-center gap-3">
            <button class="lg:hidden" x-data x-on:click="$dispatch('toggle-sidebar')">☰</button>
            <h1 class="text-lg font-semibold text-[color:var(--color-primary)]">Aceitunika v2</h1>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-sm text-[color:var(--color-muted)]">{{ auth()->user()?->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-[color:var(--color-primary)] hover:underline">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>
</header>
