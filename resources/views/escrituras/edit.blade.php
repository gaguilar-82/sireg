@extends('layouts.plantilla')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection

@section('title', 'SIREG | Escrituras')

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
    @error('directors_id')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('FolioEscritura')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('FechaEscritura')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    <div class="container mx-auto pt-5">
        <div class="bg-gray-200">
            <h1>Escrituras</h1>
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
            <div class="card">
                <div class="card-body">
                    @can('escrituras.update')
                        <form action="{{route('escrituras.update', $escritura)}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="Nombre" class="form-label">Nombre</label>
                                    <input type="text" name="" id="Nombre" class="form-control" mb-2 disabled=true value="{{$escritura->asignados->posesionarios->NombrePosesionario}} {{$escritura->asignados->posesionarios->ApellidoPaterno}} {{$escritura->asignados->posesionarios->ApellidoMaterno}}">
                                    <input type="hidden" name="asignados_id" id="asignados_id" class="form-control" mb-2 value="{{$escritura->asignados->posesionarios_id}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="ClaveContrato" class="form-label">Contrato</label>
                                    <input type="text" name="" id="ClaveContrato" class="form-control" mb-2  disabled=true value="{{$escritura->asignados->ClaveContrato}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="FolioEscritura" class="form-label">Folio de la escritura</label>
                                    <input type="text" name="FolioEscritura" id="FolioEscritura" class="form-control" value="{{$escritura->FolioEscritura}}" mb-2>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="FechaEscritura" class="form-label">Fecha de la escritura</label>
                                    <input type="date" name="FechaEscritura" id="FechaEscritura" class="form-control" value="{{$escritura->FechaEscritura}}" mb-2>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Director" class="form-label">Nombre del Director</label>
                                    <select name="directors_id" id="directors_id" class="form-control">
                                        <option value="">--Seleccione el Director--</option>
                                        @foreach ($directores as $director)
                                            <option value="{{$director['id']}}"  
                                                @if (($escritura->directors_id) == ($director['id']))   
                                                    selected="selected"     
                                                @endif>
                                                {{$director->NombreDirector}} {{$director->ApellidoPaternoDirector}} {{$director->ApellidoMaternoDirector}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="FirmaPosesionario" class="form-label">¿Firmada por el posesionario?</label>
                                    @if($escritura->FirmaPosesionario == NULL)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="FirmaPosesionario" id="FirmaPosesionarioSi" value="Sí">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                            Sí
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="FirmaPosesionario" id="FirmaPosesionarioNo" value="No" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                            No
                                            </label>
                                        </div>
                                    @else
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="FirmaPosesionario" id="FirmaPosesionarioSi" value="Sí" @if($escritura->FirmaPosesionario == "Sí") checked @endif>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                            Sí
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="FirmaPosesionario" id="FirmaPosesionarioNo" value="No" @if($escritura->FirmaPosesionario == "No") checked @endif>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                            No
                                            </label>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="FirmaDirector" class="form-label">¿Firmada por el director?</label>
                                    @if($escritura->FirmaDirector == NULL)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="FirmaDirector" id="FirmaDirectorSi" value="Sí">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                            Sí
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="FirmaDirector" id="FirmaDirectorNo" value="No" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                            No
                                            </label>
                                        </div>
                                    @else
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="FirmaDirector" id="FirmaDirectorSi" value="Sí" @if($escritura->FirmaPosesionario == "Sí") checked @endif>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                            Sí
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="FirmaDirector" id="FirmaDirectorNo" value="No" @if($escritura->FirmaPosesionario == "No") checked @endif>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                            No
                                            </label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="Forma3DCC" class="form-label">¿Tiene Forma 3DCC?</label>
                                    @if($escritura->Forma3DCC == NULL)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Forma3DCC" id="Forma3DCCSi" value="Sí">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                            Sí
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Forma3DCC" id="Forma3DCCNo" value="No" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                            No
                                            </label>
                                        </div>
                                    @else
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Forma3DCC" id="Forma3DCCSi" value="Sí" @if($escritura->FirmaPosesionario == "Sí") checked @endif>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                            Sí
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Forma3DCC" id="orma3DCCrNo" value="No" @if($escritura->FirmaPosesionario == "No") checked @endif>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                            No
                                            </label>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="FechaIngresoRPP" class="form-label">Fecha de ingreso al RPP</label>
                                    <input type="date" name="FechaIngresoRPP" id="FechaIngresoRPP" class="form-control" value="{{$escritura->FechaIngresoRPP}}" mb-2>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="OficioRPP" class="form-label">No. de oficio de ingreso al RPP</label>
                                    <input type="text" name="OficioRPP" id="OficioRPP" class="form-control" value="{{$escritura->OficioRPP}}" mb-2>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="FolioRealElectronico" class="form-label">Folio Real Electrónico asignado</label>
                                    <input type="text" name="FolioRealElectronico" id="FolioRealElectronico" class="form-control" value="{{$escritura->FolioRealElectronico}}" mb-2>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="FechaInscripcionRPP" class="form-label">Fecha de inscripción al RPP</label>
                                    <input type="date" name="FechaInscripcionRPP" id="FechaInscripcionRPP" class="form-control" value="{{$escritura->FechaInscripcionRPP}}" mb-2>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="FechaEntrega" class="form-label">Fecha de entrega al posesionario</label>
                                    <input type="date" name="FechaEntrega" id="FechaEntrega" class="form-control" value="{{$escritura->FechaEntrega}}" mb-2>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="ObservacionesEscritura" class="form-label">Observaciones</label>
                                    <textarea name="ObservacionesEscritura"  rows="2" cols="100" maxlength="100" class="form-control" mb-2>{{$escritura->ObservacionesEscritura}}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <button class="btn btn-primary btn-block" type="submit">Guardar cambios</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <a class="btn btn-secondary btn-block" href="{{route('escrituras.index')}}" role="button">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    @endcan
                    @can('escrituras.destroy')
                        <form action="{{route('escrituras.destroy',[$escritura->id])}}" method="POST" class="d-inline" id="eliminar">
                            @method('DELETE')
                            @csrf
                            <div class="form-group col-md-3">
                                <button class="btn btn-danger btn-block" type="submit">Eliminar</button>
                            </div>
                        </form>
                    @endcan
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

    {{-- SweetAlert Eliminar --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection