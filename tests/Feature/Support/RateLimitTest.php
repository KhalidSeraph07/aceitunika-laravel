<?php

use App\Models\User;

it('blocks login attempts after 5 failures', function () {
    $user = User::factory()->create();

    for ($i = 0; $i < 5; $i++) {
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong',
        ]);
    }

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong',
    ]);

    $response->assertStatus(429);
});
