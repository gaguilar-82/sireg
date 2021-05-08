@extends('layouts.plantilla')

@section('css')

@section('title','Colonia '. $colonia->NombreColonia)

@section('Content')
<div class="container mx-auto pt-5">
    @if ( session('mensaje') )
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif
    <div class="bg-gray-200">    
        <div class="card text-center">
            <div class="card-header">
                <h4>Colonia {{$colonia->NombreColonia}}</h4>
                <h5>{{strtoupper($colonia->ClaveColonia)}}</h5>
            </div>
            <div class="card-body">
                <p><strong>Tipo de Colonia: </strong>{{$colonia->TipoColonia}}</p>
                <p><strong>Municipio: </strong>{{$colonia->municipios->NombreMunicipio}}</p>
                <p><strong>Clave: </strong>{{strtoupper($colonia->ClaveColonia)}}</p>
                <p><strong>Valor por metro cuadrado: </strong>${{$colonia->ValorMetroCuadrado}}</p>
                <p><strong>Titulo de propiedad: </strong>{{$colonia->TituloPropiedad}}</p>
                <p><strong>Lotificacion: </strong>{{$colonia->Lotificacion}}</p>
                <p><strong>Superficie Adquirida: </strong>{{$colonia->SuperficieAdquirida}}</p>
                <p><strong>Observaciones: </strong>{{$colonia->ObservacionesColonia}}</p>
                <br>
                <a href="{{route('colonias.edit', $colonia)}}" class="btn btn-warning editar">Editar Colonia</a>
                <a href="{{route('colonias.index')}}" class="btn btn-info">Regresar a Colonias</a>
                @can('colonias.destroy')
                <form action="{{route('colonias.destroy',[$colonia->id])}}" method="POST" class="d-inline eliminar" id="eliminar" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
                @endcan
            </div>
            <div class="card-footer text-muted">
              Fecha de creación {{$colonia->created_at->diffForHumans()}}
            </div>
          </div>
    </div>
</div>
@endsection

@section('js')

    {{-- SweetAlert Eliminar --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>
    

@endsection