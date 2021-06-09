@extends('layouts.plantilla')

@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
@section('title','SIREG | Posesionario')

@section('Content')

<div class="container mx-auto pt-5">
    <div class="bg-gray-200">    
        @if ( session('mensaje') )
            <div class="alert alert-success">{{ session('mensaje') }}</div>
        @endif
        <div class="card text-center">
            <div class="card-header">
                <h4>{{strtoupper($posesionario->NombrePosesionario)}} {{strtoupper($posesionario->ApellidoPaterno)}} {{strtoupper($posesionario->ApellidoMaterno)}}</h4>
                <h5>{{strtoupper($posesionario->CURP)}}</h5>
            </div>
            <div class="card-body">
                <p><strong>Lugar de nacimiento: </strong>{{$posesionario->LugarNacimiento}}</p>
                <p><strong>Fecha de nacimiento: </strong>{{\Carbon\Carbon::parse($posesionario->FechaNacimiento)->format('d/m/Y')}}</p>
                <p><strong>Estado civil: </strong>{{($posesionario->EstadoCivil)}}</p>
                <p><strong>Ocupacion: </strong>{{$posesionario->Ocupacion}}</p>
                <p><strong>Telefono: </strong>{{$posesionario->Telefono}}</p>
                <p><strong>Observaciones: </strong>{{$posesionario->ObservacionesPosesionario}}</p>                
                <p>
                    <div class="btn-group" role="group" aria-label="Documentos">
                        @if(($posesionario->ActaNacimiento) != NULL) 
                            <button type="button" class="btn btn-primary" id="btnActaNac" data-toggle="modal" data-target="#Modal1">Acta de Nacimiento ✓</button>
                        @endif
                        @if(($posesionario->ActaMatrimonio) != NULL)
                            <button type="button" class="btn btn-primary" id="btnActaMat" data-toggle="modal" data-target="#Modal2">Acta de Matrimonio ✓</button>
                        @endif
                        @if(($posesionario->ActaHijos) != NULL)
                            <button type="button" class="btn btn-primary" id="btnActaHijos" data-toggle="modal" data-target="#Modal3">Acta de Nacimiento de sus Hijos ✓</button>
                        @endif
                        @if(($posesionario->IdentificacionOficial) != NULL)
                            <button type="button" class="btn btn-primary" id="btnId" data-toggle="modal" data-target="#Modal4">Identificacion Oficial ✓</button>
                        @endif
                        @if(($posesionario->ComprobanteDomicilio) != NULL)
                            <button type="button" class="btn btn-primary" id="btnCompDom" data-toggle="modal" data-target="#Modal5">Comprobante de Domicilio ✓</button>
                        @endif
                        @if(($posesionario->ConstanciaNoPropiedad) != NULL)
                            <button type="button" class="btn btn-primary" id="btnConstNoProp" data-toggle="modal" data-target="#Modal6">Constancia de No Propiedad ✓</button>
                        @endif
                        @if(($posesionario->ConstanciaSolteria) != NULL)
                            <button type="button" class="btn btn-primary" id="btnConstSolt" data-toggle="modal" data-target="#Modal7">Constancia de Soltería ✓</button>
                        @endif
                    </div>
                </p>
                @can('posesionarios.edit')
                    <a href="{{route('posesionarios.edit', $posesionario)}}" class="btn btn-warning editar">Editar Posesionario</a>
                @endcan
                @can('posesionarios.index')
                    <a href="{{route('posesionarios.index')}}" class="btn btn-info">Regresar a Posesionarios</a>
                @endcan
                @can('posesionarios.destroy')
                    <form action="{{route('posesionarios.destroy',[$posesionario->id])}}" method="POST" class="d-inline eliminar" id="eliminar" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                @endcan
            </div>
            <div class="card-footer text-muted">
                @if($posesionario->created_at == $posesionario->updated_at)
                    <p>Fecha de creación: {{$posesionario->created_at->diffForHumans()}}</p>
                    <p>Creado por: {{$posesionario->users->name}}</p>
                @elseif ($posesionario->created_at != $posesionario->updated_at)
                    <p>Fecha de actualización: {{$posesionario->updated_at->diffForHumans()}}</p> 
                    <p>Editado por: {{$posesionario->users->name}}</p>   
                @endif
            </div>
          </div>
        </div>
    </div>
</div>
{{-- Modal --}}
<div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="TituloVentana" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Acta de nacimiento</h5>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe width="600" height="800" name="iframe" src="{{asset($posesionario->ActaNacimiento)}}"></iframe>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="TituloVentana" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Acta de matrimonio</h5>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe width="600" height="800" name="iframe" src="{{asset($posesionario->ActaMatrimonio)}}"></iframe>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="TituloVentana" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Acta de nacimiento de los hijos</h5>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe width="600" height="800" name="iframe" src="{{asset($posesionario->ActaHijos)}}"></iframe>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modal4" tabindex="-1" role="dialog" aria-labelledby="TituloVentana" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Identificación oficial</h5>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe width="600" height="800" name="iframe" src="{{asset($posesionario->IdentificacionOficial)}}"></iframe>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modal5" tabindex="-1" role="dialog" aria-labelledby="TituloVentana" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Comprobante de domicilio</h5>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe width="600" height="800" name="iframe" src="{{asset($posesionario->ComprobanteDomicilio)}}"></iframe>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modal6" tabindex="-1" role="dialog" aria-labelledby="TituloVentana" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Constancia de no propiedad</h5>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe width="600" height="800" name="iframe" src="{{asset($posesionario->ConstanciaNoPropiedad)}}"></iframe>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modal7" tabindex="-1" role="dialog" aria-labelledby="TituloVentana" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Constancia de soltería</h5>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe width="600" height="800" name="iframe" src="{{asset($posesionario->ConstanciaSolteria)}}"></iframe>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    {{-- SweetAlert Eliminar --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>
@endsection