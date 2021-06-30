@extends('layouts.plantilla')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection

@section('title', 'SIREG | Inspecciones')

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
        <h1>Inspecciones</h1>
        <div class="bg-gray-200">
            @can('inspecciones.store')
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
            {{-- Formulario Inspecciones --}}
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('inspecciones.store')}}" method="POST" name="f1">
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
                                <div class="form-group col-md-6">
                                    <label for="inspectors_id" class="form-label">Inspector*</label>
                                    <select name="inspectors_id" id="inspectors_id" class="form-control">
                                        <option value="">--Seleccione al Inspector--</option>
                                        @foreach ($inspectores as $inspector)
                                            <option value="{{$inspector['id']}}"  
                                                @if (old('inspectors_id') == ($inspector['id']))   
                                                    selected="selected"     
                                                @endif>
                                                {{strtoupper($inspector->NombreInspector)}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="FechaInspeccion" class="form-label">Fecha*</label>
                                    <input type="date" name="FechaInspeccion" id="FechaInspeccion" class="form-control" value="{{ old('FechaInspeccion')}}" mb-2>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="UsoVivienda" class="form-label">Uso de la vivienda*</label>
                                    <select name="UsoVivienda" id="UsoVivienda" class="form-control">
                                        <option value="">--Seleccione el uso--</option>
                                        <option value="HABITADA">HABITADA</option>
                                        <option value="DESHABITADA">DESHABITADA</option>
                                        <option value="EN CONSTRUCCIÓN">EN CONSTRUCCIÓN</option>
                                        <option value="BALDÍO">BALDÍO</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="MaterialVivienda" class="form-label">Material de la vivienda*</label>
                                    <select name="MaterialVivienda" id="MaterialVivienda" class="form-control" onChange="material();">
                                        <option value="">--Seleccione el material--</option>
                                        <option value="SIMPLE" @if (old('MaterialVivienda') == 'SIMPLE') selected="selected" @endif>SIMPLE</option>
                                        <option value="MIXTO" @if (old('MaterialVivienda') == 'MIXTO') selected="selected" @endif>MIXTO</option>
                                        <option value="FIRME" @if (old('MaterialVivienda') == 'FIRME') selected="selected" @endif>FIRME</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="MaterialTecho" class="form-label">Material del techo*</label>
                                    <select name="MaterialTecho" id="MaterialTecho" class="form-control">
                                        <option value="">--Seleccione el material--</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="MaterialMuros" class="form-label">Material de los muros*</label>
                                    <select name="MaterialMuros" id="MaterialMuros" class="form-control">
                                        <option value="">--Seleccione el material--</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="MaterialPiso" class="form-label">Material del piso*</label>
                                    <select name="MaterialPiso" id="MaterialPiso" class="form-control">
                                        <option value="">--Seleccione el material--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="ZAR" class="form-label">¿Zona de alto riesgo?*</label>
                                    <select name="ZAR" id="ZAR" class="form-control">
                                        <option value="">--Seleccione una opción--</option>
                                        <option value="NO" @if (old('ZAR') == 'NO') selected="selected" @endif>NO</option>
                                        <option value="SÍ" @if (old('ZAR') == 'SÍ') selected="selected" @endif>SÍ</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="EnergiaElectrica" class="form-label">¿Cuenta con energía eléctrica?*</label>
                                    <select name="EnergiaElectrica" id="EnergiaElectrica" class="form-control">
                                        <option value="">--Seleccione una opción--</option>
                                        <option value="SÍ" @if (old('EnergiaElectrica') == 'SÍ') selected="selected" @endif>SÍ</option>
                                        <option value="NO" @if (old('EnergiaElectrica') == 'NO') selected="selected" @endif>NO</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="AguaPotable" class="form-label">¿Cuenta con agua potable?*</label>
                                    <select name="AguaPotable" id="AguaPotable" class="form-control">
                                        <option value="">--Seleccione una opción--</option>
                                        <option value="SÍ" @if (old('AguaPotable') == 'SÍ') selected="selected" @endif>SÍ</option>
                                        <option value="NO" @if (old('AguaPotable') == 'NO') selected="selected" @endif>NO</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="Drenaje" class="form-label">C*</label>
                                    <select name="Drenaje" id="Drenaje" class="form-control">
                                        <option value="">--Seleccione una opción--</option>
                                        <option value="SÍ" @if (old('Drenaje') == 'SÍ') selected="selected" @endif>SÍ</option>
                                        <option value="NO" @if (old('Drenaje') == 'NO') selected="selected" @endif>NO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="SeguridadSocial" class="form-label">Seguridad Social*</label>
                                    <select name="SeguridadSocial" id="SeguridadSocial" class="form-control">
                                        <option value="">--Seleccione una opción--</option>
                                        <option value="IMSS" @if (old('SeguridadSocual') == 'IMSS') selected="selected" @endif>IMSS</option>
                                        <option value="ISSSTE" @if (old('SeguridadSocial') == 'ISSSTE') selected="selected" @endif>ISSSTE</option>
                                        <option value="ISSFAM" @if (old('SeguridadSocial') == 'ISSFAM') selected="selected" @endif>ISSFAM</option>
                                        <option value="INSABI" @if (old('SeguridadSocial') == 'INSABI') selected="selected" @endif>INSABI</option>
                                        <option value="OTRO" @if (old('SeguridadSocial') == 'OTRO') selected="selected" @endif>OTRO</option>
                                        <option value="NINGUNO" @if (old('SeguridadSocial') == 'NINGUNO') selected="selected" @endif>NINGUNO</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="Antiguedad" class="form-label">Antigüedad en la colonia*</label>
                                    <input type="number" name="Antiguedad" id="Antiguedad" class="form-control" min="1" value="{{ old('Antiguedad')}}" mb-2>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="Habitantes" class="form-label">Número de habitantes*</label>
                                    <input type="number" name="Habitantes" id="Habitantes" class="form-control" min="1" value="{{ old('Habitantes')}}" mb-2>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="Habitaciones" class="form-label">Número de habitaciones*</label>
                                    <input type="number" name="Habitaciones" id="Habitaciones" class="form-control" min="0" value="{{ old('Habitaciones')}}" mb-2>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="GastoAlimentacion" class="form-label">Gasto en alimentacion*</label>
                                    <input type="number" name="GastoAlimentacion" id="GastoAlimentacion" class="form-control" min="0" value="{{ old('GastoAlimentacion')}}" mb-2>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="GastoSalud" class="form-label">Gasto en salud*</label>
                                    <input type="number" name="GastoSalud" id="GastoSalud" class="form-control" min="0" value="{{ old('GastoSalud')}}" mb-2>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="GastoEducacion" class="form-label">Gasto en educación*</label> 
                                    <input type="number" name="GastoEducacion" id="GastoEducacion" class="form-control" min="0" value="{{ old('GastoEducacion')}}" mb-2>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="GastoOtros" class="form-label">Otros gastos*</label>
                                    <input type="number" name="GastoOtros" id="GastoOtros" class="form-control" min="0" value="{{ old('GastoOtros')}}" mb-2>
                                    <input type="hidden" name="GastoTotal" id="GastoTotal" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <textarea name="ObservacionesInspeccion"  rows="2" cols="100" maxlength="100" class="form-control" placeholder="Observaciones" mb-2 value="{{ old('ObservacionesColonia') }}"></textarea>
                                </div>
                                <div class="form-group col-md-3">
                                    <button class="btn btn-primary btn-block" type="submit" onClick="javascript:CalcularGasto();">Agregar</button>
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
                    {{-- Datatable inspecciones --}}
                    <table id="datatable_inspecciones" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Colonia</th>
                                <th>Manzana</th>
                                <th>Lote</th>
                                <th>Posesionario</th>
                                <th>Fecha</th>
                                <th>Uso de la Vivienda</th>
                                <th>Material de la Vivienda</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inspecciones as $inspeccion)
                            <tr>
                                <td>{{$inspeccion->id}}</td>
                                <td>{{strtoupper($inspeccion->asignados->lotes->colonias->NombreColonia)}}</td>
                                <td>{{$inspeccion->asignados->lotes->Manzana}}</td>
                                <td>{{$inspeccion->asignados->lotes->NumLote}}</td>
                                <td>{{strtoupper($inspeccion->asignados->posesionarios->NombrePosesionario)}} {{strtoupper($inspeccion->asignados->posesionarios->ApellidoPaterno)}} {{strtoupper($inspeccion->asignados->posesionarios->ApellidoMaterno)}}</td>
                                <td>{{\Carbon\Carbon::parse($inspeccion->FechaInspeccion)->format('d/m/Y')}}</td>
                                <td>{{$inspeccion->UsoVivienda}}</td>
                                <td>{{$inspeccion->MaterialVivienda}}</td>
                                <td>
                                    @can('inspecciones.show')
                                        <a href="{{route('inspecciones.show', [$inspeccion->id])}}" class="btn btn-info btn-sm">Detalles</a>
                                    @endcan
                                    @can('inspecciones.edit')
                                        <a href="{{route('inspecciones.edit', [$inspeccion->id])}}" class="btn btn-warning btn-sm">Editar</a>
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

    <script type="text/javascript" src="{{ asset('js/materialvivienda.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/gasto.js') }}"></script>
    
    {{-- Confirmación registro eliminado --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session('eliminar') == 'ok')
    <script type="text/javascript" src="{{ asset('js/eliminado.js') }}"></script>
    @endif

@endsection