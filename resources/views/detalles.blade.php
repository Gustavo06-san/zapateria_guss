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

@endsection