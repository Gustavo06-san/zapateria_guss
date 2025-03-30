<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class DetallesController extends Controller
{
    // Listar todos los detalles activos
    public function index() {
        $detalles = Detalle::activos()->with('producto')->get(); // Solo registros activos
        return view('detalles', compact('detalles'));
    }

    // Mostrar detalles de un registro específico
    public function show($id) {
        $detalle = Detalle::with('producto', 'venta')->findOrFail($id);
        return view('detalles-item', compact('detalle'));
    }

    // Mostrar formulario para crear un nuevo detalle
    public function create() {
        $productos = Producto::all();
        $ventas = Venta::all();
        return view('detalles-agregar', compact('productos', 'ventas'));
    }

    // Almacenar un nuevo detalle
    public function store(Request $request) {
        $request->validate([
            'venta_id' => 'required|exists:ventas,id',
            'producto_id' => 'required|exists:productos,id',
        ]);

        Detalle::create($request->all());

        return redirect()->route('detalles')->with('success', 'Detalle creado correctamente.');
    }

    // Mostrar formulario para editar un detalle
    public function edit($id) {
        $detalle = Detalle::findOrFail($id);
        $productos = Producto::all();
        $ventas = Venta::all();
        return view('detalles-actualizar', compact('detalle', 'productos', 'ventas'));
    }

    // Actualizar un detalle
    public function update(Request $request, $id) {
        $request->validate([
            'venta_id' => 'required|exists:ventas,id',
            'producto_id' => 'required|exists:productos,id',
        ]);

        $detalle = Detalle::findOrFail($id);
        $detalle->update($request->all());

        return redirect()->route('detalles')->with('success', 'Detalle actualizado correctamente.');
    }

    // Eliminación lógica: marcar un detalle como inactivo
    public function destroy($id) {
        $detalle = Detalle::findOrFail($id);
        $detalle->update(['status' => 0]); // Marcar como inactivo
        return redirect()->route('detalles')->with('success', 'Detalle marcado como inactivo.');
    }

    // Mostrar detalles inactivos
    public function inactivos() {
        $detalles = Detalle::inactivos()->with('producto')->get(); // Solo registros inactivos
        return view('detalles-inactivos', compact('detalles'));
    }

    // Reactivar un detalle
    public function activar($id) {
        $detalle = Detalle::findOrFail($id);
        $detalle->update(['status' => 1]); // Reactivar
        return redirect()->route('detalles.inactivos')->with('success', 'Detalle reactivado correctamente.');
    }
}