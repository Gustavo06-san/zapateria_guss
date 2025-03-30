<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model {
    protected $fillable = ['venta_id', 'producto_id', 'status'];

    // Relación con el modelo Producto
    public function producto() {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    // Relación con el modelo Venta
    public function venta() {
        return $this->belongsTo(Venta::class, 'venta_id');
    }

    // Scope para registros activos
    public function scopeActivos($query) {
        return $query->where('status', 1);
    }

    // Scope para registros inactivos
    public function scopeInactivos($query) {
        return $query->where('status', 0);
    }
}