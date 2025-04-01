<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venta;

class VentasController extends Controller
{
    // Listar todas las ventas activas
    public function index() {
        $ventas = Venta::where('status', 1)->with('cliente')->get(); // Ventas activas con relación al cliente
        return response()->json($ventas, 200); // Respuesta JSON
    }

    // Mostrar una venta específica
    public function show($id) {
        $venta = Venta::with('cliente')->find($id);

        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }

        return response()->json($venta, 200);
    }

    // Crear una nueva venta
    public function store(Request $request) {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0',
        ]);

        $venta = Venta::create([
            'cliente_id' => $request->cliente_id,
            'fecha' => $request->fecha,
            'total' => $request->total,
            'status' => 1, // Activa por defecto
        ]);

        return response()->json(['message' => 'Venta creada correctamente', 'venta' => $venta], 201);
    }

    // Actualizar una venta existente
    public function update(Request $request, $id) {
        $venta = Venta::find($id);

        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }

        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0',
        ]);

        $venta->update($request->all());

        return response()->json(['message' => 'Venta actualizada correctamente', 'venta' => $venta], 200);
    }

    // Eliminación lógica: marcar una venta como inactiva
    public function destroy($id) {
        $venta = Venta::find($id);

        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }

        $venta->update(['status' => 0]); // Marcar como inactiva
        return response()->json(['message' => 'Venta marcada como inactiva correctamente'], 200);
    }

    // Reactivar una venta inactiva
    public function activar($id) {
        $venta = Venta::find($id);

        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }

        $venta->update(['status' => 1]); // Reactivar
        return response()->json(['message' => 'Venta reactivada correctamente'], 200);
    }

    // Listar todas las ventas inactivas
    public function inactivos() {
        $ventas = Venta::where('status', 0)->with('cliente')->get(); // Ventas inactivas con relación al cliente
        return response()->json($ventas, 200); // Respuesta JSON
    }
}