<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller {
    
    public function index() {
        // Obtenemos todos los clientes de la base de datos
        $clientes = Cliente::all();

        // Pasamos los clientes a la vista
        return view('clientes', compact('clientes'));
    }
}
