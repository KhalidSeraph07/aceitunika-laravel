<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/curado', function () {
        return view('modules.curado.index');
    })->middleware('role:admin|ing')->name('curado.index');

    Route::get('/entradas', function () {
        return view('modules.entradas.index');
    })->middleware('role:admin|ing')->name('entradas.index');

    Route::get('/almacen', function () {
        return view('modules.almacen.index');
    })->middleware('role:admin|ing|operario')->name('almacen.index');

    Route::get('/insumos', function () {
        return view('modules.insumos.index');
    })->middleware('role:admin|operario')->name('insumos.index');

    Route::get('/ventas', function () {
        return view('modules.ventas.index');
    })->middleware('role:admin')->name('ventas.index');

    Route::get('/prestamos', function () {
        return view('modules.prestamos.index');
    })->middleware('role:admin|operario')->name('prestamos.index');

    Route::get('/historial', function () {
        return view('modules.historial.index');
    })->middleware('role:admin|ing|operario|consulta')->name('historial.index');
});

require __DIR__.'/auth.php';
