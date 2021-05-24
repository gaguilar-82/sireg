<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de un director">
        </div>
        @if ($directors->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Fecha de nombramiento</th>
                            <th>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($directors as $director)
                        <tr>
                            <td>{{$director->id}}</td>
                            <td>{{$director->NombreDirector}} {{$director->ApellidoPaternoDirector}} {{$director->ApellidoMaternoDirector}}</td>
                            <td>{{\Carbon\Carbon::parse($director->FechaNombramiento)->format('d/m/Y')}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.directors.edit', $director)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.directors.destroy',[$director->id])}}" method="POST" class="d-inline eliminar" id="eliminar" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit" wire:click="alertConfirm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$directors->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
    </div>
</div>
