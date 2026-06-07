<?php

namespace Database\Seeders;

use App\Models\Calibre;
use App\Models\Cuadrante;
use App\Models\Fila;
use App\Models\TipoEnvase;
use App\Models\Turno;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    public function run(): void
    {
        $envases = [
            ['nombre' => 'margaritos', 'peso_unitario_kg' => 25.0],
            ['nombre' => 'chavitos', 'peso_unitario_kg' => 15.0],
            ['nombre' => 'bidones', 'peso_unitario_kg' => 60.0],
            ['nombre' => 'tarzas', 'peso_unitario_kg' => 12.0],
        ];
        foreach ($envases as $e) {
            TipoEnvase::firstOrCreate(['nombre' => $e['nombre']], $e);
        }

        $calibres = [
            ['codigo' => '60-70', 'valor_min' => 60, 'valor_max' => 70],
            ['codigo' => '70-80', 'valor_min' => 70, 'valor_max' => 80],
            ['codigo' => '80-90', 'valor_min' => 80, 'valor_max' => 90],
            ['codigo' => '90-100', 'valor_min' => 90, 'valor_max' => 100],
            ['codigo' => '100-110', 'valor_min' => 100, 'valor_max' => 110],
            ['codigo' => '110-120', 'valor_min' => 110, 'valor_max' => 120],
            ['codigo' => '120-140', 'valor_min' => 120, 'valor_max' => 140],
            ['codigo' => '140-160', 'valor_min' => 140, 'valor_max' => 160],
            ['codigo' => '160-180', 'valor_min' => 160, 'valor_max' => 180],
        ];
        foreach ($calibres as $c) {
            Calibre::firstOrCreate(['codigo' => $c['codigo']], $c + ['descripcion' => $c['codigo']]);
        }

        $turnos = [
            ['nombre' => 'mañana', 'hora_inicio' => '06:00:00', 'hora_fin' => '14:00:00'],
            ['nombre' => 'tarde', 'hora_inicio' => '14:00:00', 'hora_fin' => '22:00:00'],
            ['nombre' => 'noche', 'hora_inicio' => '22:00:00', 'hora_fin' => '06:00:00'],
        ];
        foreach ($turnos as $t) {
            Turno::firstOrCreate(['nombre' => $t['nombre']], $t);
        }

        for ($i = 1; $i <= 5; $i++) {
            Fila::firstOrCreate(
                ['codigo' => "F{$i}"],
                ['descripcion' => "Fila {$i}", 'orden' => $i, 'activo' => true]
            );
        }

        $filas = Fila::all();
        foreach ($filas as $fila) {
            for ($c = 1; $c <= 10; $c++) {
                Cuadrante::firstOrCreate(
                    ['fila_id' => $fila->id, 'codigo' => "C{$c}"],
                    ['orden' => $c, 'es_pucho' => false, 'activo' => true]
                );
            }
        }
    }
}
