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
<h1>Todas las ventas</h1>

@endsection