<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductosController extends Controller
{
    // Listar todos los productos activos
    public function index() {
        $productos = Producto::where('status', 1)->get(); // Solo productos activos
        return response()->json($productos, 200); // Respuesta JSON
    }

    // Mostrar un producto específico
    public function show($id) {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        return response()->json($producto, 200);
    }

    // Crear un nuevo producto
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'status' => 1, // Activo por defecto
        ]);

        return response()->json(['message' => 'Producto creado correctamente', 'producto' => $producto], 201);
    }

    // Actualizar un producto existente
    public function update(Request $request, $id) {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $producto->update($request->all());

        return response()->json(['message' => 'Producto actualizado correctamente', 'producto' => $producto], 200);
    }

    // Eliminación lógica: marcar un producto como inactivo
    public function destroy($id) {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $producto->update(['status' => 0]); // Marcar como inactivo
        return response()->json(['message' => 'Producto marcado como inactivo correctamente'], 200);
    }

    // Reactivar un producto inactivo
    public function activar($id) {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $producto->update(['status' => 1]); // Reactivar
        return response()->json(['message' => 'Producto reactivado correctamente'], 200);
    }

    // Listar todos los productos inactivos
    public function inactivos() {
        $productos = Producto::where('status', 0)->get(); // Productos inactivos
        return response()->json($productos, 200); // Respuesta JSON
    }
}