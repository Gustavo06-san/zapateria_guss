@extends('layouts.main')

@section('top-title', 'Clientes')

@section('title')
Clientes - Item
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('clientes') }}">Clientes</a></li>
<li class="breadcrumb-item active">Item</li>
@endsection


@section('content')

{{ $cliente }}

@endsection
