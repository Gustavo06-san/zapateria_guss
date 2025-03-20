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

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Domicilio</th>
            <th>Celular</th>
            <th>Activo</th>
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
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
