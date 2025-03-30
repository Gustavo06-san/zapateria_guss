@extends('layouts.main')

@section('top-title', 'Detalles Inactivos')

@section('title')
Detalles Inactivos
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('detalles') }}">Detalles</a></li>
<li class="breadcrumb-item active">Inactivos</li>
@endsection

@section('content')
<h1>Detalles Inactivos</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($detalles as $detalle)
        <tr>
            <td>{{ $detalle->id }}</td>
            <td>{{ $detalle->producto->nombre }}</td>
            <td>
                <form action="{{ route('detalles.activar', $detalle->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success btn-sm">Reactivar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection