<?php

use App\Models\User;
use App\Support\FinancialMask;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    if (!Role::where('name', 'admin')->exists()) {
        Role::create(['name' => 'admin', 'guard_name' => 'web']);
    }
    if (!Role::where('name', 'operario')->exists()) {
        Role::create(['name' => 'operario', 'guard_name' => 'web']);
    }
});

it('does not mask for admin user', function () {
    $mask = new FinancialMask();
    $admin = User::factory()->create();
    $admin->assignRole('admin');

    $data = ['precio_compra' => 100, 'nombre' => 'Test'];

    $result = $mask->apply($data, $admin);

    expect($result['precio_compra'])->toBe(100)
        ->and($result['nombre'])->toBe('Test');
});

it('masks financial fields for non-admin user', function () {
    $mask = new FinancialMask();
    $operario = User::factory()->create();
    $operario->assignRole('operario');

    $data = [
        'precio_compra' => 100,
        'costo_transporte' => 50,
        'nombre' => 'Lote 1',
    ];

    $result = $mask->apply($data, $operario);

    expect($result['precio_compra'])->toBe('***')
        ->and($result['costo_transporte'])->toBe('***')
        ->and($result['nombre'])->toBe('Lote 1');
});

it('recursively masks nested arrays', function () {
    $mask = new FinancialMask();
    $operario = User::factory()->create();
    $operario->assignRole('operario');

    $data = [
        'lote' => [
            'codigo' => 'L1',
            'costos' => [
                'precio_compra' => 100,
                'descripcion' => 'OK',
            ],
        ],
    ];

    $result = $mask->apply($data, $operario);

    expect($result['lote']['codigo'])->toBe('L1')
        ->and($result['lote']['costos']['precio_compra'])->toBe('***')
        ->and($result['lote']['costos']['descripcion'])->toBe('OK');
});

it('identifies financial fields by name', function () {
    $mask = new FinancialMask();

    expect($mask->isFinancialField('precio_compra'))->toBeTrue()
        ->and($mask->isFinancialField('costo_operativo'))->toBeTrue()
        ->and($mask->isFinancialField('nombre'))->toBeFalse();
});
