<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inspector;
use Illuminate\Http\Request;

class InspectorController extends Controller
{
    public function index()
    {
        $inspectors = Inspector::all();
        return view('admin.inspectors.index', compact('inspectors'));
    }

    
    public function create()
    { 
        return view('admin.inspectors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NombreInspector' => 'required|max:255',
            'Delegacion' => 'required|max:255',
            'Categoria' => 'required|max:255',
        ]);

        $inspector = new Inspector();

        $inspector->NombreInspector = $request->NombreInspector;
        $inspector->Delegacion = $request->Delegacion;
        $inspector->Categoria = $request->Categoria;

        $inspector->save();

        return back()->with('mensaje', 'Inspector agregado');
    }

    public function edit(Inspector $inspector)
    {
        return view('admin.inspectors.edit', compact('inspector'));
    }

    
    public function update(Request $request, Inspector $inspector)
    {
        $request->validate([
            'NombreInspector' => 'required|max:255',
            'Delegacion' => 'required|max:255',
            'Categoria' => 'required|max:255',
        ]);


        $inspector->NombreInspector = $request->NombreInspector;
        $inspector->Delegacion = $request->Delegacion;
        $inspector->Categoria = $request->Categoria;

        $inspector->update();

        return back()->with('mensaje', 'Inspector actualizado');
    }

    public function destroy(Inspector $inspector)
    {
        $inspector->delete();

        return redirect()->route('admin.inspectors.index')->with('eliminar','ok');
    }
}
