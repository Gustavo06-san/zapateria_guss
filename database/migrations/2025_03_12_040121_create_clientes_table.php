<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('domicilio', 255);
            $table->string('celular', 20);
            $table->boolean('isActive')->default(1); // Campo para indicar si está activo
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('clientes');
    }
};