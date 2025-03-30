@extends('layouts.main')

@section('top-title', 'Ventas Inactivas')

@section('title')
Ventas Inactivas
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('ventas') }}">Ventas</a></li>
<li class="breadcrumb-item active">Inactivas</li>
@endsection

@section('content')
<h1>Ventas Inactivas</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ventas as $venta)
        <tr>
            <td>{{ $venta->id }}</td>
            <td>{{ $venta->cliente_nombre }}</td>
            <td>{{ $venta->fecha }}</td>
            <td>${{ number_format($venta->total, 2) }}</td>
            <td>
                <form action="{{ route('ventas.activar', $venta->id) }}" method="POST" style="display:inline;">
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