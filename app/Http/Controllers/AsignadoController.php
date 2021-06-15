<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAsignado;
use App\Models\Asignado;
use App\Models\Concepto;
use App\Models\Inspeccion;
use App\Models\Lote;
use App\Models\Pago;
use App\Models\Posesionario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AsignadoController extends Controller
{
    public function index(){
        $asignados = Asignado::all();
        $posesionarios = Posesionario::where([
                                                ['ActaNacimiento', '!=', 'Null'], 
                                                ['IdentificacionOficial', '!=', 'Null'], 
                                                ['ConstanciaNoPropiedad', '!=', 'Null']
                                            ])->get();
        $lotes = Lote::all();
        $escritura = Concepto::where('Clave', '=', 'IP-0002')->first();
                           
        return view('asignados.index', compact('asignados', 'posesionarios', 'lotes', 'escritura'));
    }

    public function store(StoreAsignado $request){
     
        $asignado = new Asignado();

        $asignado->posesionarios_id = $request->posesionarios_id;
        $asignado->lotes_id = $request->lotes_id;
        $asignado->ClaveContrato = $request->ClaveContrato;
        $asignado->CostoLote = $request->CostoLote;
        $asignado->CostoEscrituras =$request->CostoEscrituras;
        $asignado->TipoContrato = $request->TipoContrato;
        $asignado->FechaContrato = $request->FechaContrato;
        $asignado->Mensualidades = $request->Mensualidades;
        $asignado->ObservacionesAsignado = $request->ObservacionesAsignado;
        $asignado->users_id = auth()->user()->id;

        $asignado->save();

        return back()->with('mensaje', 'Lote asignado');
    }

    public function show(Asignado $asignado){
        $pagos = Pago::where('asignados_id','=', $asignado->id)->get();
        $inspeccion = Inspeccion::where('asignados_id','=', $asignado->id)->latest('FechaInspeccion')->first();
        return view('asignados.show' , compact('asignado','pagos','inspeccion'));
    }

    public function edit(Asignado $asignado){
        $posesionarios = Posesionario::all();
        $lotes = Lote::all();
        return view('asignados.edit', compact('asignado','posesionarios','lotes'));
    }

    public function update(Request $request, Asignado $asignado){

        $request->validate([
            'posesionarios_id' => ['required',
                                Rule::unique('Asignados')->ignore($asignado->id)
                            ],
            'lotes_id' => ['required',
                                Rule::unique('Asignados')->ignore($asignado->id)
                            ],
            'ClaveContrato' => ['required',
                                Rule::unique('Asignados')->ignore($asignado->id)
                            ],
            'CostoLote' => 'required',
            'CostoEscrituras' => 'required',
            'TipoContrato' => 'required',
            'FechaContrato' => 'required',
            'Mensualidades' => 'required',
        ]);

        $asignado->posesionarios_id = $request->posesionarios_id;
        $asignado->lotes_id = $request->lotes_id;
        $asignado->ClaveContrato = $request->ClaveContrato;
        $asignado->CostoLote = $request->CostoLote;
        $asignado->CostoEscrituras =$request->CostoEscrituras;
        $asignado->TipoContrato = $request->TipoContrato;
        $asignado->FechaContrato = $request->FechaContrato;
        $asignado->Mensualidades = $request->Mensualidades;
        $asignado->ObservacionesAsignado = $request->ObservacionesAsignado;
        $asignado->users_id = auth()->user()->id;

        $asignado->update();
        
        return redirect()->route('asignados.show', $asignado)->with('mensaje', 'Registro actualizado');
    }

    public function validar(Request $request, Asignado $asignado){
        
        $asignado->ParaEscriturar = $request->ParaEscriturar;

        $asignado->save();

        return redirect()->route('asignados.show', $asignado)->with('mensaje', 'Turnado a escrituración');
        
    }

    public function destroy(Asignado $asignado){
        $asignado->delete();

        return redirect()->route('asignados.index')->with('eliminar','ok');
    }

    public function trash(){
        
        $asignados = Asignado::onlyTrashed()->get();
        
        return view('admin.asignados.trash', compact('asignados'));
    }

    public function restore($id){

        Asignado::onlyTrashed()->find($id)->restore();

        return back()->with('mensaje', 'Asignación restaurada');
    }

    public function recycle($id){

        Asignado::onlyTrashed()->find($id)->forceDelete();

        return back()->with('mensaje','Asignación eliminada permanentemente');
    }

}
