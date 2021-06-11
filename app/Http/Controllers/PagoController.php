<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePago;
use App\Models\Asignado;
use App\Models\Concepto;
use App\Models\Pago;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade as PDF;

class PagoController extends Controller
{
    public function index(){
        $conceptos = Concepto::all();
        $asignados = Asignado::all();
        $pagos = Pago::all();
                           
        return view('pagos.index', compact('conceptos','asignados', 'pagos'));
    }

    /* public function store(Request $request){
        return $request->all();
    } */

    public function store(StorePago $request){

              
        $pago = new Pago();

        $pago->asignados_id = $request->asignados_id;
        $pago->FolioPago = $request->FolioPago;
        $pago->FechaPago = $request->FechaPago;
        $pago->conceptos_id = $request->conceptos_id;
        $pago->CantidadPago = $request->CantidadPago;
        $pago->ObservacionesPago = $request->ObservacionesPago;
        $pago->users_id = auth()->user()->id;

        $pago->save();

        return back()->with('mensaje', 'Pago agregado');
    }

    public function show(Pago $pago){
        $recibos = Pago::all();
        return view('pagos.show' , compact('pago','recibos'));
    }

    public function edit(Pago $pago){
        $conceptos = Concepto::all();
        $asignados = Asignado::all();
        return view('pagos.edit', compact('pago','conceptos','asignados'));
    }

    public function update(Request $request, Pago $pago){
        
        $request->validate([
            'asignados_id' => 'required',
            'FolioPago' => ['required',
                            Rule::unique('Pagos')->ignore($pago->id)
                        ],
            'FechaPago' => 'required',
            'conceptos_id' => 'required',
            'CantidadPago' => 'required'
        ]);

        $pago->asignados_id = $request->asignados_id;
        $pago->FolioPago = $request->FolioPago;
        $pago->FechaPago = $request->FechaPago;
        $pago->conceptos_id = $request->conceptos_id;
        $pago->CantidadPago = $request->CantidadPago;
        $pago->ObservacionesPago = $request->ObservacionesPago;
        $pago->users_id = auth()->user()->id;

        $pago->update();
        
        return redirect()->route('pagos.show', $pago)->with('mensaje', 'Registro actualizado');
            
    }

    public function destroy(Pago $pago){
        $pago->delete();

        return redirect()->route('pagos.index')->with('eliminar','ok');
    }

    public function print(Pago $pago){
        $recibos = Pago::all();
        return view('pagos.print' , compact('pago','recibos'));
    }

    public function pdf(Pago $pago){
        $recibos = Pago::all();
        $pdf = PDF::loadView('pagos.print', compact('pago','recibos'));

        return $pdf->stream('estadodecuenta.pdf');
    }

    public function trash(){
        
        $pagos = Pago::onlyTrashed()->get();
        
        return view('admin.pagos.trash', compact('pagos'));
    }

    public function restore($id){

        Pago::onlyTrashed()->find($id)->restore();

        return back()->with('mensaje', 'Pago restaurado');
    }

    public function recycle($id){

        Pago::onlyTrashed()->find($id)->forceDelete();

        return back()->with('mensaje','Pago eliminado permanentemente');
    }
}
