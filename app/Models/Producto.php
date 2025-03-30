<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model {
    protected $fillable = ['nombre', 'precio', 'stock', 'descripcion', 'status'];

    // Scope para filtrar productos activos
    public function scopeActivos($query) {
        return $query->where('status', 1);
    }
}