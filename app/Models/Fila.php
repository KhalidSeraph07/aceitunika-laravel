<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fila extends Model
{
    protected $table = 'filas';

    protected $fillable = [
        'codigo',
        'descripcion',
        'orden',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];
}
