@extends('layouts.plantilla')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css">
@endsection

@section('Title', 'Colonias')


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
@error('NombreColonia')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror
@error('TipoColonia')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror
@error('municipios_id')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror
@error('ClaveColonia')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror
@error('ValorMetroCuadrado')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror
    <div class="container mx-auto pt-5">
        @can('colonias.store')
        <div class="bg-gray-200">
            <h1>Colonias</h1>
    
    {{-- Formulario --}}
            @php $del=""@endphp
            <form action="{{route('colonias.store')}}" onSubmit="javascript:procesar();" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="NombreColonia" class="form-label">Colonia</label>
                        <input type="text" name="NombreColonia" placeholder="Nombre de la Colonia" class="form-control mb-2" value="{{ old('NombreColonia') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="TipoColonia" class="form-label">Tipo de Colonia</label>
                        <select name="TipoColonia" id="TipoColonia" class="form-control">
                            <option value="">--Seleccione el tipo de colonia--</option>
                            <option value='Patrimonio INVISUR' @if (old('TipoColonia') == 'Patrimonio INVISUR') selected="selected" @endif>Patrimonio INVISUR</option>
                            <option value="Patrimonio CRETT" @if (old('TipoColonia') == 'Patrimonio CRETT') selected="selected" @endif>Patrimonio CRETT</option>
                            <option value="Barrios Históricos" @if (old('TipoColonia') == 'Barrios Históricos') selected="selected" @endif>Barrios Históricos</option>
                            <option value="Donación Condicional" @if (old('TipoColonia') == 'Donación Condicional') selected="selected" @endif>Donación Condicional</option>
                            <option value="Parque Nacional El Veladero" @if (old('TipoColonia') == 'Parque Nacional El Veladero') selected="selected" @endif>Parque Nacional El Veladero</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="municipios_id" class="form-label">Municipio</label>
                        <select name="municipios_id" id="municipios_id" class="form-control">
                            <option value="">--Seleccione el Municipio--</option>
                            @foreach ($municipios as $municipio)
                                <option value="{{$municipio['id']}}"  
                                    @if (old('municipios_id') == ($municipio['id']))   
                                        selected="selected"     
                                    @endif>
                                    {{$municipio->NombreMunicipio}} 
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="ParcialColonia" class="form-label">Clave de Colonia</label>
                        <input type="text" name="ParcialColonia" id="ParcialColonia" placeholder="Clave" class="form-control" style="text-transform:uppercase" mb-2 value="{{ old('ParcialColonia') }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="ValorMetroCuadrado" class="form-label">Valor por metro cuadrado</label>
                        <input type="number" name="ValorMetroCuadrado" placeholder="Valor por Metro Cuadrado" class="form-control" mb-2 min="0" value="{{ old('ValorMetroCuadrado') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">                       
                        <input type="hidden" id ="ClaveColonia" value="" name="ClaveColonia">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="TituloPropiedad" class="form-label">Antecedentes del Título de Propiedad</label>
                        <textarea name="TituloPropiedad" placeholder="Titulo de Propiedad" style="text-transform:uppercase;" class="form-control" mb-2 value="{{ old('TituloPropiedad') }}"  onkeyup="javascript:this.value=this.value.toUpperCase();" rows="4" cols="100" maxlength="1000"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Lotificacion" class="form-label">Antecedentes de Lotificación</label>
                        <textarea name="Lotificacion" placeholder="Lotificación" style="text-transform:uppercase;" class="form-control" mb-2 value="{{ old('Lotificacion') }}"  onkeyup="javascript:this.value=this.value.toUpperCase();" rows="4" cols="100" maxlength="1000"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="SuperficieAdquirida" class="form-label">Antecedentes de la Superficie Adquirida</label>
                        <textarea name="SuperficieAdquirida" placeholder="Superficie Adquirida" style="text-transform:uppercase;" class="form-control" mb-2 value="{{ old('SuperficieAdquirida') }}"  onkeyup="javascript:this.value=this.value.toUpperCase();" rows="4" cols="100" maxlength="1000"></textarea>
                    </div>   
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="ObservacionesColonia" class="form-label">Observaciones</label>
                        <textarea name="ObservacionesColonia" placeholder="Observaciones" rows="4" cols="100" maxlength="100" class="form-control" mb-2 value="{{ old('ObservacionesColonia') }}"></textarea>
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
        @endcan
    {{-- Datatable --}}
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Colonia</th>
                            <th>Tipo de colonia</th>
                            <th>Municipio</th>
                            <th>Valor por m²</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($colonias as $colonia)
                        <tr>
                            <td>{{$colonia->id}}</td>
                            <td>{{$colonia->NombreColonia}}</td>
                            <td>{{$colonia->TipoColonia}}</td>
                            <td>{{$colonia->municipios->NombreMunicipio}}</td>
                            <td>${{number_format($colonia->ValorMetroCuadrado,2,'.',',')}}</td>
                            <td>
                                @can('colonias.show')
                                <a href="{{route('colonias.show', [$colonia->id])}}" class="btn btn-info btn-sm">Detalles</a>
                                @endcan
                                @can('colonias.edit')
                                <a href="{{route('colonias.edit', [$colonia->id])}}" class="btn btn-warning btn-sm">Editar</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{-- Generador de Clave de Colonia --}}
    <script type="text/javascript" src="{{ asset('js/clavecolonia.js') }}"></script>

    {{-- Datatable --}}
    <script type="text/javascript" src="{{ asset('js/datatable.js') }}"></script>   

    {{-- Confirmación registro eliminado --}}
    @if (session('eliminar') == 'ok')
        <script type="text/javascript" src="{{ asset('js/eliminado.js') }}"></script>
    @endif
    
@endsection