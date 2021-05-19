@extends('layouts.plantillaprint')

@section('css')
    

@section('title','Estado de cuenta')

@section('Content')

@php 
    $total=0;
    $porpagar=0;
@endphp

<div class="container mx-auto pt-5 row justify-content-end">
    <img src="http:\\sireg.test\images\SIREG.jpg" alt="Sireg" width="150">
</div>

<div class="container mx-auto pt-5">
    <div class="bg-gray-200">    
        <div class="card text-center">
            <div class="card-header">
                <h4>{{$pago->asignados->lotes->colonias->NombreColonia}} Manzana {{$pago->asignados->lotes->Manzana}} Lote {{$pago->asignados->lotes->NumLote}}</h4>
                <h5>{{strtoupper($pago->asignados->ClaveContrato)}}</h5>
                <h5>{{$pago->asignados->posesionarios->NombrePosesionario}} {{$pago->asignados->posesionarios->ApellidoPaterno}} {{$pago->asignados->posesionarios->ApellidoMaterno}}</h5>
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
                            <th>Concepto</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recibos as $recibo)
                            @if ($pago->asignados_id == $recibo->asignados_id)
                                <tr>
                                    <td>{{$recibo->id}}</td>
                                    <td>{{\Carbon\Carbon::parse($recibo->FechaPago)->format('d/m/Y')}}</td>
                                    <td>{{$recibo->conceptos->Clave}}-{{$recibo->conceptos->NombreConcepto}}</td>
                                    <td>${{number_format($recibo->CantidadPago,2,'.',',')}}</td>
                                    @if(str_starts_with($recibo->conceptos->Clave, 'IP-0001'))
                                        @php
                                            $total=$total+$recibo->CantidadPago
                                        @endphp
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                @php
                    $porpagar=($pago->asignados->CostoLote)-$total;
                @endphp
                <p><strong>Total de pagos por amortización: </strong>${{number_format($total,2,'.',',')}}</p>
                <p><strong>Saldo por pagar: </strong>${{number_format($porpagar,2,'.',',')}}</p>
            </div>
            <div class="card-footer text-muted text-center">
                Fecha de impresión: {{\Carbon\Carbon::now()->format('d/m/Y')}}
                Impreso por: {{auth()->user()->name}}
            </div>
            <div class="visible-print text-center">
                {!! QrCode::size(75)->encoding('UTF-8')->errorCorrection('H')->generate($pago->asignados->ClaveContrato); !!}
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