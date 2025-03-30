@extends('layouts.main')

@section('top-title', 'Detalles del Producto')

@section('title')
Detalles del Producto
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('productos') }}">Productos</a></li>
<li class="breadcrumb-item active">Detalles</li>
@endsection

@section('content')
<h1>Detalles del Producto</h1>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $producto->nombre }}</h5>
        <p class="card-text"><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
        <p class="card-text"><strong>Stock:</strong> {{ $producto->stock }}</p>
        <p class="card-text"><strong>Estado:</strong> {{ $producto->status ? 'Activo' : 'Inactivo' }}</p>
        <a href="{{ route('productos') }}" class="btn btn-primary">Volver a Productos</a>
    </div>
</div>
@endsection