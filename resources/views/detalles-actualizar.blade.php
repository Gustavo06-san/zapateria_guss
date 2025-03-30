@extends('layouts.main')

@section('top-title', 'Editar Detalle')

@section('title')
Editar Detalle
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('detalles') }}">Detalles</a></li>
<li class="breadcrumb-item active">Editar</li>
@endsection

@section('content')
<h1>Editar Relación de Detalle</h1>

<form action="{{ route('detalles.update', $detalle->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="venta_id">Venta:</label>
        <select name="venta_id" id="venta_id" class="form-control" required>
            @foreach ($ventas as $venta)
            <option value="{{ $venta->id }}" {{ $detalle->venta_id == $venta->id ? 'selected' : '' }}>
                {{ $venta->id }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="producto_id">Producto:</label>
        <select name="producto_id" id="producto_id" class="form-control" required>
            @foreach ($productos as $producto)
            <option value="{{ $producto->id }}" {{ $detalle->producto_id == $producto->id ? 'selected' : '' }}>
                {{ $producto->nombre }}
            </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar Detalle</button>
</form>
@endsection