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

@endsection