@extends('layouts.main')

@section('top-title', 'Agregar Cliente')

@section('title')
Agregar Cliente
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('clientes') }}">Clientes</a></li>
<li class="breadcrumb-item active">Agregar</li>
@endsection

@section('content')
<form action="{{ route('clientes.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="domicilio">Domicilio:</label>
        <input type="text" name="domicilio" id="domicilio" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="celular">Celular:</label>
        <input type="text" name="celular" id="celular" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Agregar Cliente</button>
</form>
@endsection