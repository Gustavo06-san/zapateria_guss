@extends('layouts.main')

@section('top-title', 'Productos Inactivos')

@section('title')
Productos Inactivos
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('productos') }}">Productos</a></li>
<li class="breadcrumb-item active">Inactivos</li>
@endsection

@section('content')
<h1>Productos Inactivos</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
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
            <td>
                <!-- Botón para reactivar un producto inactivo -->
                <form action="{{ route('productos.activar', $producto->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success btn-sm">Reactivar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection