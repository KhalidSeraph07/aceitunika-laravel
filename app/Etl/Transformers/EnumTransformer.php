<?php

namespace App\Etl\Transformers;

class EnumTransformer
{
    public function transform(mixed $value): string
    {
        return (string) $value;
    }
}
