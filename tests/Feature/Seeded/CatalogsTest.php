<?php

it('seeds catalog data', function () {
    $this->seed(\Database\Seeders\CatalogSeeder::class);

    expect(\App\Models\TipoEnvase::count())->toBeGreaterThan(0)
        ->and(\App\Models\Calibre::count())->toBeGreaterThan(0)
        ->and(\App\Models\Turno::count())->toBe(3)
        ->and(\App\Models\Fila::count())->toBe(5)
        ->and(\App\Models\Cuadrante::count())->toBe(50);
});
