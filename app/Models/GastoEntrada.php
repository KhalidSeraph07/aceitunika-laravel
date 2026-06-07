<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GastoEntrada extends Model
{
    protected $table = 'gastos_entrada';

    protected $fillable = [
        'concepto',
        'monto',
        'descripcion',
    ];

    protected $casts = [
        'monto' => 'decimal:2',
    ];
}
