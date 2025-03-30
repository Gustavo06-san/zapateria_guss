<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DetallesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\HomeController;

// Ruta principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas CRUD para Clientes
Route::get('clientes', [ClientesController::class, 'index'])->name('clientes'); // Listar clientes activos
Route::get('clientes/inactivos', [ClientesController::class, 'inactivos'])->name('clientes.inactivos'); // Mostrar clientes inactivos
Route::get('clientes/create', [ClientesController::class, 'create'])->name('clientes.create'); // Formulario de creación
Route::post('clientes', [ClientesController::class, 'store'])->name('clientes.store'); // Almacenar cliente
Route::get('clientes/{id}', [ClientesController::class, 'show'])->name('clientes.show'); // Ver detalles de cliente
Route::get('clientes/{id}/edit', [ClientesController::class, 'edit'])->name('clientes.edit'); // Formulario de edición
Route::put('clientes/{id}', [ClientesController::class, 'update'])->name('clientes.update'); // Actualizar cliente
Route::delete('clientes/{id}', [ClientesController::class, 'destroy'])->name('clientes.destroy'); // Eliminar cliente (lógico)

// Rutas CRUD para Productos
Route::get('productos', [ProductosController::class, 'index'])->name('productos'); // Listar productos
Route::get('productos/inactivos', [ProductosController::class, 'inactivos'])->name('productos.inactivos'); // Mostrar productos inactivos
Route::get('productos/create', [ProductosController::class, 'create'])->name('productos.create'); // Formulario de creación
Route::post('productos', [ProductosController::class, 'store'])->name('productos.store'); // Almacenar producto
Route::get('productos/{id}', [ProductosController::class, 'show'])->name('productos.show'); // Ver detalles de producto
Route::get('productos/{id}/edit', [ProductosController::class, 'edit'])->name('productos.edit'); // Formulario de edición
Route::put('productos/{id}', [ProductosController::class, 'update'])->name('productos.update'); // Actualizar producto
Route::delete('productos/{id}', [ProductosController::class, 'destroy'])->name('productos.destroy'); // Dar de baja producto (lógico)

// Rutas CRUD para Ventas
Route::get('ventas/activas', [VentasController::class, 'index'])->name('ventas.activas');
Route::get('ventas/inactivas', [VentasController::class, 'inactivas'])->name('ventas.inactivas');
Route::put('ventas/activar/{id}', [VentasController::class, 'activar'])->name('ventas.activar');
Route::resource('ventas', VentasController::class);
Route::get('ventas', [VentasController::class, 'index'])->name('ventas'); // Listar ventas
Route::get('ventas/inactivos', [VentasController::class, 'inactivos'])->name('ventas.inactivos'); // Mostrar ventas inactivas
Route::get('ventas/create', [VentasController::class, 'create'])->name('ventas.create'); // Formulario de creación
Route::post('ventas', [VentasController::class, 'store'])->name('ventas.store'); // Almacenar venta
Route::get('ventas/{id}', [VentasController::class, 'show'])->name('ventas.show'); // Ver detalles de venta
Route::get('ventas/{id}/edit', [VentasController::class, 'edit'])->name('ventas.edit'); // Formulario de edición
Route::put('ventas/{id}', [VentasController::class, 'update'])->name('ventas.update'); // Actualizar venta
Route::delete('ventas/{id}', [VentasController::class, 'destroy'])->name('ventas.destroy'); // Eliminar venta (lógico)

// Rutas CRUD para Detalles
Route::resource('detalles', DetallesController::class);
Route::get('detalles/inactivos', [DetallesController::class, 'inactivos'])->name('detalles.inactivos');
Route::put('detalles/activar/{id}', [DetallesController::class, 'activar'])->name('detalles.activar');
Route::get('detalles', [DetallesController::class, 'index'])->name('detalles'); // Listar detalles
Route::get('detalles/create', [DetallesController::class, 'create'])->name('detalles.create'); // Formulario de creación
Route::post('detalles', [DetallesController::class, 'store'])->name('detalles.store'); // Almacenar detalle
Route::get('detalles/{id}', [DetallesController::class, 'show'])->name('detalles.show'); // Ver detalles de venta específica
Route::get('detalles/{id}/edit', [DetallesController::class, 'edit'])->name('detalles.edit'); // Formulario de edición
Route::put('detalles/{id}', [DetallesController::class, 'update'])->name('detalles.update'); // Actualizar detalle
Route::delete('detalles/{id}', [DetallesController::class, 'destroy'])->name('detalles.destroy'); // Eliminar detalle

// Rutas adicionales para funcionalidades específicas
Route::get('clientes/activos', [ClientesController::class, 'activos'])->name('clientes.activos'); // Listar solo clientes activos
Route::get('ventas/reporte/{mes}/{año}', [VentasController::class, 'reporte'])->name('ventas.reporte'); // Reporte mensual de ventas
Route::get('productos/marcas/{marca}', [ProductosController::class, 'porMarca'])->name('productos.porMarca'); // Productos por marca