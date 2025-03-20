@extends('layouts.main')

@section('top-title', 'Ventas')

@section('title')
Ventas - Item
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('ventas') }}">ventas</a></li>
<li class="breadcrumb-item active">Item</li>
@endsection


@section('content')

{{ $venta }}

@endsection