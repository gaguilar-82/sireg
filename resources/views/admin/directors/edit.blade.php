@extends('adminlte::page')

@section('title', 'Editar Director')

@section('content_header')
    <h1>Editar Director</h1>
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
    @error('NombreDirector')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('ApellidoPaternoDirector')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('ApellidoMaternoDirector')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('FechaNacimientoDirector')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('LugarNacimientoDirector')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('EstadoCivilDirector')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('FechaNombramiento')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('ExpedidoPor')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('ActaPublica')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre</p>
            <p><strong>{{$director->NombreDirector}} {{$director->ApellidoPaternoDirector}} {{$director->ApellidoMaternoDirector}}</strong></p>

            {!! Form::model($director, ['route' => ['admin.directors.update', $director], 'method' => 'put']) !!}
              <div class="form-group">
                {!! Form::label('NombreDirector', 'Nombre') !!}
                {!! Form::text('NombreDirector', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del director']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('ApellidoPaternoDirector', 'Apellido paterno') !!}
                  {!! Form::text('ApellidoPaternoDirector', null , ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido paterno']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('ApellidoMaternoDirector', 'Apellido materno') !!}
                  {!! Form::text('ApellidoMaternoDirector', null , ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido materno']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('FechaNacimientoDirector', 'Fecha de nacimiento') !!}
                  {!! Form::date('FechaNacimientoDirector', null , ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha de nacimiento']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('LugarNacimientoDirector', 'Lugar de nacimiento') !!}
                  {!! Form::text('LugarNacimientoDirector', null , ['class' => 'form-control', 'placeholder' => 'Ingrese el lugar de nacimiento']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('EstadoCivilDirector', 'Estado civil') !!}
                  {!! Form::text('EstadoCivilDirector', null , ['class' => 'form-control', 'placeholder' => 'Ingrese el estado civil']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('FechaNombramiento', 'Fecha del nombramiento') !!}
                  {!! Form::date('FechaNombramiento', null , ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha del nombramiento']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('ExpedidoPor', 'Expedido por') !!}
                  {!! Form::text('ExpedidoPor', null , ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de quien expide el nombramiento']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('ActaPublica', 'Acta pública') !!}
                  {!! Form::textarea('ActaPublica', null, [
                      'class'      => 'form-control',
                      'rows'       => 4, 
                      'placeholder' => 'Ingrese los datos del acta pública'
                  ]) !!}
              </div>
              {!! Form::submit('Actualizar', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop