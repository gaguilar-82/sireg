@extends('adminlte::page')

@section('title', 'Inspectores')

@section('content_header')
    <h1>Alta de inspectores</h1>
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
    @error('NombreInspector')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('Delegacion')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('Categoria')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.inspectors.store']) !!}
                <div class="form-group">
                  {!! Form::label('NombreInspector', 'Nombre') !!}
                  {!! Form::text('NombreInspector', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre completo del inspector']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Delegacion', 'Delegación') !!}
                    {!! Form::select('Delegacion',  ['DA' => 'Delegación Acapulco',
                                                     'DC' => 'Delegación Centro',
                                                     'DCC' => 'Delegación Costa Chica',
                                                     'DCG' => 'Delegación Costa Grande',
                                                     'DM' => 'Delegación Montaña',
                                                     'DN' => 'Delegación Norte',
                                                     'DTC' => 'Delegación Tierra Caliente'
                                                     ], null, ['placeholder' => 'Selecciona una opción...'])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('Categoria', 'Categoria') !!}
                    {!! Form::text('Categoria', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la categoria  del inspector']) !!}
                  </div>
                {!! Form::submit('Crear inspector', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


@stop