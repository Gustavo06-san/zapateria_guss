<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model {
    
    protected $fillable = ['venta_id', 'producto_id'];
}
