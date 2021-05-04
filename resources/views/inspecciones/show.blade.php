@extends('layouts.plantilla')

@section('css')

@section('title','Inspeccion')

@section('Content')
<div class="container mx-auto pt-5">
    @if ( session('mensaje') )
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif
    <div class="bg-gray-200">    
        <div class="card text-center">
            <div class="card-header">
                <h3>Cédula de Inspección Socioeconómica</h3>
                <h4>{{$inspeccion->asignados->lotes->colonias->NombreColonia}} Manzana {{$inspeccion->asignados->lotes->Manzana}} Lote {{$inspeccion->asignados->lotes->NumLote}}</h4>
                <h5>{{strtoupper($inspeccion->asignados->ClaveContrato)}}</h5>
            </div>
            <div class="card-body">
                <p><strong>Nombre del Posesionario: </strong> {{$inspeccion->asignados->posesionarios->NombrePosesionario}} {{$inspeccion->asignados->posesionarios->ApellidoPaterno}} {{$inspeccion->asignados->posesionarios->ApellidoMaterno}}</p>
                <p><strong>Fecha de Inspección: </strong>{{\Carbon\Carbon::parse($inspeccion->FechaInspeccion)->format('d/m/Y')}}</p>
                <p><strong>Uso de la vivienda: </strong><u>{{$inspeccion->UsoVivienda}}</u></p>
                <p><strong>Material de la vivienda: </strong><u>{{$inspeccion->MaterialVivienda}}</u></p>
                <p><strong>Material de los muros: </strong><u>{{$inspeccion->MaterialMuros}}</u> <strong>Material del techo: </strong><u>{{$inspeccion->MaterialTecho}}</u> <strong>Material del piso: </strong><u>{{$inspeccion->MaterialPiso}}</u></p>
                <p><strong>¿Se encuentra en zona de alto riesgo? </strong><u>{{$inspeccion->ZAR}}</u></p>
                <p><strong>¿Cuenta con energía eléctrica? </strong><u>{{$inspeccion->EnergiaElectrica}}</u></p>
                <p><strong>¿Cuenta con agua potable? </strong><u>{{$inspeccion->AguaPotable}}</u></p>
                <p><strong>¿Cuenta con drenaje? </strong><u>{{$inspeccion->Drenaje}}</u></p>
                <p><strong>Antigüedad en la colonia: </strong><u>{{$inspeccion->Antiguedad}} años</u></p>
                <p><strong>Número de habitantes en la vivienda: </strong><u>{{$inspeccion->Habitantes}} habitantes</u></p>
                <p><strong>Número de habitaciones en la vivienda: </strong><u>{{$inspeccion->Habitaciones}} habitaciones</u></p>
                <p>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Gasto en Alimentación</th>
                                <th>Gasto en Salud</th>
                                <th>Gasto en Educación</th>
                                <th>Otros gastos</th>
                                <th>Gasto Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>${{number_format($inspeccion->GastoAlimentacion,2,'.',',')}}</td>
                                <td>${{number_format($inspeccion->GastoSalud,2,'.',',')}}</td>
                                <td>${{number_format($inspeccion->GastoEducacion,2,'.',',')}}</td>
                                <td>${{number_format($inspeccion->GastoOtros,2,'.',',')}}</td>
                                <td>${{number_format($inspeccion->GastoTotal,2,'.',',')}}</td>
                            </tr>
                        </tbody>
                    </table>
                </p>
                <p><strong>Observaciones: </strong><u>{{$inspeccion->ObservacionesInspeccion}}</u></p>
                <a href="{{route('inspecciones.index')}}" class="btn btn-info">Regresar</a>
                <a href="{{route('inspecciones.edit', [$inspeccion->id])}}" class="btn btn-warning">Editar</a>
                <a href="{{route('inspecciones.print', [$inspeccion->id])}}" target="_blank" class="btn btn-success">Vista previa</a>
            </div>
            <div class="card-footer text-muted text-center">
                Fecha de creación: {{$inspeccion->created_at->diffForHumans()}}
            </div>
        </div>
    </div>
</div>
@endsection