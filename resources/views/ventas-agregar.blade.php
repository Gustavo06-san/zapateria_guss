@extends('layouts.main')

@section('top-title', 'Registrar Venta')

@section('title')
Registrar Venta
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('ventas') }}">Ventas</a></li>
<li class="breadcrumb-item active">Registrar</li>
@endsection

@section('content')
<h1>Nueva Venta</h1>

<form action="{{ route('ventas.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="cliente_id">Cliente:</label>
        <select name="cliente_id" id="cliente_id" class="form-control" required>
            <option value="">Selecciona un cliente</option>
            @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="total">Total:</label>
        <input type="number" name="total" id="total" class="form-control" step="0.01" required>
    </div>
    <button type="submit" class="btn btn-success">Guardar Venta</button>
</form>
@endsection