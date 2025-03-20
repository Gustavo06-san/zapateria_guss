@extends('layouts.main')

@section('top-title', 'Productos')

@section('title')
Marcas - Item
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('productos') }}">Productos</a></li>
<li class="breadcrumb-item active">Item</li>
@endsection


@section('content')

{{ $producto }}

@endsection