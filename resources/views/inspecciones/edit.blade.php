@extends('layouts.plantilla')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection

@section('Title', 'Pagos')

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
    @error('asignados_id')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('inspectors_id')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('inspectors_id')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('FechaInspeccion')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('UsoVivienda')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('MaterialVivienda')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('MaterialMuros')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('MaterialPiso')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('MaterialTecho')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('ZAR')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('EnergiaElectrica')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('AguaPotable')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('Drenaje')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('Antiguedad')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('Habitantes')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('Habitaciones')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('GastoAlimentacion')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('GastoSalud')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('GastoEducacion')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('GastoOtros')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('GastoTotal')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    <div class="container mx-auto pt-5">
        <div class="bg-gray-200">
            <h1>Inspecciones</h1>
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
                                <td id="Asig2">{{$asignado->lotes->colonias->NombreColonia}}</td>
                                <td id="Asig3">{{$asignado->lotes->Manzana}}</td>
                                <td id="Asig4">{{$asignado->lotes->NumLote}}</td>
                                <td id="Asig5">{{strtoupper($asignado->ClaveContrato)}}</td>
                                <td id="Asig6">{{$asignado->posesionarios->NombrePosesionario}} {{$asignado->posesionarios->ApellidoPaterno}} {{$asignado->posesionarios->ApellidoMaterno}}</td>
                                <td>
                                    <button id="SeleccionarPosesionario" class="btn btn-warning btn-sm" onClick="javascript:SelAsignado();">Seleccionar</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Formulario Inspecciones --}}
            <div class="card">
                <div class="card-body">
                    <form action="{{route('inspecciones.update', $inspeccion)}}" method="POST" name="f1">
                        @csrf
                        @method('put')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Nombre" class="form-label">Nombre</label>
                                <input type="text" name="" id="Nombre" class="form-control" mb-2 disabled=true value="{{$inspeccion->asignados->posesionarios->NombrePosesionario}} {{$inspeccion->asignados->posesionarios->ApellidoPaterno}} {{$inspeccion->asignados->posesionarios->ApellidoMaterno}}">
                                <input type="hidden" name="asignados_id" id="asignados_id" class="form-control" mb-2 value="{{$inspeccion->asignados->posesionarios_id}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ClaveContrato" class="form-label">Contrato</label>
                                <input type="text" name="" id="ClaveContrato" class="form-control" mb-2  disabled=true value="{{$inspeccion->asignados->ClaveContrato}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inspectors_id" class="form-label">Inspector</label>
                                <select name="inspectors_id" id="inspectors_id" class="form-control">
                                    <option value="">--Seleccione al Inspector--</option>
                                    @foreach ($inspectores as $inspector)
                                        <option value="{{$inspector['id']}}"  
                                            @if (($inspeccion->inspectors_id) == ($inspector['id']))   
                                                selected="selected"     
                                            @endif>
                                            {{$inspector->NombreInspector}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="FechaInspeccion" class="form-label">Fecha</label>
                                <input type="date" name="FechaInspeccion" id="FechaInspeccion" class="form-control" value="{{$inspeccion->FechaInspeccion}}" mb-2>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="UsoVivienda" class="form-label">Uso de la vivienda</label>
                                <select name="UsoVivienda" id="UsoVivienda" class="form-control">
                                    <option value="">--Seleccione el uso--</option>
                                    <option value="Habitada" @if ($inspeccion->UsoVivienda == 'Habitada') selected="selected" @endif>Habitada</option>
                                    <option value="Deshabitada" @if ($inspeccion->UsoVivienda == 'Deshabitada') selected="selected" @endif>Deshabitada</option>
                                    <option value="Baldio" @if ($inspeccion->UsoVivienda == 'Baldio') selected="selected" @endif>Baldio</option>
                                </select> 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="MaterialVivienda" class="form-label">Material de la vivienda</label>
                                <select name="MaterialVivienda" id="MaterialVivienda" class="form-control" onChange="material();">
                                    <option value="">--Seleccione el material--</option>
                                    <option value="Simple" @if ($inspeccion->MaterialVivienda == 'Simple') selected="selected" @endif>Simple</option>
                                    <option value="Mixto" @if ($inspeccion->MaterialVivienda == 'Mixto') selected="selected" @endif>Mixto</option>
                                    <option value="Firme" @if ($inspeccion->MaterialVivienda == 'Firme') selected="selected" @endif>Firme</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="MaterialTecho" class="form-label">Material del techo</label>
                                <select name="MaterialTecho" id="MaterialTecho" class="form-control">
                                    <option value="">--Seleccione el material--</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="MaterialMuros" class="form-label">Material de los muros</label>
                                <select name="MaterialMuros" id="MaterialMuros" class="form-control">
                                    <option value="">--Seleccione el material--</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="MaterialPiso" class="form-label">Material del piso</label>
                                <select name="MaterialPiso" id="MaterialPiso" class="form-control">
                                    <option value="">--Seleccione el material--</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="ZAR" class="form-label">¿Zona de alto riesgo?</label>
                                <select name="ZAR" id="ZAR" class="form-control">
                                    <option value="">--Seleccione una opción--</option>
                                    <option value="Sí" @if ($inspeccion->ZAR == 'Sí') selected="selected" @endif>Sí</option>
                                    <option value="No" @if ($inspeccion->ZAR == 'No') selected="selected" @endif>No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="EnergiaElectrica" class="form-label">¿Cuenta con energía eléctrica?</label>
                                <select name="EnergiaElectrica" id="EnergiaElectrica" class="form-control">
                                    <option value="">--Seleccione una opción--</option>
                                    <option value="Sí" @if ($inspeccion->EnergiaElectrica == 'Sí') selected="selected" @endif>Sí</option>
                                    <option value="No" @if ($inspeccion->EnergiaElectrica == 'No') selected="selected" @endif>No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="AguaPotable" class="form-label">¿Cuenta con agua potable?</label>
                                <select name="AguaPotable" id="AguaPotable" class="form-control">
                                    <option value="">--Seleccione una opción--</option>
                                    <option value="Sí" @if ($inspeccion->AguaPotable == 'Sí') selected="selected" @endif>Sí</option>
                                    <option value="No" @if ($inspeccion->AguaPotable == 'No') selected="selected" @endif>No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="Drenaje" class="form-label">¿Cuenta con drenaje?</label>
                                <select name="Drenaje" id="Drenaje" class="form-control">
                                    <option value="">--Seleccione una opción--</option>
                                    <option value="Sí" @if ($inspeccion->Drenaje == 'Sí') selected="selected" @endif>Sí</option>
                                    <option value="No" @if ($inspeccion->Drenaje == 'No') selected="selected" @endif>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="Antiguedad" class="form-label">Antigüedad en la colonia</label>
                                <input type="number" name="Antiguedad" id="Antiguedad" class="form-control" min="1" value="{{$inspeccion->Antiguedad}}" mb-2>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Habitantes" class="form-label">Número de habitantes</label>
                                <input type="number" name="Habitantes" id="Habitantes" class="form-control" min="1" value="{{$inspeccion->Habitantes}}" mb-2>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Habitaciones" class="form-label">Número de habitaciones</label>
                                <input type="number" name="Habitaciones" id="Habitaciones" class="form-control" min="0" value="{{$inspeccion->Habitaciones}}" mb-2>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="GastoAlimentacion" class="form-label">Gasto en alimentacion</label>
                                <input type="number" name="GastoAlimentacion" id="GastoAlimentacion" class="form-control" min="0" value="{{$inspeccion->GastoAlimentacion}}" mb-2>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="GastoSalud" class="form-label">Gasto en salud</label>
                                <input type="number" name="GastoSalud" id="GastoSalud" class="form-control" min="0" value="{{$inspeccion->GastoSalud}}" mb-2>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="GastoEducacion" class="form-label">Gasto en educación</label> 
                                <input type="number" name="GastoEducacion" id="GastoEducacion" class="form-control" min="0" value="{{$inspeccion->GastoEducacion}}" mb-2>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="GastoOtros" class="form-label">Otros gastos</label>
                                <input type="number" name="GastoOtros" id="GastoOtros" class="form-control" min="0" value="{{$inspeccion->GastoOtros}}" mb-2>
                                <input type="hidden" name="GastoTotal" id="GastoTotal" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <textarea name="ObservacionesInspeccion"  rows="2" cols="100" maxlength="100" class="form-control" placeholder="Observaciones" mb-2>{{$inspeccion->ObservacionesInspeccion}}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <button class="btn btn-primary btn-block" type="submit" onClick="javascript:CalcularGasto();">Guardar cambios</button>
                            </div>
                            <div class="form-group col-md-2">
                                <a class="btn btn-secondary btn-block" href="{{route('inspecciones.index')}}" role="button">Cancelar</a>
                            </div>
                        </div>
                    </form>
                    <form action="{{route('inspecciones.destroy',[$inspeccion->id])}}" method="POST" class="d-inline" id="eliminar">
                        @method('DELETE')
                        @csrf
                        <div class="form-group col-md-2">
                            <button class="btn btn-danger btn-block" type="submit">Eliminar</button>
                        </div>
                    </form>
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

    <script type="text/javascript" src="{{ asset('js/materialvivienda.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/gasto.js') }}"></script>

    {{-- SweetAlert Eliminar --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection