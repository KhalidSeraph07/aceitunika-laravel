<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class HoraCortePrevia implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $tanque = request()->route('tanque');

        if (!$tanque) {
            return;
        }

        $horaCorte = $tanque->hora_corte ?? null;
        if ($horaCorte === null) {
            $fail("No se puede registrar lavado sin Hora de Corte del quemado.");
        }
    }
}
