<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('ventas', function (Blueprint $table) {
            $table->boolean('status')->default(1)->after('total'); // Activo por defecto
        });
    }

    public function down(): void {
        Schema::table('ventas', function (Blueprint $table) {
            $table->dropColumn('status'); // Eliminar columna
        });
    }
};