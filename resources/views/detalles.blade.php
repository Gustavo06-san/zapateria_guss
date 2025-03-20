@extends('layouts.main')

@section('top-title', 'Detalles')

@section('title')
Detalles
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item active">Detalles</li>
@endsection

@section('content')
<h1>Todos los Detalles</h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Venta ID</th>
            <th>Producto ID</th>
            <th>Creado en</th>
        </tr>
    </thead>
    <tbody>
        @foreach($detalles as $detalle)
        <tr>
            <td>{{ $detalle->id }}</td>
            <td>{{ $detalle->venta_id }}</td>
            <td>{{ $detalle->producto_id }}</td>
            <td>{{ $detalle->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
