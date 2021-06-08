@extends('layouts.plantilla')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    
    
    {{-- Datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection

@section('title', 'SIREG | Posesionarios')

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
    @error('NombrePosesionario')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('ApellidoPaterno')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('ApellidoMaterno')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('CURP')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('LugarNacimiento')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('FechaNacimiento')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('EstadoCivil')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('Ocupacion')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('Telefono')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    <div class="container mx-auto pt-5">
        <h1>Posesionarios</h1>
        <div class="bg-gray-200">
            {{-- Formulario --}}
            @can('posesionarios.store')
                <form action="{{route('posesionarios.store')}}" name="formularioposesionarios" enctype="multipart/form-data" method="POST" onSubmit="javascript:ec();">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="NombrePosesionario" class="form-label">Nombre(s)</label>
                            <input type="text" name="NombrePosesionario" placeholder="Nombre(s)" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('NombrePosesionario')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ApellidoPaterno" class="form-label">Apellido paterno</label>
                            <input type="text" name="ApellidoPaterno" placeholder="Apellido paterno" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('ApellidoPaterno')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ApellidoMaterno" class="form-label">Apellido materno</label>
                            <input type="text" name="ApellidoMaterno" placeholder="Apellido materno" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('ApellidoMaterno')}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="CURP" class="form-label">CURP</label>
                            <input type="text" name="CURP" placeholder="CURP" id="CURP" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('CURP')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="LugarNacimiento" class="form-label">Lugar de nacimiento</label>
                            <input type="text" name="LugarNacimiento" placeholder="Lugar de nacimiento" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('LugarNacimiento')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="FechaNacimiento" class="form-label">Fecha de nacimiento</label>
                            <input type="date" name="FechaNacimiento" placeholder="Fecha de nacimiento" class="date form-control" id="FechaNacimiento" mb-2 style="text-transform:uppercase;" value="{{ old('FechaNacimiento')}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="EstadoCivil" class="form-label">Estado civil</label>
                            <select name="" id="EstadoCivil" class="form-control" onChange="javascript:ec();">
                                <option value="">--Seleccione el estado civil--</option>
                                <option value="SOLTERO" @if (old('EstadoCivil') == 'SOLTERO' || old('EstadoCivil') == 'SOLTERA') selected="selected" @endif>SOLTERO(A)</option>
                                <option value="CASADO" @if (old('EstadoCivil') == 'CASADO' || old('EstadoCivil') == 'CASADA') selected="selected" @endif>CASADO(A)</option>
                                <option value="VIUDO" @if (old('EstadoCivil') == 'VIUDO' || old('EstadoCivil') == 'VIUDA') selected="selected" @endif>VIUDO(A)</option>
                                <option value="DIVORCIADO" @if (old('EstadoCivil') == 'DIVORCIADO' || old('EstadoCivil') == 'DIVORCIADA') selected="selected" @endif>DIVORCIADO(A)</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Ocupacion" class="form-label">Ocupación</label>
                            <input type="text" name="Ocupacion" placeholder="Ocupación" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('Ocupacion')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Telefono" class="form-label">Teléfono</label>
                            <input type="tel" name="Telefono" placeholder="Teléfono" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('Telefono')}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <input type="hidden" name="" placeholder="" id="sexo" class="form-control" mb-2 value="">
                        </div>            
                        <div class="form-group col-md-4">
                            <input type="hidden" name="EstadoCivil" placeholder="" id="civil" class="form-control" mb-2 value="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="ObservacionesPosesionario" class="form-label">Observaciones</label>
                            <textarea name="ObservacionesPosesionario" placeholder="Observaciones" rows="4" cols="100" maxlength="100" class="form-control" mb-2 style="text-transform:uppercase;" value="{{ old('ObservacionesPosesionario') }}"></textarea>
                        </div>
                    </div>
                    <div class="form-row">              
                        <div class="input-group col-md-4">
                            <label for="ActaNacimiento"><strong>Acta de nacimiento del posesionario</strong></label>
                            <input type="file" name="ActaNacimiento" id="ActaNacimiento" accept="application/pdf">
                        </div>
                        <div class="input-group col-md-4">
                            <label for="ActaMatrimonio"><strong>Acta de matrimonio del posesionario</strong></label>
                            <input type="file" name="ActaMatrimonio" id="ActaMatrimonio" accept="application/pdf">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-group col-md-4">
                            <label for="ActaHijos"><strong>Acta de nacimiento de sus hijos</strong></label>
                            <input type="file" name="ActaHijos" id="ActaHijos" accept="application/pdf">
                        </div>
                        <div class="input-group col-md-4">
                            <label for="IdentificacionOficial"><strong>Identificación oficial con fotografía</strong></label>
                            <input type="file" name="IdentificacionOficial" id="IdentificacionOficial" accept="application/pdf">
                        </div>
                    </div>
                    <div class="form-row">              
                        <div class="input-group col-md-4">
                            <label for="ComprobanteDomicilio"><strong>Comprobante de domicilio</strong></label>
                            <input type="file" name="ComprobanteDomicilio" id="ComprobanteDomicilio" accept="application/pdf">
                        </div>
                        <div class="input-group col-md-4">
                            <label for="ConstanciaNoPropiedad"><strong>Constancia de no propiedad</strong></label>
                            <input type="file" name="ConstanciaNoPropiedad" id="ConstanciaNoPropiedad" accept="application/pdf">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-group col-md-4">
                            <label for="ConstanciaSolteria"><strong>Constancia de solteria</strong></label>
                            <input type="file" name="ConstanciaSolteria" id="ConstanciaSolteria" accept="application/pdf">
                        </div>
                        <div class="input-group col-md-4">
                            <label for="PoderNotarial"><strong>Poder notarial</strong></label>
                            <input type="file" name="PoderNotarial" id="PoderNotarial" accept="application/pdf">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                        </div>
                        <div class="form-group col-md-2">
                            <button class="btn btn-secondary btn-block" type="reset">Limpiar formulario</button>
                        </div>
                    </div>
                </form>
            @endcan
            {{-- Datatable --}}
            <div class="card">
                <div class="card-body">
                    <table id="datatable_posesionarios" class="table table-striped table-bordered">
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
                                <td>{{$posesionario->id}}</td>
                                <td>{{$posesionario->NombrePosesionario}} {{$posesionario->ApellidoPaterno}} {{$posesionario->ApellidoMaterno}}</td>
                                <td>{{$posesionario->CURP}}</td>
                                <td>{{$posesionario->Telefono}}</td>
                                <td>
                                    @can('posesionarios.show')
                                        <a href="{{route('posesionarios.show', [$posesionario->id])}}" class="btn btn-info btn-sm">Detalles</a>
                                    @endcan
                                    @can('posesionarios.edit')
                                        <a href="{{route('posesionarios.edit', [$posesionario->id])}}" class="btn btn-warning btn-sm">Editar</a>
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

    <script type="text/javascript" src="{{ asset('js/datatable.js') }}"></script> 
    
    {{-- Confirmación registro eliminado --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session('eliminar') == 'ok')
    <script type="text/javascript" src="{{ asset('js/eliminado.js') }}"></script>
    @endif


    {{-- Obtención de sexo --}}
    <script type="text/javascript" src="{{ asset('js/sexo.js') }}"></script>

    {{-- Cerrar alertas --}}
    <script>
        $(".alert").alert('close')
    </script>

@endsection