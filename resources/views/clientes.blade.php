@extends('layouts.main')

@section('top-title', 'Clientes')

@section('title')
Clientes
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item active">Clientes</li>
@endsection

@section('content')
<h1>Todos los Clientes</h1>

<a href="{{ route('clientes.create') }}" class="btn btn-success mb-3">Agregar Cliente</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Domicilio</th>
            <th>Celular</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->id }}</td>
            <td>{{ $cliente->nombre }}</td>
            <td>{{ $cliente->domicilio }}</td>
            <td>{{ $cliente->celular }}</td>
            <td>{{ $cliente->isActive ? 'Sí' : 'No' }}</td>
            <td>
                <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este cliente?');">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection