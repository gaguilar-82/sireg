@extends('adminlte::page')

@section('title', 'Papelera de Reciclaje / Inspecciones')

@section('content_header')
    <h1>Lista de Inspecciones Eliminadas</h1>
@stop

@section('content')

    @if (session('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('mensaje')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div>
        <div class="card">
            <div class="card-body">
                <table id="inspecciones" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Colonia</th>
                            <th>Manzana</th>
                            <th>Lote</th>
                            <th>Posesionario</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inspecciones as $inspeccion)
                        <tr>
                            <td>{{$inspeccion->id}}</td>
                            <td>{{$inspeccion->asignados->lotes->colonias->NombreColonia}}</td>
                            <td>{{$inspeccion->asignados->lotes->Manzana}}</td>
                            <td>{{$inspeccion->asignados->lotes->NumLote}}</td>
                            <td>{{strtoupper($inspeccion->asignados->posesionarios->NombrePosesionario)}} {{strtoupper($inspeccion->asignados->posesionarios->ApellidoPaterno)}} {{strtoupper($inspeccion->asignados->posesionarios->ApellidoMaterno)}}</td>
                            <td>{{\Carbon\Carbon::parse($inspeccion->FechaInspeccion)->format('d/m/Y')}}</td>
                            <td>
                                @can('lotes.show')
                                    <a href="{{route('admin.inspecciones.restore', [$inspeccion->id])}}" class="btn btn-info btn-sm">
                                        <i class="fas fa-trash-restore"></i>
                                    </a>
                                @endcan
                                @can('lotes.edit')
                                    <a href="{{route('admin.inspecciones.recycle', [$inspeccion->id])}}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-recycle"></i>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    {{-- Datatable --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
    {{-- Datatable --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#inspecciones').DataTable({
                responsive: true,
                autoWidth: false,

                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],

                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Ningún resultado encontrado - disculpa",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>
@stop