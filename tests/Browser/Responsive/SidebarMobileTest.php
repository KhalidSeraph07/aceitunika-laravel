<?php

it('hides sidebar on mobile by default', function () {
    $this->browse(function (Browser $browser) {
        $user = User::factory()->create();
        $user->assignRole('admin');

        $browser->loginAs($user)
                ->resize(375, 800)
                ->visit('/dashboard')
                ->assertPresent('header button.lg\\:hidden');
    });
});
