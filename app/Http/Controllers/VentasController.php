<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Cliente;

class VentasController extends Controller {
    // Mostrar ventas activas
    public function index() {
        $ventas = Venta::activas()->join('clientes', 'ventas.cliente_id', '=', 'clientes.id')
                                ->select('ventas.*', 'clientes.nombre as cliente_nombre')
                                ->get();

        return view('ventas', compact('ventas'));
    }

    // Mostrar detalles de una venta
    public function show($id) {
        $venta = Venta::join('clientes', 'ventas.cliente_id', '=', 'clientes.id')
                        ->select('ventas.*', 'clientes.nombre as cliente_nombre')
                        ->where('ventas.id', $id)
                        ->firstOrFail();

        return view('ventas-item', compact('venta'));
    }

    // Formulario para registrar una nueva venta
    public function create() {
        $clientes = Cliente::all();
        return view('ventas-agregar', compact('clientes'));
    }

    // Registrar una nueva venta
    public function store(Request $request) {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0',
        ]);

        Venta::create($request->all());
        return redirect()->route('ventas')->with('success', 'Venta registrada correctamente.');
    }

    // Formulario para editar una venta existente
    public function edit($id) {
        $venta = Venta::findOrFail($id);
        $clientes = Cliente::all();
        return view('ventas-actualizar', compact('venta', 'clientes'));
    }

    // Actualizar los datos de una venta
    public function update(Request $request, $id) {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0',
        ]);

        $venta = Venta::findOrFail($id);
        $venta->update($request->all());
        return redirect()->route('ventas')->with('success', 'Venta actualizada correctamente.');
    }

    // Eliminación lógica: marcar una venta como inactiva
    public function destroy($id) {
        $venta = Venta::findOrFail($id);
        $venta->update(['status' => 0]); // Marcar como inactiva
        return redirect()->route('ventas')->with('success', 'Venta marcada como inactiva.');
    }

    // Mostrar ventas inactivas
    public function inactivas() {
        $ventas = Venta::inactivas()->join('clientes', 'ventas.cliente_id', '=', 'clientes.id')
                                    ->select('ventas.*', 'clientes.nombre as cliente_nombre')
                                    ->get();

        return view('ventas-inactivas', compact('ventas'));
    }

    // Reactivar una venta
    public function activar($id) {
        $venta = Venta::findOrFail($id);
        $venta->update(['status' => 1]); // Reactivar la venta
        return redirect()->route('ventas.inactivas')->with('success', 'Venta reactivada correctamente.');
    }
}