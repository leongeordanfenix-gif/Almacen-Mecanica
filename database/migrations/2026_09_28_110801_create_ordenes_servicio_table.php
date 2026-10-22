<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ordenes_servicio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('restrict');
            $table->foreignId('vehiculo_id')->constrained('vehiculos')->onDelete('restrict');
            $table->foreignId('empleado_id')->nullable()->constrained('empleados')->nullOnDelete();
            $table->string('numero', 20)->unique();
            $table->string('estado', 20)->default('Ingresado');
            $table->timestamp('fecha_ingreso')->useCurrent();
            $table->date('fecha_estimada')->nullable();
            $table->timestamp('fecha_entrega')->nullable();
            $table->integer('kilometraje_ingreso')->default(0);
            $table->text('diagnostico')->nullable();
            $table->text('observaciones')->nullable();
            $table->decimal('total', 10, 2)->default(0.00);
            $table->string('origen', 20)->nullable()->default('Presencial');
            $table->integer('tiempo_estimado')->nullable()->default(0);
            $table->integer('tiempo_transcurrido')->nullable()->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ordenes_servicio');
    }
};
