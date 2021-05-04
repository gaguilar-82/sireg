@extends('layouts.plantillaprint')

@section('css')
    

@section('title','Croquis del Lote '. $lote->colonias->NombreColonia . $lote->Manzana . $lote->NumLote)

@section('Content')

<div class="container mx-auto pt-5 row justify-content-end">
    <img src="http:\\sireg.test\images\SIREG.jpg" alt="Sireg" width="150">
</div>
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
                <p><strong>Superficie: </strong>{{$lote->Superficie}}m²</p>
                <p><strong>Valor por metro cuadrado: </strong>${{$lote->colonias->ValorMetroCuadrado}}</p>
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
            </div>
            <div class="card-footer text-muted">
              Fecha de creación {{$lote->created_at->diffForHumans()}}
            </div>
          </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm">
            <button id="Imprimir" onclick="imprimir()" class="btn btn-light btn-sm">Imprimir</button>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript">
        function imprimir()
        {
            window.addEventListener("load", window.print());
        }
    </script>
@endsection