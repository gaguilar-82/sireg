<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{

    public function index()
    {
        return view('admin.directors.index');
    }

    
    public function create()
    {
        return view('admin.directors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'NombreDirector' => 'required|max:255',
            'ApellidoPaternoDirector' => 'required|max:255',
            'ApellidoMaternoDirector' => 'required|max:255',
            'FechaNacimientoDirector' => 'required',
            'LugarNacimientoDirector' => 'required|max:255',
            'EstadoCivilDirector' => 'required|max:255',
            'FechaNombramiento' => 'required',
            'ExpedidoPor' => 'required|max:255',
            'ActaPublica' => 'required',
        ]);

        $director = new Director();

        $director->NombreDirector = $request->NombreDirector;
        $director->ApellidoPaternoDirector = $request->ApellidoPaternoDirector;
        $director->ApellidoMaternoDirector = $request->ApellidoMaternoDirector;
        $director->FechaNacimientoDirector = $request->FechaNacimientoDirector;
        $director->LugarNacimientoDirector = $request->LugarNacimientoDirector;
        $director->EstadoCivilDirector = $request->EstadoCivilDirector;
        $director->FechaNombramiento = $request->FechaNombramiento;
        $director->ExpedidoPor = $request->ExpedidoPor;
        $director->ActaPublica = $request->ActaPublica;

        $director->save();

        return back()->with('mensaje', 'Director agregado');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit(Director $director)
    {
        return view('admin.directors.edit', compact('director'));
    }

    
    public function update(Request $request, Director $director)
    {
        $request->validate([
            'NombreDirector' => 'required|max:255',
            'ApellidoPaternoDirector' => 'required|max:255',
            'ApellidoMaternoDirector' => 'required|max:255',
            'FechaNacimientoDirector' => 'required',
            'LugarNacimientoDirector' => 'required|max:255',
            'EstadoCivilDirector' => 'required|max:255',
            'FechaNombramiento' => 'required',
            'ExpedidoPor' => 'required|max:255',
            'ActaPublica' => 'required',
        ]);

        $director->NombreDirector = $request->NombreDirector;
        $director->ApellidoPaternoDirector = $request->ApellidoPaternoDirector;
        $director->ApellidoMaternoDirector = $request->ApellidoMaternoDirector;
        $director->FechaNacimientoDirector = $request->FechaNacimientoDirector;
        $director->LugarNacimientoDirector = $request->LugarNacimientoDirector;
        $director->EstadoCivilDirector = $request->EstadoCivilDirector;
        $director->FechaNombramiento = $request->FechaNombramiento;
        $director->ExpedidoPor = $request->ExpedidoPor;
        $director->ActaPublica = $request->ActaPublica;

        $director->update();

        return back()->with('mensaje', 'Director actualizado');
    }
    

    
    public function destroy(Director $director)
    {
        $director->delete();

        return redirect()->route('admin.index')->with('eliminar','ok');
    }
}
