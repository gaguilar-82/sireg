@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Lista de Directores</h1>
@stop

@section('content')
    <p>Bienvenido a SIREG.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{-- Confirmación registro eliminado --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session('eliminar') == 'ok')
        <script type="text/javascript" src="{{ asset('js/eliminado.js') }}"></script>
    @endif
@stop