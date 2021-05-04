<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInspeccion;
use App\Models\Asignado;
use App\Models\Inspeccion;
use App\Models\Inspector;
use Illuminate\Http\Request;

class InspeccionController extends Controller
{
    public function index(){
        $inspectores = Inspector::all();
        $asignados = Asignado::all();
        $inspecciones = Inspeccion::all();
                           
        return view('inspecciones.index', compact('inspectores','asignados', 'inspecciones'));
    }

    /* public function store(Request $request){
        return $request->all();
    } */

    public function store(StoreInspeccion $request){
        
        $inspeccion = Inspeccion::create($request->all());

        return back()->with('mensaje', 'Inspección agregada');
    }

    public function show(Inspeccion $inspeccion){
        
        return view('inspecciones.show' , compact('inspeccion'));
    }

    public function edit(Inspeccion $inspeccion){
        $inspectores = Inspector::all();
        $asignados = Asignado::all();
                           
        return view('inspecciones.edit', compact('inspeccion','inspectores','asignados'));
    }

    public function update(Request $request, Inspeccion $inspeccion){
          
         $inspeccion->update($request->all());
         
         return redirect()->route('inspecciones.show', $inspeccion)->with('mensaje', 'Registro actualizado');
    }

    public function destroy(Inspeccion $inspeccion){
        $inspeccion->delete();

        return redirect()->route('inspecciones.index')->with('eliminar','ok');
    }

    public function print(Inspeccion $inspeccion){
    
        return view('inspecciones.print' , compact('inspeccion'));
    }
}
 