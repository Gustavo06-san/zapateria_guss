@extends('layouts.main')

@section('top-title', 'Agregar Detalle')

@section('title')
Agregar Detalle
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('detalles') }}">Detalles</a></li>
<li class="breadcrumb-item active">Agregar</li>
@endsection

@section('content')
<h1>Nueva Relación de Detalle</h1>

<form action="{{ route('detalles.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="venta_id">Venta:</label>
        <select name="venta_id" id="venta_id" class="form-control" required>
            <option value="">Selecciona una venta</option>
            @foreach ($ventas as $venta)
            <option value="{{ $venta->id }}">{{ $venta->id }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="producto_id">Producto:</label>
        <select name="producto_id" id="producto_id" class="form-control" required>
            <option value="">Selecciona un producto</option>
            @foreach ($productos as $producto)
            <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Guardar Detalle</button>
</form>
@endsection