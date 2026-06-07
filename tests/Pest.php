<?php

uses(
    Tests\DuskTestCase::class,
    // Illuminate\Foundation\Testing\DatabaseMigrations::class,
)->in('Browser');

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class)->in('Feature', 'Unit');

function actingAsAdmin(): TestCase
{
    Role::findOrCreate('admin');
    $user = User::factory()->create();
    $user->assignRole('admin');
    return test()->actingAs($user);
}

function actingAsOperario(): TestCase
{
    Role::findOrCreate('operario');
    $user = User::factory()->create();
    $user->assignRole('operario');
    return test()->actingAs($user);
}

function actingAsConsulta(): TestCase
{
    Role::findOrCreate('consulta');
    $user = User::factory()->create();
    $user->assignRole('consulta');
    return test()->actingAs($user);
}
