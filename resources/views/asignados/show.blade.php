@extends('layouts.plantilla')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    
@endsection

@section('title','SIREG | '.$asignado->ClaveContrato)

@section('Content')
@php 
    $total=0;
    $porpagar=0;
    $porpagarescrituras=0;
    $escrituras=0;
@endphp
@if ( session('mensaje') )
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="container mx-auto pt-5">
    <div class="bg-gray-200">    
        <div class="card text-center">
            <div class="card-header">
                <h4>{{strtoupper($asignado->lotes->colonias->NombreColonia)}} Manzana {{$asignado->lotes->Manzana}} Lote {{$asignado->lotes->NumLote}}</h4>
                <h5>{{strtoupper($asignado->ClaveContrato)}}</h5>
            </div>
            <div class="card-body">
                <p><strong>Nombre del Posesionario: </strong> {{strtoupper($asignado->posesionarios->NombrePosesionario)}} {{strtoupper($asignado->posesionarios->ApellidoPaterno)}} {{strtoupper($asignado->posesionarios->ApellidoMaterno)}}</p>
                <p><strong>Tipo de Colonia: </strong>{{$asignado->lotes->colonias->TipoColonia}}</p>
                <p><strong>Municipio: </strong>{{$asignado->lotes->colonias->municipios->NombreMunicipio}}</p>
                <p><strong>Clave: </strong>{{strtoupper($asignado->lotes->colonias->ClaveColonia)}}</p>
                <p><strong>Valor por metro cuadrado: </strong>${{number_format($asignado->lotes->colonias->ValorMetroCuadrado,2,'.',',')}}</p>
                <p><strong>Superficie: </strong>{{number_format($asignado->lotes->Superficie,2,'.',',')}}m??</p>
                <p><strong>Tipo de Contrato: </strong>{{$asignado->TipoContrato}}</p>
                <p><strong>Mensualidades: </strong>{{$asignado->Mensualidades}}</p>
                <p><strong>Costo del lote: </strong>${{number_format($asignado->CostoLote,2,'.',',')}}</p>
                <p><strong>Costo de las escrituras: </strong>${{number_format($asignado->CostoEscrituras,2,'.',',')}}</p>
                @if ($pagos != NULL)
                    @foreach ($pagos as $pago)
                        @if(str_starts_with($pago->conceptos->Clave, 'IP-0001'))
                            @php
                                $total=$total+$pago->CantidadPago
                            @endphp
                        @endif
                        @if($pago->conceptos->Clave == 'IP-0002')
                            @php
                                $escrituras=$escrituras+$pago->CantidadPago  
                            @endphp
                        @endif
                    @endforeach
                    @if($total > 0)
                            @php
                                $porpagar=($asignado->CostoLote)-$total;
                            @endphp
                            <p><strong>Saldo por pagar: </strong>${{number_format($porpagar,2,'.',',')}}</p> 
                    @endif
                    @if ($escrituras > 0)
                            @php
                                $porpagarescrituras=($asignado->CostoEscrituras)-$escrituras;    
                            @endphp
                            <p><strong>Pago de escrituras: </strong>${{number_format($escrituras,2,'.',',')}}</p>
                            <p><strong>Saldo de escrituras por pagar: </strong>${{number_format($porpagarescrituras,2,'.',',')}}</p>
                    @endif               
                @endif
                <p><strong>Fecha del contrato: </strong>{{\Carbon\Carbon::parse($asignado->FechaContrato)->format('d/m/Y')}}</p>
                @if ($inspeccion != NULL)
                    <p><strong>Fecha de ??ltima inspeccion: </strong>{{\Carbon\Carbon::parse($inspeccion->FechaInspeccion)->format('d/m/Y')}}</p>
                    <p><strong>Uso de suelo de acuerdo a la ??ltima inspecci??n: </strong> <u>{{$inspeccion->UsoVivienda}}</u></p>  
                @endif
                <p><strong>Observaciones: </strong>{{$asignado->ObservacionesAsignado}}</p>
                <br>
                @can('posesionarios.show')
                    <a href="{{route('posesionarios.show', [$asignado->posesionarios->id])}}" class="btn btn-success">Expediente</a>
                @endcan
                @can('asignados.edit')
                    <a href="{{route('asignados.edit', [$asignado->id])}}" class="btn btn-warning editar">Editar Asignaci??n</a>
                @endcan
                @can('asignados.index')
                    <a href="{{route('asignados.index')}}" class="btn btn-info">Regresar</a>
                @endcan
                @can('asignados.destroy')
                    <form action="{{route('asignados.destroy',[$asignado->id])}}" class="d-inline eliminar" id="eliminar" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                @endcan
                @can('asignados.validar')
                    <form action="{{route('asignados.validar',[$asignado->id])}}" class="d-inline eliminar" method="POST">
                        @method('put')
                        @csrf
                        @if($pagos != NULL && $inspeccion != NULL)
                            @if($asignado->CostoLote == $total && $asignado->CostoEscrituras == $escrituras && $inspeccion->UsoVivienda == "HABITADA" && $inspeccion->ZAR != 'S??' )
                                <input type="hidden" name="ParaEscriturar" value="S??">
                                <button class="btn btn-dark" type="submit">Turnar a escrituraci??n</button>
                            @endif
                        @endif
                    </form>
                @endcan
            </div>
            <div class="card-footer text-muted">
                @if($asignado->created_at == $asignado->updated_at)
                    <p>Fecha de creaci??n: {{$asignado->created_at->diffForHumans()}}</p>
                    <p>Creado por: {{$asignado->users->name}}</p>
                @elseif ($asignado->created_at != $asignado->updated_at)
                    <p>Fecha de actualizaci??n: {{$asignado->updated_at->diffForHumans()}}</p> 
                    <p>Editado por: {{$asignado->users->name}}</p>   
                @endif
            </div>
          </div>
    </div>
</div>
@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    {{-- SweetAlert Eliminar --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>
    

@endsection