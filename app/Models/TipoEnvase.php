<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEnvase extends Model
{
    protected $table = 'tipos_envase';

    protected $fillable = [
        'nombre',
        'peso_unitario_kg',
        'descripcion',
    ];

    protected $casts = [
        'peso_unitario_kg' => 'decimal:3',
    ];
}
