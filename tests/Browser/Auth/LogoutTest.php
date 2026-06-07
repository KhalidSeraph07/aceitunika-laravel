<?php

it('logs out from the topbar', function () {
    $this->browse(function (Browser $browser) {
        $user = User::factory()->create();
        $user->assignRole('admin');

        $browser->loginAs($user)
                ->visit('/dashboard')
                ->press('Cerrar sesión')
                ->assertPathIs('/');
    });
});
