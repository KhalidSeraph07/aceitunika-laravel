<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesPermisosSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $roles = [
            'admin' => 'Acceso total, ve datos financieros reales',
            'ing' => 'Acceso a Curado, Almacen y Entradas, datos enmascarados',
            'operario' => 'Acceso a Almacen, Insumos y Prestamos, datos enmascarados',
            'consulta' => 'Solo lectura en Dashboard, todo enmascarado',
        ];

        foreach ($roles as $nombre => $descripcion) {
            Role::firstOrCreate(
                ['name' => $nombre, 'guard_name' => 'web'],
                ['description' => $descripcion]
            );
        }
    }
}
