@extends('adminlte::page')

@section('title', 'Conceptos')

@section('content_header')
    <h1>Editar Conceptos</h1>
@stop

@section('content') 
    @if ( session('mensaje') )
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @error('Clave')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('NombreConcepto')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('ValorConcepto')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    <div class="card">
        <div class="card-body">
            {!! Form::model($concepto, ['route' => ['admin.conceptos.update', $concepto], 'method' => 'put']) !!}
                <div class="form-group">
                  {!! Form::label('Clave', 'Clave del Concepto') !!}
                  {!! Form::text('Clave', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('NombreConcepto', 'Nombre del Concepto') !!}
                    {!! Form::text('NombreConcepto', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Costo', 'Costo') !!}
                    {!! Form::number('ValorConcepto', null, ['min' => '0.01', 'class' => 'form-control']) !!}
                </div>
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


@stop