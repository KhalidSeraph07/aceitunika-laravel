<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calibre extends Model
{
    protected $table = 'calibres';

    protected $fillable = [
        'codigo',
        'descripcion',
        'valor_min',
        'valor_max',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];
}
