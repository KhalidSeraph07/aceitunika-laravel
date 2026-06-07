<?php

it('seeds the admin user with admin role', function () {
    $this->seed(\Database\Seeders\DatabaseSeeder::class);

    $admin = \App\Models\User::where('email', 'admin@aceitunika.test')->first();

    expect($admin)->not->toBeNull()
        ->and($admin->hasRole('admin'))->toBeTrue();
});
