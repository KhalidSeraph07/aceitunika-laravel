<?php

use App\Rules\CalibreRangoValido;

it('accepts numeric calibre', function () {
    $rule = new CalibreRangoValido();
    $failed = false;
    $rule->validate('calibre', 100, function () use (&$failed) { $failed = true; });
    expect($failed)->toBeFalse();
});

it('accepts range calibre', function () {
    $rule = new CalibreRangoValido();
    $failed = false;
    $rule->validate('calibre', '90-160', function () use (&$failed) { $failed = true; });
    expect($failed)->toBeFalse();
});

it('rejects invalid format', function () {
    $rule = new CalibreRangoValido();
    $failed = false;
    $rule->validate('calibre', 'abc', function () use (&$failed) { $failed = true; });
    expect($failed)->toBeTrue();
});

it('rejects range with start >= end', function () {
    $rule = new CalibreRangoValido();
    $failed = false;
    $rule->validate('calibre', '200-100', function () use (&$failed) { $failed = true; });
    expect($failed)->toBeTrue();
});
