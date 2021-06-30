@extends('layouts.plantilla')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection

@section('title', 'SIREG | Pagos')

@section('Content')
    @php
        $valor_concepto = 0;
    @endphp
   
    {{-- Mensajes --}}
    @if ( session('mensaje') )
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @error('asignados_id')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('FolioPago')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('FechaPago')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('conceptos_id')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('CantidadPago')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    <div class="container mx-auto pt-5">
        <h1>Pagos</h1>
        <div class="bg-gray-200">
            @can('pagos.store')
                <div class="card">
                    <div class="card-body">
                        <h5>Seleccione al posesionario</h5>
                        {{-- Datatable asignados --}}
                        <table id="datatable_1" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Colonia</th>
                                    <th>Manzana</th>
                                    <th>Lote</th>
                                    <th>Contrato</th>
                                    <th>Posesionario</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($asignados as $asignado)
                                <tr>
                                    <td id="Asig1">{{$asignado->id}}</td>
                                    <td id="Asig2">{{strtoupper($asignado->lotes->colonias->NombreColonia)}}</td>
                                    <td id="Asig3">{{$asignado->lotes->Manzana}}</td>
                                    <td id="Asig4">{{$asignado->lotes->NumLote}}</td>
                                    <td id="Asig5">{{strtoupper($asignado->ClaveContrato)}}</td>
                                    <td id="Asig6">{{strtoupper($asignado->posesionarios->NombrePosesionario)}} {{strtoupper($asignado->posesionarios->ApellidoPaterno)}} {{strtoupper($asignado->posesionarios->ApellidoMaterno)}}</td>
                                    <td>
                                        <button id="SeleccionarPosesionario" class="btn btn-warning btn-sm" onClick="javascript:SelAsignado();">Seleccionar</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('pagos.store')}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Nombre" class="form-label">Nombre*</label>
                                    <input type="text" name="" id="Nombre" class="form-control" mb-2 disabled=true>
                                    <input type="hidden" name="asignados_id" id="asignados_id" class="form-control" mb-2>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ClaveContrato" class="form-label">Contrato*</label>
                                    <input type="text" name="" id="ClaveContrato" class="form-control" mb-2  disabled=true>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="FolioPago" class="form-label">Folio*</label>
                                    <input type="text" name="FolioPago" id="FolioPago" class="form-control" value="{{ old('FolioPago')}}" mb-2>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="FechaPago" class="form-label">Fecha*</label>
                                    <input type="date" name="FechaPago" id="FechaPago" class="form-control" value="{{ old('FechaPago')}}" mb-2>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Concepto" class="form-label">Concepto*</label>
                                    <select name="conceptos_id" id="conceptos" class="form-control">
                                        <option value="">--Seleccione el Concepto--</option>
                                        @foreach ($conceptos as $concepto)
                                            <option value="{{$concepto['id']}}" data-valor="{{$concepto['ValorConcepto']}}"
                                                @if (old('conceptos_id') == ($concepto['id']))
                                                    selected="selected"  
                                                @endif
                                                >
                                                {{$concepto->Clave}} - {{$concepto->NombreConcepto}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>    
                                <div class="form-group col-md-2">
                                    <label for="CantidadPago" class="form-label">Cantidad*</label>
                                    <input type="number" name="CantidadPago" class="form-control" id="CantidadPago" class="form-control" value="" mb-2>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="ObservacionesPago" class="form-label">Observaciones</label>
                                    <textarea name="ObservacionesPago"  rows="2" cols="100" maxlength="100" class="form-control" style="text-transform:uppercase;" mb-2>{{ old('ObservacionesPago') }}</textarea>
                                </div>
                                <div class="form-group col-md-3">
                                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <button class="btn btn-secondary btn-block" type="reset">Limpiar formulario</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-body">
                    {{-- Datatable pagos --}}
                    <table id="datatable_pagos" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Contrato</th>
                                <th>Lote</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pagos as $pago)
                            <tr>
                                <td>{{$pago->id}}</td>
                                <td>{{strtoupper($pago->asignados->ClaveContrato)}}</td>
                                <td>{{$pago->asignados->lotes->colonias->NombreColonia}} MANZANA {{$pago->asignados->lotes->Manzana}} LOTE {{$pago->asignados->lotes->NumLote}}</td>
                                <td>{{strtoupper($pago->asignados->posesionarios->NombrePosesionario)}} {{strtoupper($pago->asignados->posesionarios->ApellidoPaterno)}} {{strtoupper($pago->asignados->posesionarios->ApellidoMaterno)}}</td>
                                <td>{{\Carbon\Carbon::parse($pago->FechaPago)->format('d/m/Y')}}</td>
                                <td>${{number_format($pago->CantidadPago,2,'.',',')}}</td>
                                <td>
                                    @can('pagos.show')
                                        <a href="{{route('pagos.show', [$pago->id])}}" class="btn btn-info btn-sm">Detalles</a>
                                    @endcan
                                    @can('pagos.edit')
                                        <a href="{{route('pagos.edit', [$pago->id])}}" class="btn btn-warning btn-sm">Editar</a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    {{-- Datatable --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/datatablesimple.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/datatable.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/pago.js') }}"></script>

    {{-- Confirmación registro eliminado --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session('eliminar') == 'ok')
    <script type="text/javascript" src="{{ asset('js/eliminado.js') }}"></script>
    @endif

    {{-- Carga el costo preestablecido del concepto--}}
    <script>
        $(function(){
            $('#conceptos').change(function(){
                var selected = $(this).find('option:selected');
                var costo = selected.data('valor'); 
                $('#CantidadPago').val(costo);
            });
        });
    </script>

@endsection