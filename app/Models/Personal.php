<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';

    protected $fillable = [
        'nombre',
        'tipo',
        'jornal_diario',
        'activo',
    ];

    protected $casts = [
        'jornal_diario' => 'decimal:2',
        'activo' => 'boolean',
    ];
}
