@extends('adminlte::page')

@section('title', 'Papelera de Reciclaje / Pagos')

@section('content_header')
    <h1>Lista de Pagos Eliminados</h1>
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
                <table id="pagos" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Fecha</th>
                            <th>Folio</th>
                            <th>Concepto</th>
                            <th>Cantidad</th>
                            <th>Cobrado por</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pagos as $pago)
                            <tr>
                                <td>{{$pago->id}}</td>
                                <td>{{\Carbon\Carbon::parse($pago->FechaPago)->format('d/m/Y')}}</td>
                                <td>{{$pago->FolioPago}}</td>
                                <td>{{$pago->conceptos->Clave}}-{{$pago->conceptos->NombreConcepto}}</td>
                                <td>${{number_format($pago->CantidadPago,2,'.',',')}}</td>
                                <td>{{$pago->users->name}}</td>
                                <td>
                                    @can('admin.pagos.restore')
                                        <a href="{{route('admin.pagos.restore', [$pago->id])}}" class="btn btn-info btn-sm" alt="Restaurar" alt="Restaurar">
                                            <i class="fas fa-trash-restore"></i>
                                        </a>
                                    @endcan
                                    @can('admin.pagos.recycle')
                                        <a href="{{route('admin.pagos.recycle', [$pago->id])}}" class="btn btn-danger btn-sm" alt="Eliminar" alt="Eliminar">
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
            $('#pagos').DataTable({
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