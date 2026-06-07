<?php

namespace App\Etl\Transformers;

class BooleanTransformer
{
    public function transform(mixed $value): int
    {
        if (is_bool($value)) {
            return $value ? 1 : 0;
        }
        if (is_string($value)) {
            return in_array(strtolower($value), ['true', 't', '1', 'yes', 'on']) ? 1 : 0;
        }
        return (int) (bool) $value;
    }
}
