@extends('layouts.plantilla')

@section('css')

@section('title','SIREG | Lote '. $lote->colonias->ClaveColonia.$lote->Manzana.$lote->NumLote)

@section('Content')

<div class="container mx-auto pt-5">
    @if ( session('mensaje') )
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif
    <div class="bg-gray-200">
        <div class="card text-center">
            <div class="card-header">
                <h4>{{$lote->colonias->NombreColonia}}</h4>
                <h5>{{strtoupper($lote->colonias->ClaveColonia)}}</h5>
                <p>
                <h6>Manzana: {{$lote->Manzana}} Lote: {{$lote->NumLote}}</h6>
                <p>
                <h6>Clave del Lote: {{strtoupper($lote->ClaveLote)}}</h6>

            </div>
            <div class="card-body">
                <p>
                    @if ($lote->Macrolote != NULL)
                        <strong>Macrolote: </strong>{{$lote->Macrolote}}
                    @endif
                    @if ($lote->Etapa != NULL)
                        <strong> Etapa: </strong>{{$lote->Etapa}}
                    @endif
                    @if ($lote->Seccion != NULL)
                        <strong> Seccion: </strong>{{$lote->Seccion}}
                    @endif
                    @if ($lote->Poligono != NULL)
                        <strong> Polígono: </strong>{{$lote->Poligono}}
                    @endif
                    @if ($lote->Supermanzana != NULL)
                        <strong> Supermanzana: </strong>{{$lote->Supermanzana}}
                    @endif
                    @if ($lote->Casa != NULL)
                        <strong> Casa: </strong>{{$lote->Casa}}
                    @endif
                </p>
                <p><strong>Superficie: </strong>{{number_format($lote->Superficie,2,'.','.')}}m²</p>
                <p><strong>Valor por metro cuadrado: </strong>${{number_format($lote->colonias->ValorMetroCuadrado,2,'.','.')}}</p>
                <p><strong>Colindancia 1: </strong>{{$lote->Colindancia1}}</p>
                <p><strong>Colindancia 2: </strong>{{$lote->Colindancia2}}</p>
                <p><strong>Colindancia 3: </strong>{{$lote->Colindancia3}}</p>
                <p><strong>Colindancia 4: </strong>{{$lote->Colindancia4}}</p>
                <p><strong>Latitud y Longitud: </strong>{{$lote->Latitud}},{{$lote->Longitud}}</p>
                <p><strong>Código Postal: </strong>{{$lote->CodigoPostal}}</p>
                @if($lote->Croquis != NULL)
                    <div align="center"><img src="{{asset($lote->Croquis)}}"></div>
                @else
                    <div align="center"><img src="http:\\sireg.test\images\SINCROQUIS.png"></div>
                @endif
                <br>
                <div class="table-responsive-sm">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Uso de Suelo</th>
                            <th scope="col">Alto Riesgo</th>
                            <th scope="col">Afectación</th>
                            <th scope="col">Subdivisión</th>
                            <th scope="col">Actualización</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{$lote->Uso}}</td>
                            <td>{{$lote->AltoRiesgo}}</td>
                            <td>{{$lote->Afectacion}}</td>
                            <td>{{$lote->Subdivision}}</td>
                            <td>{{$lote->Actualizacion}}</td>
                          </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <p><strong>Observaciones: </strong>{{$lote->ObservacionesLote}}</p>
                <p><strong>Conflicto Legal: </strong>{{$lote->ConflictoLegal}}</p>
                @can('lotes.edit')
                    <a href="{{route('lotes.edit', $lote)}}" class="btn btn-warning">Editar Lote</a>
                @endcan
                @can('lotes.index')
                    <a href="{{route('lotes.index')}}" class="btn btn-info">Regresar a Lotes</a>
                @endcan
                @can('lotes.print')
                    <a href="{{route('lotes.print', [$lote->id])}}" target="_blank" class="btn btn-success">Vista previa</a>
                @endcan
                @can('lotes.destroy') 
                    <form action="{{route('lotes.destroy',[$lote->id])}}" method="POST" class="d-inline" id="eliminar">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                @endcan
            </div>
            <div class="card-footer text-muted">
                @if($lote->created_at == $lote->updated_at)
                    <p>Fecha de creación: {{$lote->created_at->diffForHumans()}}</p>
                    <p>Creado por: {{$lote->users->name}}</p>
                @elseif ($lote->created_at != $lote->updated_at)
                    <p>Fecha de actualización: {{$lote->updated_at->diffForHumans()}}</p> 
                    <p>Editado por: {{$lote->users->name}}</p>   
                 @endif
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