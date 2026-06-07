<?php

use App\Models\User;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    if (!Role::where('name', 'admin')->exists()) {
        Role::create(['name' => 'admin', 'guard_name' => 'web']);
    }
});

it('lets user log in and see the dashboard', function () {
    $this->browse(function (Browser $browser) {
        $user = User::factory()->create();
        $user->assignRole('admin');

        $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Log in')
                ->assertPathIs('/dashboard')
                ->assertSee('Dashboard');
    });
});
