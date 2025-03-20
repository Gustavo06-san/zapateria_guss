@extends('layouts.main')

@section('top-title', 'Ventas')

@section('title')
Ventas
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item active">Ventas</li>
@endsection

@section('content')
<h1>Todas las Ventas</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Cliente</th>
            <th>Fecha</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ventas as $venta)
        <tr>
            <td>{{ $venta->id }}</td>
            <td>{{ $venta->cliente_id }}</td>
            <td>{{ $venta->fecha }}</td>
            <td>${{ number_format($venta->total, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
