<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cuadrante extends Model
{
    protected $table = 'cuadrantes';

    protected $fillable = [
        'fila_id',
        'codigo',
        'orden',
        'es_pucho',
        'activo',
    ];

    protected $casts = [
        'es_pucho' => 'boolean',
        'activo' => 'boolean',
    ];

    public function fila(): BelongsTo
    {
        return $this->belongsTo(Fila::class);
    }
}
