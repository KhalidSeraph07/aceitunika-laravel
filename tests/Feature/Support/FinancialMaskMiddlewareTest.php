<?php

use Illuminate\Support\Facades\Route;

beforeEach(function () {
    Route::get('/test-mask', function () {
        return response()->json([
            'data' => [
                'precio_compra' => 100,
                'costo_operativo' => 50,
                'nombre' => 'Test',
            ],
        ]);
    })->middleware('web');
});

it('masks financial fields for non-admin in JSON response', function () {
    actingAsOperario()->get('/test-mask')
        ->assertJson([
            'data' => [
                'precio_compra' => '***',
                'costo_operativo' => '***',
                'nombre' => 'Test',
            ],
        ]);
});

it('does not mask for admin', function () {
    actingAsAdmin()->get('/test-mask')
        ->assertJson([
            'data' => [
                'precio_compra' => 100,
                'costo_operativo' => 50,
                'nombre' => 'Test',
            ],
        ]);
});
