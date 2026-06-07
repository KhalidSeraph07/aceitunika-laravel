<?php

use App\Etl\Transformers\BooleanTransformer;
use App\Etl\Transformers\EnumTransformer;
use App\Etl\Transformers\JsonbTransformer;
use App\Etl\Transformers\SerialTransformer;

it('converts boolean to int', function () {
    $t = new BooleanTransformer();
    expect($t->transform(true))->toBe(1)
        ->and($t->transform(false))->toBe(0)
        ->and($t->transform('true'))->toBe(1)
        ->and($t->transform('f'))->toBe(0);
});

it('converts jsonb to json string', function () {
    $t = new JsonbTransformer();
    $result = $t->transform('{"a":1}');
    expect(json_decode($result, true))->toBe(['a' => 1]);
});

it('converts enum to string', function () {
    $t = new EnumTransformer();
    expect($t->transform('valor'))->toBe('valor');
});

it('converts serial to int', function () {
    $t = new SerialTransformer();
    expect($t->transform('123'))->toBe(123);
});
