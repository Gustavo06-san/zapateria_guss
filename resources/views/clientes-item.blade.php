@extends('layouts.main')

@section('top-title', 'Clientes')

@section('title')
Clientes - Detalles
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('clientes') }}">Clientes</a></li>
<li class="breadcrumb-item active">Detalles del Cliente</li>
@endsection

@section('content')
<h1>Detalles del Cliente</h1>

<div class="card">
    <div class="card-header">
        Información del Cliente
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> {{ $cliente->id }}</p>
        <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
        <p><strong>Domicilio:</strong> {{ $cliente->domicilio }}</p>
        <p><strong>Celular:</strong> {{ $cliente->celular }}</p>
        <p><strong>Activo:</strong> {{ $cliente->isActive ? 'Sí' : 'No' }}</p>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary">Editar</a>
    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este cliente?');">Eliminar</button>
    </form>
</div>
@endsection