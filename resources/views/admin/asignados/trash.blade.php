@extends('adminlte::page')

@section('title', 'Papelera de Reciclaje / Asignados')

@section('content_header')
    <h1>Lista de asignaciones eliminadas</h1>
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
                <table id="asignados" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Colonia</th>
                            <th>Manzana</th>
                            <th>Lote</th>
                            <th>Posesionario</th>
                            <th>Costo del lote</th>
                            <th>Tipo de Contrato</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($asignados as $asignado)
                            <tr>
                                <td>{{$asignado->id}}</td>
                                <td>{{strtoupper($asignado->lotes->colonias->NombreColonia)}}</td>
                                <td>{{$asignado->lotes->Manzana}}</td>
                                <td>{{$asignado->lotes->NumLote}}</td>
                                <td>{{strtoupper($asignado->posesionarios->NombrePosesionario)}} {{strtoupper($asignado->posesionarios->ApellidoPaterno)}} {{strtoupper($asignado->posesionarios->ApellidoMaterno)}}</td>
                                <td>${{number_format($asignado->CostoLote,2,'.',',')}}</td>
                                <td>{{$asignado->TipoContrato}}</td>
                                <td>
                                    @can('admin.asignados.restore')
                                        <a href="{{route('admin.asignados.restore', [$asignado->id])}}" class="btn btn-info btn-sm" alt="Restaurar">
                                            <i class="fas fa-trash-restore"></i>
                                        </a>
                                    @endcan
                                    @can('admin.asignados.recycle')
                                        <a href="{{route('admin.asignados.recycle', [$asignado->id])}}" class="btn btn-danger btn-sm" alt="Eliminar">
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
            $('#asignados').DataTable({
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