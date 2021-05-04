@extends('layouts.plantilla')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    
    {{-- Datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css">

@endsection

@section('Title', 'Asignados')

@section('Content')

    {{-- Mensajes --}}
    @if ( session('mensaje') )
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @error('ClaveContrato')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('CostoLote')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('FechaContrato')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('TipoContrato')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('lotes_id')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('posesionarios_id')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    
    <div class="container mx-auto pt-5">
        <div class="bg-gray-200">
            <h1>Asignación de lotes</h1>
            <div class="card">
                <div class="card-body">
                    <h5>Seleccione al posesionario</h5>
                    {{-- Datatable Posesionarios --}}
                    <table id="datatable_1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>CURP</th>
                                <th>Telefono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posesionarios as $posesionario)
                            <tr>
                                <td id="Pos1">{{$posesionario->id}}</td>
                                <td id="Pos2">{{$posesionario->NombrePosesionario}} {{$posesionario->ApellidoPaterno}} {{$posesionario->ApellidoMaterno}}</td>
                                <td id="Pos3">{{$posesionario->CURP}}</td>
                                <td id="Pos4">{{$posesionario->Telefono}}</td>
                                <td>
                                    <button id="SeleccionarPosesionario" class="btn btn-warning btn-sm" onClick="javascript:SelPosesionario();">Seleccionar</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    {{-- Datatable Lotes --}}
                    <h5>Seleccione el lote</h5>
                    <table id="datatable_2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Clave Colonia</th>
                                <th>Colonia</th>
                                <th>Clave Lote</th>
                                <th>Manzana</th>
                                <th>Lote</th>
                                <th>Superficie (m²)</th>
                                <th>Valor por m² ($)</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lotes as $lote)
                            <tr>
                                <td id="Lote1">{{$lote->id}}</td>
                                <td id="Lote2">{{$lote->colonias->ClaveColonia}}</td>
                                <td id="Lote3">{{$lote->colonias->NombreColonia}}</td>
                                <td id="Lote4">{{$lote->ClaveLote}}</td>
                                <td id="Lote5">{{$lote->Manzana}}</td>
                                <td id="Lote6">{{$lote->NumLote}}</td>
                                <td id="Lote7">{{number_format($lote->Superficie,2,'.',',')}}</td>
                                <td id="Lote8">{{number_format($lote->colonias->ValorMetroCuadrado,2,'.',',')}}</td>
                                <td>
                                    <button id="SeleccionarPosesionario" class="btn btn-warning btn-sm" onClick="javascript:SelLote();">Seleccionar</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    {{-- Formulario --}}
            <form action="{{route('asignados.store')}}" onSubmit="" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" name="" id="Nombre" class="form-control" mb-2 disabled=true>
                        <input type="hidden" name="posesionarios_id" id="posesionario_id" class="form-control" mb-2>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="NombreLote" class="form-label">Lote</label>
                        <input type="text" name="" id="NombreLote" class="form-control" mb-2  disabled=true>
                        <input type="hidden" name="lotes_id" id="lote_id" class="form-control" mb-2>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="ClaveContrato" class="form-label">Clave del Contrato</label>
                        <input type="text" name="ClaveContrato" id="ClaveContrato" class="form-control" mb-2>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="CostoLote" class="form-label">Costo del Lote</label>
                        <input type="text" name="CostoLote" id="CostoLote" class="form-control" mb-2>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="FechaContrato" class="form-label">Fecha del Contrato</label>
                        <input type="date" name="FechaContrato" class="date form-control" id="FechaContrato" class="form-control" value="{{ old('FechaContrato')}}" mb-2>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="TipoContrato" class="form-label">Tipo de contrato</label>
                        <select name="TipoContrato" id="TipoContrato" class="form-control">
                            <option value="">--Seleccione el Tipo de Contrato--</option>
                            <option value="Contado" @if (old('TipoContrato') == 'Contado') selected="selected" @endif>Contado</option>
                            <option value="Crédito" @if (old('TipoContrato') == 'Crédito') selected="selected" @endif>Crédito</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Mensualidades" class="form-label">Mensualidades</label>
                        <input type="number" name="Mensualidades" id="Mensualidades" min="1" max="48" class="form-control" value="{{ old('Mensualidades')}}" mb-2>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ObservacionesAsignado" class="form-label">Observaciones</label>
                        <textarea name="ObservacionesAsignado"  rows="2" cols="100" maxlength="100" class="form-control" mb-2 value="{{ old('ObservacionesColonia') }}"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                    </div>
                    <div class="form-group col-md-3">
                        <button class="btn btn-secondary btn-block" type="reset">Limpiar formulario</button>
                    </div>
                </div>
            </form>
            <div class="card">
                <div class="card-body">
                    {{-- Datatable asignados --}}
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Colonia</th>
                                <th>Manzana</th>
                                <th>Lote</th>
                                <th>Posesionario</th>
                                <th>Costo del lote</th>
                                <th>Tipo de Contrato</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($asignados as $asignado)
                            <tr>
                                <td>{{$asignado->id}}</td>
                                <td>{{$asignado->lotes->colonias->NombreColonia}}</td>
                                <td>{{$asignado->lotes->Manzana}}</td>
                                <td>{{$asignado->lotes->NumLote}}</td>
                                <td>{{$asignado->posesionarios->NombrePosesionario}} {{$asignado->posesionarios->ApellidoPaterno}} {{$asignado->posesionarios->ApellidoMaterno}}</td>
                                <td>${{number_format($asignado->CostoLote,2,'.',',')}}</td>
                                <td>{{$asignado->TipoContrato}}</td>
                                <td>
                                    <a href="{{route('asignados.show', [$asignado->id])}}" class="btn btn-info btn-sm">Detalles</a>
                                    <a href="{{route('asignados.edit', [$asignado->id])}}" class="btn btn-warning btn-sm">Editar</a>
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

    <script type="text/javascript" src="{{ asset('js/asignados.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/datatable.js') }}"></script>

    {{-- Confirmación registro eliminado --}}
    @if (session('eliminar') == 'ok')
        <script type="text/javascript" src="{{ asset('js/eliminado.js') }}"></script>
    @endif 

@endsection