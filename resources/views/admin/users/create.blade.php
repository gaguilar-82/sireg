@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Alta de usuarios</h1>
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
    @error('name')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('email')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('password')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.users.store']) !!}
                <div class="form-group">
                  {!! Form::label('name', 'Nombre') !!}
                  {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre completo del usuario']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'E-mail') !!}
                    {!! Form::text('email', null , ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Contraseña') !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '8 caracteres mínimo']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmar contraseña') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => '8 caracteres mínimo']) !!}
                </div>
                {!! Form::submit('Crear usuario', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


@stop