<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DetallesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('home');
// });

//ruta compuesta
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('clientes', [ClientesController::class, 'index'])->name('clientes');
Route::get('productos', [ProductosController::class, 'index'])->name('productos');
Route::get('ventas', [VentasController::class, 'index'])->name('ventas');
Route::get('detalles', [DetallesController::class, 'index'])->name('detalles');
// Route::get('marcas/{id}', [BrandsController::class, 'item'])->name('marcas.item');

//ruta complejas
//... to be continued

