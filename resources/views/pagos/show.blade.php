@extends('layouts.plantilla')

@section('css')

@section('title','SIREG | Pago ' .$pago->asignados->ClaveContrato)

@section('Content')

@php 
    $total=0;
    $porpagar=0;
@endphp

<div class="container mx-auto pt-5">
    @if ( session('mensaje') )
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif

    <div class="bg-gray-200">    
        <div class="card text-center">
            <div class="card-header">
                <h4>{{$pago->asignados->lotes->colonias->NombreColonia}} Manzana {{$pago->asignados->lotes->Manzana}} Lote {{$pago->asignados->lotes->NumLote}}</h4>
                <h5>{{strtoupper($pago->asignados->ClaveContrato)}}</h5>
                <h5>{{strtoupper($pago->asignados->posesionarios->NombrePosesionario)}} {{strtoupper($pago->asignados->posesionarios->ApellidoPaterno)}} {{strtoupper($pago->asignados->posesionarios->ApellidoMaterno)}}</h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <p><strong>Costo del Lote: </strong>${{number_format($pago->asignados->CostoLote,2,'.',',')}}</p>
                <p><strong>Tipo de Contrato: </strong>{{$pago->asignados->TipoContrato}}</p>
                @if ($pago->asignados->TipoContrato == "Crédito")
                    <p><strong>Mensualidades: </strong>{{$pago->asignados->Mensualidades}}</p>
                @endif
                <table id="datatable_1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Fecha</th>
                            <th>Folio</th>
                            <th>Concepto</th>
                            <th>Cantidad</th>
                            <th>Cobrado por</th>
                            <th>Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recibos as $recibo)
                            @if ($pago->asignados_id == $recibo->asignados_id)
                                <tr>
                                    <td>{{$recibo->id}}</td>
                                    <td>{{\Carbon\Carbon::parse($recibo->FechaPago)->format('d/m/Y')}}</td>
                                    <td>{{$recibo->FolioPago}}</td>
                                    <td>{{$recibo->conceptos->Clave}}-{{$recibo->conceptos->NombreConcepto}}</td>
                                    <td>${{number_format($recibo->CantidadPago,2,'.',',')}}</td>
                                    <td>{{$recibo->users->name}}</td>
                                    <th>{{$recibo->ObservacionesPago}}</th>
                                </tr>
                                @if(str_starts_with($recibo->conceptos->Clave, 'IP-0001'))
                                        @php
                                            $total=$total+$recibo->CantidadPago
                                        @endphp
                                @endif
                            @endif
                        @endforeach
                    </tbody>
                </table>
                @php
                    $porpagar=($pago->asignados->CostoLote)-$total;
                @endphp
                <p><strong>Total de pagos por amortización: </strong>${{number_format($total,2,'.',',')}}</p>
                <p><strong>Saldo por pagar: </strong>${{number_format($porpagar,2,'.',',')}}</p>
                @can('pagos.index')
                    <p><a href="{{route('pagos.index')}}" class="btn btn-info">Regresar a Pagos</a></p>
                @endcan
                @can('pagos.print')
                    <p><a href="{{route('pagos.print', [$pago->id])}}" target="_blank" class="btn btn-success">Vista previa</a></p>
                @endcan
            </div>
            <div class="card-footer text-muted text-center">
                @if($pago->created_at == $pago->updated_at)
                    <p>Fecha de creación: {{$pago->created_at->diffForHumans()}}</p>
                @elseif ($pago->created_at != $pago->updated_at)
                    <p>Fecha de actualización: {{$pago->updated_at->diffForHumans()}}</p>    
                @endif
            </div>
        </div>
    </div>
</div>
@endsection