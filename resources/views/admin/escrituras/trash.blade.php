@extends('adminlte::page')

@section('title', 'Papelera de Reciclaje / Escrituras')

@section('content_header')
    <h1>Lista de Escrituras Eliminadas</h1>
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
                <table id="escrituras" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Contrato</th>
                            <th>Lote</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($escrituras as $escritura)
                        <tr>
                            <td>{{$escritura->id}}</td>
                            <td>{{strtoupper($escritura->asignados->ClaveContrato)}}</td>
                            <td>{{strtoupper($escritura->asignados->lotes->colonias->NombreColonia)}} Manzana {{$escritura->asignados->lotes->Manzana}} Lote {{$escritura->asignados->lotes->NumLote}}</td>
                            <td>{{strtoupper($escritura->asignados->posesionarios->NombrePosesionario)}} {{strtoupper($escritura->asignados->posesionarios->ApellidoPaterno)}} {{strtoupper($escritura->asignados->posesionarios->ApellidoMaterno)}}</td>
                            <td>{{\Carbon\Carbon::parse($escritura->FechaEscritura)->format('d/m/Y')}}</td>
                            <td>
                                @can('admin.escrituras.restore')
                                    <a href="{{route('admin.escrituras.restore', [$escritura->id])}}" class="btn btn-info btn-sm" alt="Restaurar">
                                        <i class="fas fa-trash-restore"></i>
                                    </a>
                                @endcan
                                @can('admin.escrituras.recycle')
                                    <a href="{{route('admin.escrituras.recycle', [$escritura->id])}}" class="btn btn-danger btn-sm" alt="Eliminar">
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
            $('#escrituras').DataTable({
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