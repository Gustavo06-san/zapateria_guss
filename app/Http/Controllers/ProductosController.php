<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductosController extends Controller {
    
    public function index() {
        // Obtenemos todos los productos
        $productos = Producto::all();

        // Pasamos los productos a la vista
        return view('productos', compact('productos'));
    }
}
