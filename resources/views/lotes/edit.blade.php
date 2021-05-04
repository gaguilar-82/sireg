@extends('layouts.plantilla')

@section('css')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

@section('title','Editar Lote')

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
    @error('Croquis')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
<div class="container mx-auto pt-5">
    <div class="bg-gray-200">
        <h1>Editar Lote</h1>

 {{-- Formulario --}}
        <form action="{{route('lotes.update', $lote)}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('put')
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputColonia" class="form-label">Colonia</label>
                    <select name="colonias_id" id="inputColonia" class="form-control">
                        <option value="">--Seleccione la Colonia--</option>
                        @foreach ($colonias as $colonia)
                            <option value="{{$colonia['id']}}" @if (($lote->colonias_id) == ($colonia->id)) selected="selected" @endif>{{$colonia['NombreColonia']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="Macrolote" class="form-label">Macrolote</label>
                    <input type="text" name="Macrolote" class="form-control" mb-2 value="{{$lote->Macrolote}}">
                </div>
                <div class="form-group col-md-2">
                    <label for="Etapa" class="form-label">Etapa</label>
                    <input type="text" name="Etapa" class="form-control" mb-2 value="{{$lote->Etapa}}">
                </div>
                <div class="form-group col-md-2">
                    <label for="Poligono" class="form-label">Polígono</label>
                    <input type="text" name="Poligono" class="form-control" mb-2 value="{{$lote->Poligono}}">
                </div>
                <div class="form-group col-md-2">
                    <label for="Supermanzana" class="form-label">Súpermanzana</label>
                    <input type="text" name="Supermanzana" class="form-control" mb-2 value="{{$lote->Supermanzana}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="Manzana" class="form-label">Manzana</label>
                    <input type="text" id="Manzana" name="Manzana" class="form-control" mb-2 value="{{$lote->Manzana}}" oninput="javascript:procesar();">
                </div>
                <div class="form-group col-md-2">
                    <label for="NumLote" class="form-label">Número de Lote</label>
                    <input type="text" id="NumLote" name="NumLote" class="form-control" mb-2 value="{{$lote->NumLote}}" oninput="javascript:procesar();">
                </div>
                <div class="form-group col-md-2">
                    <label for="Casa" class="form-label">Casa</label>
                    <input type="text" name="Casa" class="form-control" mb-2 value="{{$lote->Casa}}">
                </div>
                <div class="form-group col-md-2">
                    <label for="Superficie" class="form-label">Superficie (m²)</label>
                    <input type="number" name="Superficie" class="form-control" mb-2 value="{{$lote->Superficie}}">
                </div>
                <div class="form-group col-md-1">
                    <label for="Latitud" class="form-label">Latitud</label>
                    <input type="number" name="Latitud" class="form-control" mb-2 value="{{$lote->Latitud}}">
                </div>
                <div class="form-group col-md-1">
                    <label for="Longitud" class="form-label">Longitud</label>
                    <input type="number" name="Longitud" class="form-control" mb-2 value="{{$lote->Longitud}}">
                </div>
                <div class="form-group col-md-2">
                    <label for="CodigoPostal" class="form-label">Código Postal</label>
                    <input type="text" name="CodigoPostal" class="form-control" mb-2 value="{{$lote->CodigoPostal}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="Colindancia1" class="form-label">Colindancia 1</label>
                    <input type="text" name="Colindancia1" class="form-control" mb-2 value="{{$lote->Colindancia1}}">
                </div>
                <div class="form-group col-md-3">
                    <label for="Colindancia2" class="form-label">Colindancia 2</label>
                    <input type="text" name="Colindancia2" class="form-control" mb-2 value="{{$lote->Colindancia2}}">
                </div>
                <div class="form-group col-md-3">
                    <label for="Colindancia3" class="form-label">Colindancia 3</label>
                    <input type="text" name="Colindancia3" class="form-control" mb-2 value="{{$lote->Colindancia3}}">
                </div>
                <div class="form-group col-md-3">
                    <label for="Colindancia4" class="form-label">Colindancia 4</label>
                    <input type="text" name="Colindancia4" class="form-control" mb-2 value="{{$lote->Colindancia4}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="Uso" class="form-label">Uso del predio</label>
                    <select name="Uso" id="Uso" class="form-control">
                        <option value="">--Seleccione el uso del predio--</option>
                        <option value="Habitado" @if ($lote->Uso == 'Habitado') selected="selected" @endif>Habitado</option>
                        <option value="Deshabitado" @if ($lote->Uso == 'Deshabitado') selected="selected" @endif>Deshabitado</option>
                        <option value="Baldio" @if ($lote->Uso == 'Baldio') selected="selected" @endif>Baldio</option>
                        <option value="En construcción" @if ($lote->Uso == 'En construcción') selected="selected" @endif>En construcción</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="AltoRiesgo" class="form-label">¿Está en Zona de Alto Riesgo</label>
                    <select name="AltoRiesgo" id="AltoRiesgo" class="form-control">
                        <option value="">--Seleccione una opción--</option>
                        <option value="Sí" @if ($lote->AltoRiesgo == 'Sí') selected="selected" @endif>Sí</option>
                        <option value="No" @if ($lote->AltoRiesgo == 'No') selected="selected" @endif>No</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="Afectacion" class="form-label">¿Tiene afectación?</label>
                    <select name="Afectacion" id="Afectacion" class="form-control">
                        <option value="">--Seleccione una opción--</option>
                        <option value="Sí" @if ($lote->Afectacion == 'Sí') selected="selected" @endif>Sí</option>
                        <option value="No" @if ($lote->Afectacion == 'No') selected="selected" @endif>No</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="Subdivision" class="form-label">¿Está subdividido?</label>
                    <select name="Subdivision" id="Subdivision" class="form-control">
                        <option value="">--Seleccione una opción--</option>
                        <option value="Sí" @if ($lote->Subdivision == 'Sí') selected="selected" @endif>Sí</option>
                        <option value="No" @if ($lote->Subdivision == 'No') selected="selected" @endif>No</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="Fusion" class="form-label">¿Está fusionado?</label>
                    <select name="Fusion" id="Fusion" class="form-control">
                        <option value="">--Seleccione una opción--/option>
                        <option value="Sí" @if ($lote->Fusion == 'Sí') selected="selected" @endif>Sí</option>
                        <option value="No" @if ($lote->Fusion == 'No') selected="selected" @endif>No</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="Actualizacion" class="form-label">¿Se ha actualizado?</label>
                    <select name="Actualizacion" id="Actualizacion" class="form-control">
                        <option value="">--Seleccione una opción--</option>
                        <option value="Sí" @if ($lote->Actualizacion == 'Sí') selected="selected" @endif>Sí</option>
                        <option value="No" @if ($lote->Actualizacion == 'No') selected="selected" @endif>No</option>
                    </select>
                </div>                   
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="ObservacionesLote" class="form-label">Observaciones</label>
                    <textarea name="ObservacionesLote" rows="4" cols="100" maxlength="100" class="form-control" mb-2>{{$lote->ObservacionesLote}}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="ConflictoLegal" class="form-label">Conflicto legal</label>
                    <textarea name="ConflictoLegal" rows="4" cols="100" maxlength="100" class="form-control" mb-2>{{$lote->ConflictoLegal}}</textarea>
                </div>
            </div>  
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="hidden" id ="ClaveColonia" value="{{$lote->ClaveLote}}">
                    <input type="hidden" id ="clavelote" value="" name="ClaveLote">
                </div>
                <div class="input-group col-md-4">
                    <label for="Croquis"><strong>Croquis</strong></label>
                    <input type="file" name="Croquis" id="Croquis" accept="image/png">
                </div> 
            </div>  
            <div class="form-row">
                <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" onClick="javascript:procesar();">Guardar cambios</button>
                    <a class="btn btn-secondary" href="{{route('lotes.index')}}" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    {{-- Generador Clave Unica de Lote --}}
    <script type="text/javascript" src="{{ asset('js/clavelote.js') }}"></script>

@endsection