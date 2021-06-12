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

    public function store(StoreInspeccion $request){

        $inspeccion = new Inspeccion();

        $inspeccion->FechaInspeccion = $request->FechaInspeccion;
        $inspeccion->UsoVivienda = $request->UsoVivienda;
        $inspeccion->MaterialVivienda = $request->MaterialVivienda;
        $inspeccion->MaterialMuros = $request->MaterialMuros;
        $inspeccion->MaterialTecho = $request->MaterialTecho;
        $inspeccion->MaterialPiso = $request->MaterialPiso;
        $inspeccion->ZAR = $request->ZAR;
        $inspeccion->EnergiaElectrica = $request->EnergiaElectrica;
        $inspeccion->AguaPotable = $request->AguaPotable;
        $inspeccion->Drenaje = $request->Drenaje;
        $inspeccion->Antiguedad = $request->Antiguedad;
        $inspeccion->Habitantes = $request->Habitantes;
        $inspeccion->Habitaciones = $request->Habitaciones;
        $inspeccion->GastoAlimentacion = $request->GastoAlimentacion;
        $inspeccion->GastoSalud = $request->GastoSalud; 
        $inspeccion->GastoEducacion = $request->GastoEducacion;
        $inspeccion->GastoOtros = $request->GastoOtros;
        $inspeccion->GastoTotal= $request->GastoTotal;
        $inspeccion->SeguridadSocial = $request->SeguridadSocial;
        $inspeccion->ObservacionesInspeccion = $request->ObservacionesInspeccion;
        $inspeccion->asignados_id = $request->asignados_id;
        $inspeccion->inspectors_id = $request->inspectors_id;
        $inspeccion->users_id = auth()->user()->id;
        
        $inspeccion->save();

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

        $request->validate([
            'asignados_id' => 'required',
            'inspectors_id' => 'required',
            'FechaInspeccion' => 'required',
            'UsoVivienda' => 'required',
            'MaterialVivienda' => 'required',
            'MaterialMuros' => 'required',
            'MaterialTecho' => 'required',
            'MaterialPiso' => 'required',
            'ZAR' => 'required',
            'EnergiaElectrica' => 'required',
            'AguaPotable' => 'required',
            'Drenaje' => 'required',
            'Antiguedad' => 'required', 
            'Habitantes' => 'required',
            'Habitaciones' => 'required',
            'GastoAlimentacion' => 'required',
            'GastoSalud' => 'required',
            'GastoEducacion' => 'required',
            'GastoOtros' => 'required',
            'GastoTotal' => 'required',
        ]);

        $inspeccion->FechaInspeccion = $request->FechaInspeccion;
        $inspeccion->UsoVivienda = $request->UsoVivienda;
        $inspeccion->MaterialVivienda = $request->MaterialVivienda;
        $inspeccion->MaterialMuros = $request->MaterialMuros;
        $inspeccion->MaterialTecho = $request->MaterialTecho;
        $inspeccion->MaterialPiso = $request->MaterialPiso;
        $inspeccion->ZAR = $request->ZAR;
        $inspeccion->EnergiaElectrica = $request->EnergiaElectrica;
        $inspeccion->AguaPotable = $request->AguaPotable;
        $inspeccion->Drenaje = $request->Drenaje;
        $inspeccion->Antiguedad = $request->Antiguedad;
        $inspeccion->Habitantes = $request->Habitantes;
        $inspeccion->Habitaciones = $request->Habitaciones;
        $inspeccion->GastoAlimentacion = $request->GastoAlimentacion;
        $inspeccion->GastoSalud = $request->GastoSalud; 
        $inspeccion->GastoEducacion = $request->GastoEducacion;
        $inspeccion->GastoOtros = $request->GastoOtros;
        $inspeccion->GastoTotal= $request->GastoTotal;
        $inspeccion->SeguridadSocial = $request->SeguridadSocial;
        $inspeccion->ObservacionesInspeccion = $request->ObservacionesInspeccion;
        $inspeccion->asignados_id = $request->asignados_id;
        $inspeccion->inspectors_id = $request->inspectors_id;
        $inspeccion->users_id = auth()->user()->id;
          
        $inspeccion->update();
         
         return redirect()->route('inspecciones.show', $inspeccion)->with('mensaje', 'Registro actualizado');
    }

    public function destroy(Inspeccion $inspeccion){
        $inspeccion->delete();

        return redirect()->route('inspecciones.index')->with('eliminar','ok');
    }

    public function print(Inspeccion $inspeccion){
    
        return view('inspecciones.print' , compact('inspeccion'));
    }

    public function trash(){
        
        $inspecciones = Inspeccion::onlyTrashed()->get();
        
        return view('admin.inspecciones.trash', compact('inspecciones'));
    }

    public function restore($id){

        Inspeccion::onlyTrashed()->find($id)->restore();

        return back()->with('mensaje', 'Inspección restaurada');
    }

    public function recycle($id){

        Inspeccion::onlyTrashed()->find($id)->forceDelete();

        return back()->with('mensaje','Inspección eliminada permanentemente');
    }
}
 