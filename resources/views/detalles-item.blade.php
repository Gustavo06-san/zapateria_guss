@extends('layouts.main')

@section('top-title', 'Detalles')

@section('title')
Marcas - Item
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('detalles') }}">Detalles</a></li>
<li class="breadcrumb-item active">Item</li>
@endsection


@section('content')

{{ $detalle }}

@endsection