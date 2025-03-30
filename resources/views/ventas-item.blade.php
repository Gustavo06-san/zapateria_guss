@extends('layouts.main')

@section('top-title', 'Ventas')

@section('title')
Detalles de la Venta
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('ventas') }}">Ventas</a></li>
<li class="breadcrumb-item active">Detalle de la Venta</li>
@endsection

@section('content')
<h1>Detalles de la Venta</h1>

<div class="card">
    <div class="card-header">
        Información de la Venta
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> {{ $venta->id }}</p>
        <p><strong>Cliente:</strong> {{ $venta->cliente_nombre }}</p>
        <p><strong>Fecha:</strong> {{ $venta->fecha }}</p>
        <p><strong>Total:</strong> ${{ number_format($venta->total, 2) }}</p>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar esta venta?');">Eliminar</button>
    </form>
</div>
@endsection