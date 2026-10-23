<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::table('repuestos', function (Blueprint $table) {
        if (!Schema::hasColumn('repuestos', 'stock')) {
            $table->integer('stock')->default(0)->after('nombre');
        }
        if (!Schema::hasColumn('repuestos', 'precio')) {
            $table->decimal('precio', 8, 2)->default(0.00)->after('stock');
        }
    });
}

public function down(): void
{
    Schema::table('repuestos', function (Blueprint $table) {
        $table->dropColumn(['stock', 'precio']);
    });
}
};
