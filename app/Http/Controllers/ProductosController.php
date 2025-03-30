<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductosController extends Controller {
    // Listar todos los productos
    public function index() {
        $productos = Producto::all(); // Recuperar todos los productos
        return view('productos', compact('productos'));
    }

    // Mostrar detalles de un producto específico
    public function show($id) {
        $producto = Producto::findOrFail($id); // Buscar por ID
        return view('productos-item', compact('producto'));
    }

    // Formulario para agregar un producto
    public function create() {
        return view('productos-agregar');
    }

    // Almacenar un nuevo producto
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:productos',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'descripcion' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        Producto::create($request->all());
        return redirect()->route('productos')->with('success', 'Producto creado correctamente.');
    }

    // Formulario para editar un producto existente
    public function edit($id) {
        $producto = Producto::findOrFail($id); // Recuperar producto
        return view('productos-actualizar', compact('producto'));
    }

    // Actualizar un producto
    public function update(Request $request, $id) {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'descripcion' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return redirect()->route('productos')->with('success', 'Producto actualizado correctamente.');
    }

    // Dar de baja un producto
    public function destroy($id) {
        $producto = Producto::findOrFail($id);
        $producto->update(['status' => 0]); // Estado inactivo
        return redirect()->route('productos')->with('success', 'Producto dado de baja correctamente.');
    }

    // Mostrar productos inactivos
    public function inactivos() {
        $productos = Producto::where('status', 0)->get();
        return view('productos-inactivos', compact('productos'));
    }

    // Reactivar un producto inactivo
    public function activar($id) {
        $producto = Producto::findOrFail($id);
        $producto->update(['status' => 1]); // Estado activo
        return redirect()->route('productos.inactivos')->with('success', 'Producto reactivado correctamente.');
    }
}