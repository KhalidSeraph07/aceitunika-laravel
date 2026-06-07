<?php

it('admin can access curado', function () {
    actingAsAdmin()->get('/curado')->assertOk();
});

it('operario cannot access curado', function () {
    actingAsOperario()->get('/curado')->assertForbidden();
});

it('operario can access almacen', function () {
    actingAsOperario()->get('/almacen')->assertOk();
});

it('consulta cannot access ventas', function () {
    actingAsConsulta()->get('/ventas')->assertForbidden();
});

it('all roles can access dashboard', function () {
    actingAsAdmin()->get('/dashboard')->assertOk();
    actingAsOperario()->get('/dashboard')->assertOk();
    actingAsConsulta()->get('/dashboard')->assertOk();
});
