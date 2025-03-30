<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{
    // Listar todos los clientes activos
    public function index() {
        $clientes = Cliente::activos()->get();
        return view('clientes', compact('clientes'));
    }

    // Ver detalles de un cliente
    public function show($id) {
        $cliente = Cliente::findOrFail($id);
        return view('clientes-item', compact('cliente'));
    }

    // Mostrar formulario para crear un cliente
    public function create() {
        return view('clientes-agregar');
    }

    // Almacenar un nuevo cliente
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'domicilio' => 'required|string|max:255',
            'celular' => 'required|string|max:20',
            'isActive' => 'required|boolean',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes')->with('success', 'Cliente creado correctamente.');
    }

    // Mostrar formulario para editar un cliente
    public function edit($id) {
        $cliente = Cliente::findOrFail($id);
        return view('clientes-actualizar', compact('cliente'));
    }

    // Actualizar un cliente
    public function update(Request $request, $id) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'domicilio' => 'required|string|max:255',
            'celular' => 'required|string|max:20',
            'isActive' => 'required|boolean',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('clientes')->with('success', 'Cliente actualizado correctamente.');
    }

    // Eliminado lógico de un cliente
    public function destroy($id) {
        $cliente = Cliente::findOrFail($id);
        $cliente->update(['isActive' => 0]); // Marcamos como inactivo
        return redirect()->route('clientes')->with('success', 'Cliente eliminado de manera lógica.');
    }

    // Listar todos los clientes inactivos
    public function inactivos() {
        $clientes = Cliente::where('isActive', 0)->get();
        return view('clientes-inactivos', compact('clientes'));
    }
}