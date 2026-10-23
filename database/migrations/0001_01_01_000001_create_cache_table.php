<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orden_id')->constrained('ordenes_servicio')->onDelete('restrict');
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('restrict');
            $table->string('numero', 20)->unique();
            $table->timestamp('fecha')->useCurrent();
            $table->decimal('subtotal', 10, 2)->default(0.00);
            $table->decimal('impuesto', 10, 2)->default(0.00);
            $table->decimal('total', 10, 2)->default(0.00);
            $table->string('estado', 20)->default('Pendiente');
            $table->string('metodo_pago', 30)->nullable()->default('Efectivo');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};