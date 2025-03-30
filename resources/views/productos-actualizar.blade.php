@extends('layouts.main')

@section('top-title', 'Actualizar Producto')

@section('title')
Actualizar Producto
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('productos') }}">Productos</a></li>
<li class="breadcrumb-item active">Actualizar</li>
@endsection

@section('content')
<h1>Editar Producto</h1>

<form action="{{ route('productos.update', $producto->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Indica que la acción utiliza el método PUT para actualizar -->

    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" value="{{ $producto->precio }}" class="form-control" step="0.01" required>
    </div>

    <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" class="form-control">{{ $producto->descripcion }}</textarea>
    </div>

    <div class="form-group">
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" value="{{ $producto->stock }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="status">Estado:</label>
        <select class="form-control" id="status" name="status">
            <option value="1" {{ $producto->status ? 'selected' : '' }}>Activo</option>
            <option value="0" {{ !$producto->status ? 'selected' : '' }}>Inactivo</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    <a href="{{ route('productos') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection