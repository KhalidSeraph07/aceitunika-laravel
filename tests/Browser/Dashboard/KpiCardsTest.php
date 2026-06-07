<?php

it('shows 4 KPI cards on dashboard', function () {
    $this->browse(function (Browser $browser) {
        $user = User::factory()->create();
        $user->assignRole('admin');

        $browser->loginAs($user)
                ->visit('/dashboard')
                ->assertSee('Lotes ingresados')
                ->assertSee('Kilos totales')
                ->assertSee('Stock en almacén')
                ->assertSee('Préstamos pendientes');
    });
});
