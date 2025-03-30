@extends('layouts.main')

@section('top-title', 'Actualizar Cliente')

@section('title')
Actualizar Cliente
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('clientes') }}">Clientes</a></li>
<li class="breadcrumb-item active">Actualizar</li>
@endsection

@section('content')
<form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ $cliente->nombre }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="domicilio">Domicilio:</label>
        <input type="text" name="domicilio" id="domicilio" value="{{ $cliente->domicilio }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="celular">Celular:</label>
        <input type="text" name="celular" id="celular" value="{{ $cliente->celular }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="isActive">Activo:</label>
        <select name="isActive" id="isActive" class="form-control">
            <option value="1" {{ $cliente->isActive ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ !$cliente->isActive ? 'selected' : '' }}>No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
</form>
@endsection