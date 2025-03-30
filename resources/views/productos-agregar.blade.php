@extends('layouts.main')

@section('top-title', 'Agregar Producto')

@section('title')
Agregar Producto
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('productos') }}">Productos</a></li>
<li class="breadcrumb-item active">Agregar</li>
@endsection

@section('content')
<h1>Nuevo Producto</h1>

<form action="{{ route('productos.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" class="form-control" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="status">Estado:</label>
        <select class="form-control" id="status" name="status">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Guardar Producto</button>
</form>
@endsection