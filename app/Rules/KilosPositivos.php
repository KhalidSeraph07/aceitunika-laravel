<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class KilosPositivos implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_numeric($value)) {
            $fail('El campo :attribute debe ser numérico.');
            return;
        }

        if ((float) $value < 0) {
            $fail('El campo :attribute no puede ser negativo.');
        }
    }
}
