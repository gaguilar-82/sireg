@extends('layouts.plantilla')

@section('css')

@section('title','SIREG | Editar Colonia')

@section('Content')
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
  <div class="bg-gray-200">
    <h1>Editar Colonia</h1>
    @can('colonias.update')
      <form action="{{route('colonias.update', $colonia)}}" onSubmit="javascript:procesar();" method="POST">
          @csrf
          @method('put')
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="NombreColonia" class="form-label">Colonia</label>
              <input type="text" name="NombreColonia" placeholder="Colonia" class="form-control mb-2" style="text-transform:uppercase;" value="{{old('NombreColonia', $colonia->NombreColonia)}}">
            </div>
            <div class="form-group col-md-6">
              <label for="inputTipoColonia" class="form-label">Tipo de Colonia</label>
              <select name="TipoColonia" id="inputTipoColonia" class="form-control">
                  <option value="">--Seleccione el tipo de colonia--</option>
                  <option value="PATRIMONIO INVISUR" @if ($colonia->TipoColonia == 'PATRIMONIO INVISUR') selected="selected" @endif>PATRIMONIO INVISUR</option>
                  <option value="PATRIMONIO CRETT" @if ($colonia->TipoColonia == 'PATRIMONIO CRETT') selected="selected" @endif>PATRIMONIO CRETT</option>
                  <option value="BARRIOS HISTÓRICOS" @if ($colonia->TipoColonia == 'BARRIOS HISTÓRICOS') selected="selected" @endif>BARRIOS HISTÓRICOS</option>
                  <option value="DONACIÓN CONDICIONAL" @if ($colonia->TipoColonia == 'DONACIÓN CONDICIONAL') selected="selected" @endif>DONACIÓN CONDICIONAL</option>
                  <option value="Parque Nacional El VeladPARQUE NACIONAL EL VELADERO" @if ($colonia->TipoColonia == 'PARQUE NACIONAL EL VELADERO') selected="selected" @endif>Parque Nacional El VeladPARQUE NACIONAL EL VELADERO</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputMunicipio" class="form-label">Municipio</label>
              <select name="municipios_id" id="inputMunicipio" class="form-control">
                  <option value="">--Seleccione el Municipio--</option>
                    @foreach ($municipios as $municipio)
                      <option value="{{$municipio['id']}}" @if (($colonia->municipios_id) == ($municipio->id)) selected="selected" @endif>{{$municipio['NombreMunicipio']}}</option>
                    @endforeach
              </select>
            </div>       
            <div class="form-group col-md-3">
              <label for="ClaveColonia" class="form-label">Clave de Colonia</label>
              <input type="text" name="ClaveColonia" placeholder="Clave" class="form-control" style="text-transform:uppercase" mb-2 value="{{$colonia->ClaveColonia}}">
            </div>
            <div class="form-group col-md-3">
              <label for="ValorMetroCuadrado" class="form-label">Valor por metro cuadrado</label>
              <input type="text" name="ValorMetroCuadrado" placeholder="Valor por Metro Cuadrado" class="form-control" mb-2 value="{{$colonia->ValorMetroCuadrado}}">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
                <label for="TituloPropiedad" class="form-label">Antecedentes del Título de Propiedad</label>
                <textarea name="TituloPropiedad" placeholder="Titulo de Propiedad" style="text-transform:uppercase;" class="form-control" mb-2  onkeyup="javascript:this.value=this.value.toUpperCase();" rows="4" cols="100" maxlength="1000">{{$colonia->TituloPropiedad}}</textarea>
            </div>
            <div class="form-group col-md-4">
                <label for="Lotificacion" class="form-label">Antecedentes de Lotificación</label>
                <textarea name="Lotificacion" placeholder="Lotificación" style="text-transform:uppercase;" class="form-control" mb-2 onkeyup="javascript:this.value=this.value.toUpperCase();" rows="4" cols="100" maxlength="1000">{{$colonia->Lotificacion}}</textarea>
            </div>
            <div class="form-group col-md-4">
                <label for="SuperficieAdquirida" class="form-label">Antecedentes de la Superficie Adquirida</label>
                <textarea name="SuperficieAdquirida" placeholder="Superficie Adquirida" style="text-transform:uppercase;" class="form-control" mb-2  onkeyup="javascript:this.value=this.value.toUpperCase();" rows="4" cols="100" maxlength="1000">{{$colonia->SuperficieAdquirida}}</textarea>
            </div>   
        </div>
          <div class="form-row">
            <div class="form-group col-md-9">
                <label for="ObservacionesColonia" class="form-label">Observaciones</label>
                <textarea name="ObservacionesColonia" placeholder="Observaciones" rows="4" cols="100" maxlength="100" class="form-control" mb-2 style="text-transform:uppercase;" >{{ $colonia->ObservacionesColonia}}</textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3">
              <button class="btn btn-primary" type="submit">Guardar cambios</button>
              <a class="btn btn-secondary" href="{{route('colonias.index')}}" role="button">Cancelar</a>
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
  
@endsection