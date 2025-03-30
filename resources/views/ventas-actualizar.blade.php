@extends('layouts.main')

@section('top-title', 'Editar Venta')

@section('title')
Editar Venta
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('ventas') }}">Ventas</a></li>
<li class="breadcrumb-item active">Editar</li>
@endsection

@section('content')
<h1>Editar Venta</h1>

<form action="{{ route('ventas.update', $venta->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="cliente_id">Cliente:</label>
        <select name="cliente_id" id="cliente_id" class="form-control" required>
            @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ $venta->cliente_id == $cliente->id ? 'selected' : '' }}>
                {{ $cliente->nombre }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $venta->fecha }}" required>
    </div>
    <div class="form-group">
        <label for="total">Total:</label>
        <input type="number" name="total" id="total" class="form-control" step="0.01" value="{{ $venta->total }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar Venta</button>
</form>
@endsection