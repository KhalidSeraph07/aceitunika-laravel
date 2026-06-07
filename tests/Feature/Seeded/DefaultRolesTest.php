<?php

use Spatie\Permission\Models\Role;

it('seeds the 4 base roles', function () {
    $this->seed(\Database\Seeders\RolesPermisosSeeder::class);

    expect(Role::pluck('name')->toArray())
        ->toEqualCanonicalizing(['admin', 'ing', 'operario', 'consulta']);
});
