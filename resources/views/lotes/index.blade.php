@extends('layouts.plantilla')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection

@section('title', 'SIREG | Lotes')

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
    @error('ClaveLote')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('colonias_id')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('Manzana')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('NumLote')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('Superficie')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('Colindancia1')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('Colindancia2')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('Colindancia3')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('Colindancia4')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('Croquis')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    <div class="container mx-auto pt-5">
        <h1>Lotes</h1>
        <div class="bg-gray-200">
            {{-- Formulario --}}
            @can('lotes.store')
                <form action="{{route('lotes.store')}}" name="formulariolotes" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputColonia" class="form-label">Colonia*</label>
                            <select name="colonias_id" id="colonias_id" class="form-control">
                                <option value="">--Seleccione la Colonia--</option>
                                @foreach ($colonias as $colonia)
                                    <option value="{{$colonia['id']}}" @if (old('colonias_id') == ($colonia['id'])) selected="selected" @endif>{{strtoupper($colonia->NombreColonia)}} - {{$colonia->municipios->Delegacion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Macrolote" class="form-label">Macrolote</label>
                            <input type="text" name="Macrolote" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('Macrolote') }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Etapa" class="form-label">Etapa</label>
                            <input type="text" name="Etapa" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('Etapa') }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Poligono" class="form-label">Pol??gono</label>
                            <input type="text" name="Poligono" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('Poligono') }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Supermanzana" class="form-label">S??permanzana</label>
                            <input type="text" name="Supermanzana" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('Supermanzana') }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="Manzana" class="form-label">Manzana*</label>
                            <input type="text" name="Manzana" id="Manzana" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('Manzana') }}" onChange="javascript:procesar();">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="NumLote" class="form-label">N??mero de Lote*</label>
                            <input type="text" name="NumLote" id="NumLote" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('NumLote') }}" onChange="javascript:procesar();">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Casa" class="form-label">Casa</label>
                            <input type="text" name="Casa" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('Casa') }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Superficie" class="form-label">Superficie (m??)*</label>
                            <input type="number" name="Superficie" class="form-control" mb-2 min="0" style="text-transform:uppercase;" value="{{ old('Superficie') }}">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="Latitud" class="form-label">Latitud</label>
                            <input type="number" name="Latitud" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('Latitud') }}">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="Longitud" class="form-label">Longitud</label>
                            <input type="number" name="Longitud" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('Longitud') }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="CodigoPostal" class="form-label">C??digo Postal</label>
                            <input type="text" name="CodigoPostal" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('CodigoPostal') }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="Colindancia1" class="form-label">Colindancia 1*</label>
                            <input type="text" name="Colindancia1" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('Colindancia1') }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="Colindancia2" class="form-label">Colindancia 2*</label>
                            <input type="text" name="Colindancia2" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('Colindancia2') }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="Colindancia3" class="form-label">Colindancia 3*</label>
                            <input type="text" name="Colindancia3" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('Colindancia3') }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="Colindancia4" class="form-label">Colindancia 4*</label>
                            <input type="text" name="Colindancia4" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('Colindancia4') }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Uso" class="form-label">Uso del predio</label>
                            <select name="Uso" id="Uso" class="form-control">
                                <option value="">--Seleccione el uso del predio--</option>
                                <option value="HABITADO" @if (old('Uso') == 'HABITADO') selected="selected" @endif>HABITADO</option>
                                <option value="DESHABITADO" @if (old('Uso') == 'DESHABITADO') selected="selected" @endif>DESHABITADO</option>
                                <option value="BALD??O" @if (old('Uso') == 'BALD??O') selected="selected" @endif>BALD??O</option>
                                <option value="EN CONSTRUCCI??N" @if (old('Uso') == 'EN CONSTRUCCI??N') selected="selected" @endif>EN CONSTRUCCI??N</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="AltoRiesgo" class="form-label">??Est?? en Zona de Alto Riesgo?</label>
                            <select name="AltoRiesgo" id="AltoRiesgo" class="form-control">
                                <option value="">--Elija una opci??n--</option>
                                <option value="S??" @if (old('AltoRiesgo') == 'S??') selected="selected" @endif>S??</option>
                                <option value="NO" @if (old('AltoRiesgo') == 'No') selected="selected" @endif>NO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Afectacion" class="form-label">??Tiene afectaci??n?</label>
                            <select name="Afectacion" id="Afectacion" class="form-control">
                                <option value="">--Elija una opci??n--</option>
                                <option value="S??" @if (old('Afectacion') == 'S??') selected="selected" @endif>S??</option>
                                <option value="NO" @if (old('Afectacion') == 'NO') selected="selected" @endif>NO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Subdivision" class="form-label">??Est?? subdividido?</label>
                            <select name="Subdivision" id="Subdivision" class="form-control">
                                <option value="">--Elija una opci??n--</option>
                                <option value="S??" @if (old('Subdivision') == 'S??') selected="selected" @endif>S??</option>
                                <option value="NO" @if (old('Subdivision') == 'NO') selected="selected" @endif>NO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Fusion" class="form-label">??Est?? fusionado?</label>
                            <select name="Fusion" id="Fusion" class="form-control">
                                <option value="">--Elija una opci??n--</option>
                                <option value="S??" @if (old('Fusion') == 'S??') selected="selected" @endif>S??</option>
                                <option value="NO" @if (old('Fusion') == 'NO') selected="selected" @endif>NO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Actualizacion" class="form-label">??Se ha actualizado?</label>
                            <select name="Actualizacion" id="Actualizacion" class="form-control">
                                <option value="">--Elija una opci??n--</option>
                                <option value="S??" @if (old('Actualizacion') == 'S??') selected="selected" @endif>S??</option>
                                <option value="NO" @if (old('Actualizacion') == 'NO') selected="selected" @endif>NO</option>
                            </select>
                        </div>                   
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ObservacionesLote" class="form-label">Observaciones</label>
                            <textarea name="ObservacionesLote" rows="4" cols="100" maxlength="100" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('ObservacionesLote') }}"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ConflictoLegal" class="form-label">Conflicto legal</label>
                            <textarea name="ConflictoLegal" rows="4" cols="100" maxlength="100" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('ConflictoLegal') }}"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="hidden" id ="clavelote" value="" name="ClaveLote">
                        </div>
                        <div class="input-group col-md-4">
                            <label for="Croquis">Croquis</label>
                            <input type="file" name="Croquis" id="Croquis" accept="image/png">
                        </div> 
                    </div>   
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <button class="btn btn-primary btn-block" type="submit" onClick="javascript:procesar();">Agregar</button>
                        </div>
                        <div class="form-group col-md-2">
                            <button class="btn btn-secondary btn-block" type="reset">Limpiar formulario</button>
                        </div>
                    </div>              
                </form>
            @endcan
        </div>
        
        {{-- Datatable --}}
        <div class="card">
            <div class="card-body">
                <table id="datatable_lotes" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Colonia</th>
                            <th>Manzana</th>
                            <th>Lote</th>
                            <th>Superficie</th>
                            <th>Valor por m??</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lotes as $lote)
                        <tr>
                            <td>{{$lote->id}}</td>
                            <td>{{strtoupper($lote->colonias->NombreColonia)}}</td>
                            <td>{{$lote->Manzana}}</td>
                            <td>{{$lote->NumLote}}</td>
                            <td>{{number_format($lote->Superficie,2,'.',',')}}m??</td>
                            <td>${{number_format($lote->colonias->ValorMetroCuadrado,2,'.','.')}}</td>
                            <td>
                                @can('lotes.show')
                                    <a href="{{route('lotes.show', $lote->id)}}" class="btn btn-info btn-sm">Detalles</a>
                                @endcan
                                @can('lotes.edit')
                                    <a href="{{route('lotes.edit', [$lote->id])}}" class="btn btn-warning btn-sm">Editar</a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    

    {{-- Generador Clave Unica de Lote --}}
    <script type="text/javascript" src="{{ asset('js/clavelote.js') }}"></script>

    {{-- Datatable --}}
    <script type="text/javascript" src="{{ asset('js/datatable.js') }}"></script>   
    
    {{-- Confirmaci??n registro eliminado --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session('eliminar') == 'ok')
        <script type="text/javascript" src="{{ asset('js/eliminado.js') }}"></script>
    @endif

@endsection