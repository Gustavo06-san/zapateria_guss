@extends('layouts.main')

@section('top-title', 'Detalles')

@section('title')
Detalles de la Relación
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('detalles') }}">Detalles</a></li>
<li class="breadcrumb-item active">Detalle</li>
@endsection

@section('content')
<h1>Detalles de la Relación</h1>

<div class="card">
    <div class="card-header">
        Detalle ID: {{ $detalle->id }}
    </div>
    <div class="card-body">
        <p><strong>Venta ID:</strong> {{ $detalle->venta_id }}</p>
        <p><strong>Producto:</strong> {{ $detalle->producto->nombre ?? 'Sin producto' }}</p>
        <p><strong>Precio del Producto:</strong> ${{ number_format($detalle->producto->precio ?? 0, 2) }}</p>
        <p><strong>Stock Disponible:</strong> {{ $detalle->producto->stock ?? 'No disponible' }}</p>
        <hr>
        <p><strong>Fecha de Creación:</strong> {{ $detalle->created_at }}</p>
        <p><strong>Última Actualización:</strong> {{ $detalle->updated_at }}</p>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('detalles.edit', $detalle->id) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('detalles.destroy', $detalle->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar este detalle?');">Eliminar</button>
    </form>
</div>
@endsection