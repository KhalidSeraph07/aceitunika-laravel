<?php

use App\Models\User;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    if (!Role::where('name', 'admin')->exists()) {
        Role::create(['name' => 'admin', 'guard_name' => 'web']);
    }
});

it('logs in successfully with valid credentials', function () {
    $user = User::factory()->create(['password' => bcrypt('secret')]);

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'secret',
    ]);

    $response->assertRedirect('/dashboard');
    $this->assertAuthenticatedAs($user);
});

it('rejects invalid credentials', function () {
    $user = User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong',
    ]);

    $response->assertSessionHasErrors();
    $this->assertGuest();
});
