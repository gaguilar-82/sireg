@extends('adminlte::page')

@section('title', 'Directores')

@section('content_header')
    <h1>Lista de Directores</h1>
@stop

@section('content')
    @livewire('admin.directors-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('deletePost', directorId => {
            Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) 
                    {
                        Livewire.emitTo('Admin/DirectorsIndex', 'delete', directorId);

                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }
                })
        });
    </script>
@endpush