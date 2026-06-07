<?php

use App\Models\User;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    foreach (['admin', 'ing', 'operario', 'consulta'] as $r) {
        Role::firstOrCreate(['name' => $r, 'guard_name' => 'web']);
    }
});

it('operario does not see curado or ventas in sidebar', function () {
    $this->browse(function (Browser $browser) {
        $user = User::factory()->create();
        $user->assignRole('operario');

        $browser->loginAs($user)
                ->visit('/dashboard')
                ->assertDontSee('Curado')
                ->assertDontSee('Ventas')
                ->assertSee('Almacén')
                ->assertSee('Insumos');
    });
});

it('admin sees all modules', function () {
    $this->browse(function (Browser $browser) {
        $user = User::factory()->create();
        $user->assignRole('admin');

        $browser->loginAs($user)
                ->visit('/dashboard')
                ->assertSee('Curado')
                ->assertSee('Entradas')
                ->assertSee('Almacén')
                ->assertSee('Ventas');
    });
});
