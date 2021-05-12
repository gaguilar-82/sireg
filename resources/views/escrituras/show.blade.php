@extends('layouts.plantilla')

@section('css')

@section('title','SIREG | Cédula de Escrituración')

@section('Content')
<div class="container mx-auto pt-5">
    @if ( session('mensaje') )
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif
    <div class="bg-gray-200">    
        <div class="card text-center">
            <div class="card-header">
                <h3>Cédula de Escrituración</h3>
                <h4>{{$escritura->asignados->lotes->colonias->NombreColonia}} Manzana {{$escritura->asignados->lotes->Manzana}} Lote {{$escritura->asignados->lotes->NumLote}}</h4>
                <h5>{{strtoupper($escritura->asignados->ClaveContrato)}}</h5>
                <h5>Fecha de elaboración: {{\Carbon\Carbon::parse($escritura->FechaEscritura)->format('d/m/Y')}}</h5>
                <h5>Folio de escritura:  {{$escritura->FolioEscritura}}</h5>
            </div>
            <div class="card-body">
                <p><strong>Nombre del Posesionario: </strong> {{$escritura->asignados->posesionarios->NombrePosesionario}} {{$escritura->asignados->posesionarios->ApellidoPaterno}} {{$escritura->asignados->posesionarios->ApellidoMaterno}}</p>
                <p><strong>Lugar de nacimiento: </strong> {{$escritura->asignados->posesionarios->LugarNacimiento}}
                <strong>Fecha de nacimiento: </strong> {{\Carbon\Carbon::parse($escritura->asignados->posesionarios->FechaNacimiento)->formatLocalized('%d de %B de %Y')}}<p>
                <p><strong>Estado civil: </strong> {{$escritura->asignados->posesionarios->EstadoCivil}}
                <strong>Ocupación: </strong> {{$escritura->asignados->posesionarios->Ocupacion}} </p>
                <p><strong><u>Datos del Predio</u></strong></p>
                <p><strong>Superficie: </strong> {{number_format($escritura->asignados->lotes->Superficie,2,'.',',')}}m²</p>
                @if ($escritura->asignados->lotes->Colindancia1 != NULL)
                    <p><strong>Colindancia 1: </strong>{{$escritura->asignados->lotes->Colindancia1}}</p>                   
                @else
                    <p><strong>Colindancia 1: </strong><u>No se ha ingresado la colindancia correspondiente.</u></p>   
                @endif
                @if ($escritura->asignados->lotes->Colindancia2 != NULL)
                    <p><strong>Colindancia 2: </strong>{{$escritura->asignados->lotes->Colindancia2}}</p>
                @else
                    <p><strong>Colindancia 2: </strong><u>No se ha ingresado la colindancia correspondiente.</u></p>
                @endif
                @if ($escritura->asignados->lotes->Colindancia3 != NULL)
                    <p><strong>Colindancia 3: </strong>{{$escritura->asignados->lotes->Colindancia3}}</p>
                @else
                    <p><strong>Colindancia 3: </strong><u>No se ha ingresado la colindancia correspondiente.</u></p>    
                @endif
                @if ($escritura->asignados->lotes->Colindancia4 != NULL)
                    <p><strong>Colindancia 4: </strong>{{$escritura->asignados->lotes->Colindancia4}}</p>    
                @else
                    <p><strong>Colindancia 4: </strong><u>No se ha ingresado la colindancia correspondiente.</u></p>
                @endif
                @if(($escritura->FirmaPosesionario) != NULL)
                    <p><strong>¿Firmada por el Posesionario? </strong> {{$escritura->FirmaPosesionario}}</p>
                @endif
                @if(($escritura->FirmaDirector) != NULL)
                    <p><strong>¿Firmada por el Director? </strong> {{$escritura->FirmaDirector}}</p>
                @endif
                @if(($escritura->Forma3DCC) != NULL)
                    <p><strong>¿Tiene forma 3DCC? </strong> {{$escritura->Forma3DCC}}</p>
                @endif
                @if(($escritura->FechaIngresoRPP) != NULL)
                    <p><strong>Fecha de ingreso al Registro Público de la Propiedad: </strong> {{\Carbon\Carbon::parse($escritura->FechaIngresoRPP)->format('d/m/Y')}}</p>
                @endif
                @if(($escritura->OficioRPP) != NULL)
                    <p><strong>Oficio de ingreso al Registro Público de la Propiedad: </strong> {{$escritura->OficioRPP}}</p>
                @endif
                @if(($escritura->FolioRealElectronico) != NULL)
                    <p><strong>Folio Real Electrónico: </strong> {{$escritura->FolioRealElectronico}}</p>
                @endif
                @if(($escritura->FechaInscripcionRPP) != NULL)
                    <p><strong>Fecha de Inscripción al Registro Público de la Propiedad: </strong> {{\Carbon\Carbon::parse($escritura->FechaInscripcionRPP)->format('d/m/Y')}}
                @endif
                @if(($escritura->FechaEntrega) != NULL)
                    <p><strong>Fecha de entrega al posesionario: </strong> {{\Carbon\Carbon::parse($escritura->FechaEntrega)->format('d/m/Y')}}</p>
                @endif
                @if(($escritura->ObservacionesEscritura) != NULL)
                    <p><strong>Fecha de entrega al posesionario: </strong> {{$escritura->FechaEntrega}}</p>
                @endif
                @can('escrituras.index')
                    <a href="{{route('escrituras.index')}}" class="btn btn-info">Regresar</a>
                @endcan
                @can('escrituras.print')
                    <a href="{{route('escrituras.print', [$escritura->id])}}" target="_blank" class="btn btn-success">Vista previa</a>
                @endcan
                @can('escriturs.pdf')
                    <a href="{{route('escrituras.pdf', [$escritura->id])}}" target="_blank" class="btn btn-dark">Generar Escritura</a>
                @endcan
            </div>
            <div class="card-footer text-muted text-center">
                Fecha de creación: {{$escritura->created_at->diffForHumans()}}
            </div>
        </div>
    </div>
</div>
@endsection
