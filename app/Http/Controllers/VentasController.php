<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class VentasController extends Controller {
    
    public function index() {
        // Obtenemos todas las ventas de la base de datos
        $ventas = Venta::all();

        // Pasamos las ventas a la vista
        return view('ventas', compact('ventas'));
    }
}

