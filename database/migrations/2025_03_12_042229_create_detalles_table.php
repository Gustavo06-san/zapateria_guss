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
        Schema::create('detalles', function (Blueprint $table) {
            $table->id(); // id de la tabla detalles
            $table->integer('venta_id'); // Cambiado de id_venta a venta_id
            $table->integer('producto_id'); // Cambiado de id_producto a producto_id
            $table->timestamps(); // Registra created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles');
    }
};
