<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientesController;
use App\Http\Controllers\Api\DetallesController;
use App\Http\Controllers\Api\ProductosController;
use App\Http\Controllers\Api\VentasController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas para el controlador de Clientes (API)
Route::prefix('clientes')->group(function () {
    Route::get('/', [ClientesController::class, 'index']); // Listar clientes activos
    Route::get('/inactivos', [ClientesController::class, 'inactivos']); // Listar clientes inactivos
    Route::get('/{id}', [ClientesController::class, 'show']); // Mostrar un cliente específico
    Route::post('/create', [ClientesController::class, 'store']); // Crear un cliente
    Route::put('/{id}/editar', [ClientesController::class, 'update']); // Actualizar un cliente
    Route::post('/{id}/borrar', [ClientesController::class, 'destroy']); // Marcar cliente como inactivo
    Route::put('/activar/{id}', [ClientesController::class, 'activar']); // Reactivar un cliente
});

Route::prefix('detalles')->group(function () {
    Route::get('/', [DetallesController::class, 'index']); // Listar detalles activos
    Route::get('/inactivos', [DetallesController::class, 'inactivos']); // Listar detalles inactivos
    Route::get('/{id}', [DetallesController::class, 'show']); // Mostrar un detalle específico
    Route::post('/create', [DetallesController::class, 'store']); // Crear un detalle
    Route::put('/{id}/editar', [DetallesController::class, 'update']); // Actualizar un detalle
    Route::post('/{id}/borrar', [DetallesController::class, 'destroy']); // Marcar detalle como inactivo
    Route::put('/activar/{id}', [DetallesController::class, 'activar']); // Reactivar un detalle
});

Route::prefix('productos')->group(function () {
    Route::get('/', [ProductosController::class, 'index']); // Listar productos activos
    Route::get('/inactivos', [ProductosController::class, 'inactivos']); // Listar productos inactivos
    Route::get('/{id}', [ProductosController::class, 'show']); // Mostrar un producto específico
    Route::post('/create', [ProductosController::class, 'store']); // Crear un producto
    Route::put('/{id}/editar', [ProductosController::class, 'update']); // Actualizar un producto
    Route::post('/{id}/borrar', [ProductosController::class, 'destroy']); // Marcar producto como inactivo
    Route::put('/activar/{id}', [ProductosController::class, 'activar']); // Reactivar un producto
});

Route::prefix('ventas')->group(function () {
    Route::get('/', [VentasController::class, 'index']); // Listar ventas activas
    Route::get('/inactivos', [VentasController::class, 'inactivos']); // Listar ventas inactivas
    Route::get('/{id}', [VentasController::class, 'show']); // Mostrar una venta específica
    Route::post('/create', [VentasController::class, 'store']); // Crear una venta
    Route::put('/{id}/editar', [VentasController::class, 'update']); // Actualizar una venta
    Route::post('/{id}/borrar', [VentasController::class, 'destroy']); // Marcar una venta como inactiva
    Route::put('/activar/{id}', [VentasController::class, 'activar']); // Reactivar una venta
});

