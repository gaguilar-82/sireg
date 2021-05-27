@extends('adminlte::page')

@section('title', 'Directores')

@section('content_header')
    <h1>Lista de Directores</h1>
@stop

@section('content')
    {{-- @livewire('admin.directors-index') --}}

    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('info')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div>
        <div class="card">
            <div class="card-body">
                <table id="directores" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Fecha de nombramiento</th>
                            <th>Acciones</td>
                            <th></th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach ($directors as $director)
                        <tr>
                            <td>{{$director->id}}</td>
                            <td>{{$director->NombreDirector}} {{$director->ApellidoPaternoDirector}} {{$director->ApellidoMaternoDirector}}</td>
                            <td>{{\Carbon\Carbon::parse($director->FechaNombramiento)->format('d/m/Y')}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.directors.edit', $director)}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td width="10px">
                                @if ($directors->count() > '1') 
                                    <form action="{{route('admin.directors.destroy',[$director->id])}}" method="POST" class="d-inline eliminar" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
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
            $('#directores').DataTable({
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

    {{-- SweetAlert2 --}}
    <script>
        $('.eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podras deshacer esta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, eliminalo!',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.value) {
                    
                    this.submit();

                }
            })

        });
    </script>

@stop