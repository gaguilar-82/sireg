@extends('layouts.plantilla')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    {{-- Datepicker --}}
    <link href = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel = "stylesheet" >
@endsection

@section('Title', 'Posesionarios')

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
        <h1>Editar Posesionario</h1>
        <div class="bg-gray-200">
            {{-- Formulario --}}
            @can('posesionarios.update')
                <form action="{{route('posesionarios.update', $posesionario)}}" name="formularioposesionarios" enctype="multipart/form-data" method="POST" onSubmit="javascript:ec();">
                    @csrf
                    @method('put')
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <input type="text" name="NombrePosesionario" placeholder="Nombre(s)" class="form-control" mb-2 style="text-transform:uppercase;" value="{{$posesionario->NombrePosesionario}}">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="ApellidoPaterno" placeholder="Apellido paterno" class="form-control" mb-2 style="text-transform:uppercase;" value="{{$posesionario->ApellidoPaterno}}">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="ApellidoMaterno" placeholder="Apellido materno" class="form-control" mb-2 style="text-transform:uppercase;" value="{{$posesionario->ApellidoMaterno}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <input type="text" name="CURP" placeholder="CURP" id="CURP" class="form-control" mb-2 style="text-transform:uppercase;" value="{{$posesionario->CURP}}">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="LugarNacimiento" placeholder="Lugar de nacimiento" class="form-control" mb-2 style="text-transform:uppercase;" value="{{$posesionario->LugarNacimiento}}">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="FechaNacimiento" placeholder="Fecha de nacimiento" class="date form-control" id="datetimepicker" mb-2 style="text-transform:uppercase;" value="{{$posesionario->FechaNacimiento}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <select name="" id="EstadoCivil" class="form-control" onChange="javascript:ec();">
                                <option value="">--Seleccione el estado civil--</option>
                                <option value="SOLTERO" @if (($posesionario->EstadoCivil) == 'SOLTERO' || ($posesionario->EstadoCivil) == 'SOLTERA') selected="selected" @endif>SOLTERO(A)</option>
                                <option value="CASADO" @if (($posesionario->EstadoCivil) == 'CASADO' || ($posesionario->EstadoCivil) == 'CASADA') selected="selected" @endif>CASADO(A)</option>
                                <option value="VIUDO" @if (($posesionario->EstadoCivil) == 'VIUDO' || ($posesionario->EstadoCivil) == 'VIUDA') selected="selected" @endif>VIUDO(A)</option>
                                <option value="DIVORCIADO" @if (($posesionario->EstadoCivil) == 'DIVORCIADO' || ($posesionario->EstadoCivil) == 'DIVORCIADA') selected="selected" @endif>DIVORCIADO(A)</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="Ocupacion" placeholder="Ocupación" class="form-control" mb-2 value="{{$posesionario->Ocupacion}}">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="Telefono" placeholder="Teléfono" class="form-control" mb-2 value="{{$posesionario->Telefono}}">
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
                            <textarea name="ObservacionesPosesionario" placeholder="Observaciones" rows="4" cols="100" maxlength="100" class="form-control" mb-2>{{$posesionario->ObservacionesPosesionario}}</textarea>
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
                            <label for="ConstanciaSolteria"><strong>Poder notarial</strong></label>
                            <input type="file" name="PoderNotarial" id="PoderNotarial" accept="application/pdf">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <button class="btn btn-primary" type="submit" id="guardar">Guardar cambios</button>
                        </div>
                        <div class="form-group col-md-2">
                            <a class="btn btn-secondary btn-block" href="{{route('posesionarios.index')}}" role="button">Cancelar</a>
                        </div>
                    </div>
                </form>
            @endcan
        </div>
    </div>
@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    {{-- Datepicker --}}
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js" > </script> 
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js" > </script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/locales/bootstrap-datepicker.es.min.js"> </script>

    <script type="text/javascript" src="{{ asset('js/fecha.js') }}"></script>

    {{-- Obtención de sexo --}}
    <script type="text/javascript" src="{{ asset('js/sexo.js') }}"></script>

    {{-- Cerrar alertas --}}
    <script>
        $(".alert").alert('close')
    </script>

@endsection