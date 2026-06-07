<?php

namespace App\Etl\Transformers;

class JsonbTransformer
{
    public function transform(mixed $value): string
    {
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            return json_encode($decoded ?: []);
        }
        return json_encode($value ?: []);
    }
}
