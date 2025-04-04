@extends('layouts.main')

@section('top-title', 'Ventas')

@section('title')
Ventas
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item active">Ventas</li>
@endsection

@section('content')
<h1>Lista de Ventas</h1>

<a href="{{ route('ventas.create') }}" class="btn btn-success mb-3">Registrar Venta</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ventas as $venta)
        <tr>
            <td>{{ $venta->id }}</td>
            <td>{{ $venta->cliente_nombre }}</td>
            <td>{{ $venta->fecha }}</td>
            <td>${{ number_format($venta->total, 2) }}</td>
            <td>
                <a href="{{ route('ventas.show', $venta->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar venta?');">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection