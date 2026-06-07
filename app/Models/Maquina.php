<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    protected $table = 'maquina';

    protected $fillable = [
        'nombre',
        'tipo',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];
}
