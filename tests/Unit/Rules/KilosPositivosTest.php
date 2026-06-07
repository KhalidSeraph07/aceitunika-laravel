<?php

use App\Rules\KilosPositivos;

it('accepts positive number', function () {
    $rule = new KilosPositivos();
    $failed = false;
    $rule->validate('kilos', 100, function () use (&$failed) { $failed = true; });
    expect($failed)->toBeFalse();
});

it('accepts zero', function () {
    $rule = new KilosPositivos();
    $failed = false;
    $rule->validate('kilos', 0, function () use (&$failed) { $failed = true; });
    expect($failed)->toBeFalse();
});

it('rejects negative', function () {
    $rule = new KilosPositivos();
    $failed = false;
    $rule->validate('kilos', -10, function () use (&$failed) { $failed = true; });
    expect($failed)->toBeTrue();
});

it('rejects non-numeric', function () {
    $rule = new KilosPositivos();
    $failed = false;
    $rule->validate('kilos', 'abc', function () use (&$failed) { $failed = true; });
    expect($failed)->toBeTrue();
});
