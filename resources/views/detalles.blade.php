@extends('layouts.main')

@section('top-title', 'Detalles')

@section('title')
Detalles
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item active">Detalles</li>
@endsection

@section('content')
<h1>Lista de Detalles</h1>

<a href="{{ route('detalles.create') }}" class="btn btn-success mb-3">Agregar Detalle</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Venta</th>
            <th>Producto</th>
            <th>Fecha Creación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($detalles as $detalle)
        <tr>
            <td>{{ $detalle->id }}</td>
            <td>{{ $detalle->venta_id }}</td>
            <td>{{ $detalle->producto ? $detalle->producto->nombre : 'Sin producto' }}</td>
            <td>{{ $detalle->created_at }}</td>
            <td>
                <a href="{{ route('detalles.show', $detalle->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('detalles.edit', $detalle->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('detalles.destroy', $detalle->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas Eliminar el detalle?');">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection