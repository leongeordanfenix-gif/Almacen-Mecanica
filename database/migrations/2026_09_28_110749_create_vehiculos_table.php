<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('restrict');
            $table->string('marca', 50);
            $table->string('modelo', 50);
            $table->integer('anio')->nullable();
            $table->string('placa', 20)->unique();
            $table->string('vin', 50)->nullable();
            $table->string('color', 30)->nullable();
            $table->integer('kilometraje')->default(0);
            $table->string('tipo', 30)->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
