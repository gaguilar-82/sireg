<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePosesionario;
use App\Models\Posesionario;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class PosesionarioController extends Controller
{
    public function index(){
        $posesionarios = Posesionario::all();
       
                    
        return view('posesionarios.index', compact('posesionarios'));
    }

    public function store(StorePosesionario $request){
        
        if(($request->file('ActaNacimiento')) != NULL){
            $ActaNacimiento = $request->file('ActaNacimiento')->store('public/documentos/' . $request->CURP);
            $urlActaNacimiento = Storage::url($ActaNacimiento);
        }
        else $urlActaNacimiento=NULL; 
        
        if(($request->file('ActaMatrimonio')) != NULL){
            $ActaMatrimonio = $request->file('ActaMatrimonio')->store('public/documentos/' . $request->CURP);
            $urlActaMatrimonio = Storage::url($ActaMatrimonio);
        }
        else $urlActaMatrimonio=NULL;

        if(($request->file('ActaHijos')) != NULL){
            $ActaHijos = $request->file('ActaHijos')->store('public/documentos/' . $request->CURP);
            $urlActaHijos = Storage::url($ActaHijos);
        }
        else $urlActaHijos=NULL;

        if(($request->file('IdentificacionOficial')) != NULL){
            $IdentificacionOficial = $request->file('IdentificacionOficial')->store('public/documentos/' . $request->CURP);
            $urlIdentificacionOficial = Storage::url($IdentificacionOficial);
        }
        else $urlIdentificacionOficial=NULL;

        if(($request->file('ComprobanteDomicilio')) != NULL){
            $ComprobanteDomicilio = $request->file('ComprobanteDomicilio')->store('public/documentos/' . $request->CURP);
            $urlComprobanteDomicilio = Storage::url($ComprobanteDomicilio);
        }
        else $urlComprobanteDomicilio=NULL;

        if(($request->file('ConstanciaNoPropiedad')) != NULL){
            $ConstanciaNoPropiedad = $request->file('ConstanciaNoPropiedad')->store('public/documentos/' . $request->CURP);
            $urlConstanciaNoPropiedad = Storage::url($ConstanciaNoPropiedad);
        }
        else $urlConstanciaNoPropiedad=NULL;

        if(($request->file('ConstanciaSolteria')) != NULL){
            $ConstanciaSolteria = $request->file('ConstanciaSolteria')->store('public/documentos/' . $request->CURP);
            $urlConstanciaSolteria = Storage::url($ConstanciaSolteria);
        }
        else $urlConstanciaSolteria=NULL;

        if(($request->file('PoderNotarial')) != NULL){
            $PoderNotarial = $request->file('PoderNotarial')->store('public/documentos/' . $request->CURP);
            $urlPoderNotarial = Storage::url($PoderNotarial);
        }
        else $urlPoderNotarial=NULL;

       
        $posesionario = new Posesionario();

        $posesionario->NombrePosesionario = $request->NombrePosesionario;
        $posesionario->ApellidoPaterno = $request->ApellidoPaterno;
        $posesionario->ApellidoMaterno = $request->ApellidoMaterno;
        $posesionario->CURP = $request->CURP;
        $posesionario->LugarNacimiento = $request->LugarNacimiento;
        $posesionario->FechaNacimiento = $request->FechaNacimiento;
        $posesionario->EstadoCivil = $request->EstadoCivil;
        $posesionario->Ocupacion = $request->Ocupacion;
        $posesionario->Telefono = $request->Telefono;
        $posesionario->ActaNacimiento = $urlActaNacimiento;
        $posesionario->ActaMatrimonio = $urlActaMatrimonio;
        $posesionario->ActaHijos = $urlActaHijos;
        $posesionario->IdentificacionOficial = $urlIdentificacionOficial;
        $posesionario->ComprobanteDomicilio = $urlComprobanteDomicilio;
        $posesionario->ConstanciaNoPropiedad = $urlConstanciaNoPropiedad;
        $posesionario->ConstanciaSolteria = $urlConstanciaSolteria;
        $posesionario->PoderNotarial = $urlPoderNotarial;
        $posesionario->ObservacionesPosesionario = $request->ObservacionesPosesionario;
        $posesionario->users_id = auth()->user()->id;
       
        $posesionario->save();

        return back()->with('mensaje', 'Posesionario agregado');
    }

    public function show(Posesionario $posesionario){
        return view('posesionarios.show' , compact('posesionario'));
    }

    public function edit(Posesionario $posesionario){
        return view('posesionarios.edit', compact('posesionario'));
    }

    public function update(Request $request, Posesionario $posesionario){

        $request->validate([
            'CURP' => ['required',
                                'max:18',
                                'min:18', 
                                Rule::unique('Posesionarios')->ignore($posesionario->id)
                            ],
            'NombrePosesionario' => 'required',
            'ApellidoPaterno' => 'required',
            'ApellidoMaterno' => 'required',
            'LugarNacimiento' => 'required',
            'FechaNacimiento' => 'required',
            'EstadoCivil' => 'required',
            'Ocupacion' => 'required',
            'Telefono' => 'required|max:10|min:10',
            'ActaNacimiento' => 'nullable|mimes:pdf|max:2048',
            'ActaMatrimonio' => 'nullable|mimes:pdf|max:2048',
            'ActaHijos' => 'nullable|mimes:pdf|max:2048',
            'IdentificacionOficial' => 'nullable|mimes:pdf|max:2048',
            'ComprobanteDomicilio' => 'nullable|mimes:pdf|max:2048',
            'ConstanciaNoPropiedad' => 'nullable|mimes:pdf|max:2048',
            'PoderNotarial' => 'nullable|mimes:pdf|max:2048',
            'ConstanciaSolteria' => 'nullable|mimes:pdf|max:2048'
        ]);

        $data = [
            'NombrePosesionario' => $request->NombrePosesionario,
            'ApellidoPaterno' => $request->ApellidoPaterno,
            'ApellidoMaterno' => $request->ApellidoMaterno,
            'CURP' => $request->CURP,
            'LugarNacimiento' => $request->LugarNacimiento,
            'FechaNacimiento' => $request->FechaNacimiento,
            'EstadoCivil' => $request->EstadoCivil,
            'Ocupacion' => $request->Ocupacion,
            'Telefono' => $request->Telefono,
            'ObservacionesPosesionario' => $request->ObservacionesPosesionario,
            'users_id' => auth()->user()->id
        ];

        if($request->hasfile('ActaNacimiento')){
            $ActaNacimiento = $request->file('ActaNacimiento')->store('public/documentos/' . $request->CURP);
            $urlActaNacimiento = Storage::url($ActaNacimiento);
            $data = array_merge($data, ['ActaNacimiento' => $urlActaNacimiento]); 
        }

        if($request->hasfile('ActaMatrimonio')){
            $ActaMatrimonio = $request->file('ActaMatrimonio')->store('public/documentos/' . $request->CURP);
            $urlActaMatrimonio = Storage::url($ActaMatrimonio);
            $data = array_merge($data, ['ActaMatrimonio' => $urlActaMatrimonio]); 
        }

        if($request->hasfile('ActaHijos')){
            $ActaHijos = $request->file('ActaHijos')->store('public/documentos/' . $request->CURP);
            $urlActaHijos = Storage::url($ActaHijos);
            $data = array_merge($data, ['ActaHijos' => $urlActaHijos]); 
        }

        if($request->hasfile('IdentificacionOficial')){
            $IdentificacionOficial = $request->file('IdentificacionOficial')->store('public/documentos/'  .$request->CURP);
            $urlIdentificacionOficial = Storage::url($IdentificacionOficial);
            $data = array_merge($data, ['IdentificacionOficial' => $urlIdentificacionOficial]); 
        }

        if($request->hasfile('ComprobanteDomicilio')){
            $ComprobanteDomicilio = $request->file('ComprobanteDomicilio')->store('public/documentos/' . $request->CURP);
            $urlComprobanteDomicilio = Storage::url($ComprobanteDomicilio);
            $data = array_merge($data, ['ComprobanteDomicilio' => $urlComprobanteDomicilio]); 
        }

        if($request->hasfile('ConstanciaNoPropiedad')){
            $ConstanciaNoPropiedad = $request->file('ConstanciaNoPropiedad')->store('public/documentos/' . $request->CURP);
            $urlConstanciaNoPropiedad = Storage::url($ConstanciaNoPropiedad);
            $data = array_merge($data, ['ConstanciaNoPropiedad' => $urlConstanciaNoPropiedad]); 
        }

        if($request->hasfile('ConstanciaSolteria')){
            $ConstanciaSolteria = $request->file('ConstanciaSolteria')->store('public/documentos/' . $request->CURP);
            $urlConstanciaSolteria = Storage::url($ConstanciaSolteria);
            $data = array_merge($data, ['ConstanciaSolteria' => $urlConstanciaSolteria]); 
        }

        if($request->hasfile('PoderNotarial')){
            $PoderNotarial = $request->file('PoderNotarial')->store('public/documentos/' . $request->CURP);
            $urlPoderNotarial = Storage::url($PoderNotarial);
            $data = array_merge($data, ['PoderNotarial' => $urlPoderNotarial]); 
        }

        $posesionario->update($data);

        return redirect()->route('posesionarios.show', $posesionario)->with('mensaje', 'Registro actualizado');

    }

    public function destroy(Posesionario $posesionario){
        $posesionario->delete();

        return redirect()->route('posesionarios.index')->with('eliminar','ok');
    }

    public function trash(){
        
        $posesionarios = Posesionario::onlyTrashed()->get();
        
        return view('admin.posesionarios.trash', compact('posesionarios'));
    }

    public function restore($id){

        Posesionario::onlyTrashed()->find($id)->restore();

        return back()->with('mensaje', 'Posesionario restaurado');
    }

    public function recycle($id){

        Posesionario::onlyTrashed()->find($id)->forceDelete();

        return back()->with('mensaje','Posesionario eliminado permanentemente');
    }
}
