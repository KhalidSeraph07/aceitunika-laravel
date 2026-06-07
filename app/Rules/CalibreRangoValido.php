<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CalibreRangoValido implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (is_numeric($value)) {
            if ((int) $value <= 0) {
                $fail('El calibre :attribute debe ser positivo.');
            }
            return;
        }

        if (!preg_match('/^(\d+)-(\d+)$/', $value, $matches)) {
            $fail("El calibre :attribute debe ser numérico (ej: 90) o un rango (ej: 90-160).");
            return;
        }

        if ((int) $matches[1] >= (int) $matches[2]) {
            $fail('El rango de calibre :attribute es inválido (inicio debe ser menor que fin).');
        }
    }
}
