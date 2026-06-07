<?php

namespace App\Etl\Transformers;

class SerialTransformer
{
    public function transform(mixed $value): int
    {
        return (int) $value;
    }
}
