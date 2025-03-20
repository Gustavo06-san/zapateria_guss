<?php

namespace App\Http\Controllers;

use App\Models\Detalle; // Modelo Detalle
use Illuminate\Http\Request;

class DetallesController extends Controller {
    
    public function index() {
        // Obtener todos los registros de la tabla detalles
        $detalles = Detalle::all();

        // Pasar los registros a la vista
        return view('detalles', compact('detalles'));
    }
}
