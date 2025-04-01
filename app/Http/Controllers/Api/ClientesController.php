<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{
    // Listar todos los clientes activos
    public function index() {
        $clientes = Cliente::where('isActive', 1)->get(); // Solo clientes activos
        return response()->json($clientes, 200); // Respuesta JSON
    }

    // Mostrar un cliente específico
    public function show($id) {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        return response()->json($cliente, 200);
    }

    // Crear un nuevo cliente
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'domicilio' => 'required|string|max:255',
            'celular' => 'required|string|max:20',
        ]);

        $cliente = Cliente::create([
            'nombre' => $request->nombre,
            'domicilio' => $request->domicilio,
            'celular' => $request->celular,
            'isActive' => 1, // Activo por defecto
        ]);

        return response()->json(['message' => 'Cliente creado correctamente', 'cliente' => $cliente], 201);
    }

    // Actualizar un cliente existente
    public function update(Request $request, $id) {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'domicilio' => 'required|string|max:255',
            'celular' => 'required|string|max:20',
        ]);

        $cliente->update($request->all());

        return response()->json(['message' => 'Cliente actualizado correctamente', 'cliente' => $cliente], 200);
    }

    // Eliminación lógica: marcar un cliente como inactivo
    public function destroy($id) {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $cliente->update(['isActive' => 0]); // Marcar como inactivo
        return response()->json(['message' => 'Cliente marcado como inactivo correctamente'], 200);
    }

    // Reactivar un cliente inactivo
    public function activar($id) {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $cliente->update(['isActive' => 1]); // Reactivar
        return response()->json(['message' => 'Cliente reactivado correctamente'], 200);
    }

    // Listar todos los clientes inactivos
    public function inactivos() {
        $clientes = Cliente::where('isActive', 0)->get(); // Clientes inactivos
        return response()->json($clientes, 200); // Respuesta JSON
    }
}