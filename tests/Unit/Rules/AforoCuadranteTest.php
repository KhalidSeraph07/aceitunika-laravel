<?php

use App\Rules\AforoCuadrante;

it('accepts kilos within the limit', function () {
    $rule = new AforoCuadrante();
    $failed = false;
    $rule->validate('kilos', 15000, function ($msg) use (&$failed) { $failed = true; });
    expect($failed)->toBeFalse();
});

it('rejects kilos above 18000', function () {
    $rule = new AforoCuadrante();
    $message = null;
    $rule->validate('kilos', 20000, function ($msg) use (&$message) { $message = $msg; });
    expect($message)->toContain('18000');
});

it('rejects non-numeric values', function () {
    $rule = new AforoCuadrante();
    $message = null;
    $rule->validate('kilos', 'no-numero', function ($msg) use (&$message) { $message = $msg; });
    expect($message)->not->toBeNull();
});
