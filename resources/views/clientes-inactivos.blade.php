@extends('layouts.main')

@section('top-title', 'Clientes Inactivos')

@section('title')
Clientes Inactivos
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('clientes') }}">Clientes</a></li>
<li class="breadcrumb-item active">Clientes Inactivos</li>
@endsection

@section('content')
<h1>Clientes Inactivos</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Domicilio</th>
            <th>Celular</th>
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
            <td>
                <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="isActive" value="1">
                    <button type="submit" class="btn btn-success btn-sm">Reactivar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection