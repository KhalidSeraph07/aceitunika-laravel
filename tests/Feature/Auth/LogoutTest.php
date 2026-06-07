<?php

it('logs out authenticated user', function () {
    actingAsAdmin();

    $this->post('/logout')
        ->assertRedirect('/');

    $this->assertGuest();
});
