<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAsignado;
use App\Models\Asignado;
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
        $posesionarios = Posesionario::all();
        $lotes = Lote::all();
                           
        return view('asignados.index', compact('asignados', 'posesionarios', 'lotes'));
    }

    /* public function store(Request $request){
        return $request->all();
    } */

    public function store(StoreAsignado $request){

              
        $asignado = new Asignado();

        $asignado->posesionarios_id = $request->posesionarios_id;
        $asignado->lotes_id = $request->lotes_id;
        $asignado->ClaveContrato = $request->ClaveContrato;
        $asignado->CostoLote = $request->CostoLote;
        $asignado->TipoContrato = $request->TipoContrato;
        $asignado->FechaContrato = $request->FechaContrato;
        $asignado->Mensualidades = $request->Mensualidades;
        $asignado->ObservacionesAsignado = $request->ObservacionesAsignado;

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
        
       // return $request->all();

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
            'TipoContrato' => 'required',
            'FechaContrato' => 'required',
            'Mensualidades' => 'required',
        ]);

        $asignado->update($request->all());
        
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

}
