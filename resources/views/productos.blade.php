@extends('layouts.main')

@section('top-title', 'Productos')

@section('title')
Productos
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item active">Productos</li>
@endsection


@section('content')
<h1>Todos los productos</h1>

@endsection
