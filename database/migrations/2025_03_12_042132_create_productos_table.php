<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100)->unique(); // Nombre del producto
            $table->decimal('precio', 8, 2); // Precio
            $table->integer('stock'); // Stock disponible
            $table->text('descripcion')->nullable(); // Descripción opcional
            $table->boolean('status')->default(1); // Estado (activo/inactivo)
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down(): void {
        Schema::dropIfExists('productos');
    }
};