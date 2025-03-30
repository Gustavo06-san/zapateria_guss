<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {
    
    protected $fillable = ['nombre', 'domicilio', 'celular', 'isActive'];

    // Scope para filtrar solo clientes activos
    public function scopeActivos($query) {
        return $query->where('isActive', 1);
    }
}