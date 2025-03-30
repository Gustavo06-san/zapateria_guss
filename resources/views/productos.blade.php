@extends('layouts.main')

@section('top-title', 'Productos')

@section('title')
Productos
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item active">Productos</li>
@endsection

@section('content')
<h1>Todos los Productos</h1>

<a href="{{ route('productos.create') }}" class="btn btn-success mb-3">Agregar Producto</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>${{ number_format($producto->precio, 2) }}</td>
            <td>{{ $producto->stock }}</td>
            <td>{{ $producto->status ? 'Activo' : 'Inactivo' }}</td>
            <td>
                <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Dar de baja este producto?');">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection