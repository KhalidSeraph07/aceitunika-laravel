<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AforoCuadrante implements ValidationRule
{
    public const MAX_KILOS_NETOS = 18000;
    public const MAX_BIDONES = 300;

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_numeric($value)) {
            $fail('El campo :attribute debe ser numérico.');
            return;
        }

        if ((float) $value > self::MAX_KILOS_NETOS) {
            $fail("El :attribute ({$value} kg) excede el aforo máximo del cuadrante (" . self::MAX_KILOS_NETOS . " kg).");
        }
    }
}
