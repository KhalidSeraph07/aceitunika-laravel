<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tipos_envase', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 50)->unique();
            $table->decimal('peso_unitario_kg', 10, 3)->default(0);
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });

        Schema::create('calibres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo', 20)->unique();
            $table->string('descripcion', 100);
            $table->integer('valor_min')->nullable();
            $table->integer('valor_max')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        Schema::create('vendedores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 150);
            $table->string('documento', 20)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->timestamps();
        });

        Schema::create('supervisores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 150);
            $table->string('documento', 20)->nullable();
            $table->timestamps();
        });

        Schema::create('conductores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 150);
            $table->string('licencia', 30)->nullable();
            $table->string('placa_vehiculo', 20)->nullable();
            $table->timestamps();
        });

        Schema::create('personal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 150);
            $table->enum('tipo', ['varones', 'mujeres', 'traspaleadores'])->default('varones');
            $table->decimal('jornal_diario', 10, 2)->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        Schema::create('maquina', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 100);
            $table->string('tipo', 50)->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        Schema::create('turnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('nombre', ['mañana', 'tarde', 'noche'])->unique();
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->timestamps();
        });

        Schema::create('gastos_entrada', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('concepto', 100);
            $table->decimal('monto', 10, 2)->default(0);
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });

        Schema::create('filas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo', 10)->unique();
            $table->string('descripcion', 100)->nullable();
            $table->integer('orden')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        Schema::create('cuadrantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('fila_id')->constrained('filas')->onDelete('restrict');
            $table->string('codigo', 10);
            $table->integer('orden')->default(0);
            $table->boolean('es_pucho')->default(false);
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->unique(['fila_id', 'codigo']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cuadrantes');
        Schema::dropIfExists('filas');
        Schema::dropIfExists('gastos_entrada');
        Schema::dropIfExists('turnos');
        Schema::dropIfExists('maquina');
        Schema::dropIfExists('personal');
        Schema::dropIfExists('conductores');
        Schema::dropIfExists('supervisores');
        Schema::dropIfExists('vendedores');
        Schema::dropIfExists('calibres');
        Schema::dropIfExists('tipos_envase');
    }
};
