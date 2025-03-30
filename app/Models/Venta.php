<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model {
    protected $fillable = ['cliente_id', 'fecha', 'total', 'status'];

    // Scope para filtrar ventas activas
    public function scopeActivas($query) {
        return $query->where('status', 1);
    }

    // Scope para filtrar ventas inactivas
    public function scopeInactivas($query) {
        return $query->where('status', 0);
    }

    // Relación con el cliente
    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }
}