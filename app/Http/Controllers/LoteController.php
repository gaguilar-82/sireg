<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLote;
use Illuminate\Http\Request;
use App\Models\Colonia;
use App\Models\Lote;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class LoteController extends Controller
{
    public function index(){
        $colonias = Colonia::all();
        $lotes = Lote::all();
                    
        return view('lotes.index', compact('colonias','lotes'));
    }

    /* public function store(Request $request){
        return $request->all();
    } */

    public function store(StoreLote $request){
             
        if(($request->file('Croquis')) != NULL){
            $Croquis = $request->file('Croquis')->store('public/croquis/' . $request->ClaveLote);
            $urlCroquis = Storage::url($Croquis);
        }
        else $urlCroquis=NULL;
        
        $lote = new Lote();

        $lote->ClaveLote = $request->ClaveLote;
        $lote->Macrolote = $request->Macrolote;
        $lote->Etapa = $request->Etapa;
        $lote->Seccion = $request->Seccion;
        $lote->Poligono = $request->Poligono;
        $lote->Supermanzana = $request->Supermanzana;
        $lote->Manzana = $request->Manzana;
        $lote->NumLote = $request->NumLote;
        $lote->Casa = $request->Casa;
        $lote->Superficie = $request->Superficie;
        $lote->Colindancia1 = $request->Colindancia1;
        $lote->Colindancia2 = $request->Colindancia2;
        $lote->Colindancia3 = $request->Colindancia3;
        $lote->Colindancia4 = $request->Colindancia4;
        $lote->Latitud = $request->Latitud;
        $lote->Longitud = $request->Longitud;
        $lote->CodigoPostal = $request->CodigoPostal;
        $lote->Uso = $request->Uso;
        $lote->AltoRiesgo = $request->AltoRiesgo;
        $lote->Afectacion = $request->Afectacion;
        $lote->Subdivision = $request->Subdivision;
        $lote->Fusion = $request->Fusion;
        $lote->Actualizacion = $request->Actualizacion;
        $lote->ConflictoLegal = $request->ConflictoLegal;
        $lote->ObservacionesLote = $request->ObservacionesLote;
        $lote->Croquis = $urlCroquis;
        
        $lote->colonias_id = $request->colonias_id;

        $lote->users_id = auth()->user()->id;

        $lote->save();

        return back()->with('mensaje', 'Lote agregado');
    }

    public function show(Lote $lote){
        return view('lotes.show' , compact('lote'));
    }

    public function edit(Lote $lote){
        $colonias = Colonia::all();
        return view('lotes.edit', compact('colonias','lote'));
    }

    public function update(Request $request, Lote $lote){
        
        $request['ClaveLote'] = ($request['colonias_id']."-".$request['Manzana'].$request['NumLote']);
        
        $request->validate([
            'ClaveLote' => ['required',
                                'max:15',
                                'min:6', 
                                Rule::unique('Lotes')->ignore($lote->id)
                            ],
            'colonias_id' => 'required',
            'Macrolote' => 'max:4',
            'Etapa' => 'max:4',
            'Seccion' => 'max:4',
            'Poligono' => 'max:4',
            'Supermanzana' => 'max:4',
            'Manzana' => 'required|max:4',
            'NumLote' => 'required|max:4', 
            'Casa' => 'max:4',
            'Superficie' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'Croquis' => 'nullable|image|dimensions:max_width=600,max_height=600|max:2048'
        ]);

        $data = [
            'ClaveLote' => $request->ClaveLote,
            'colonias_id' => $request->colonias_id,
            'Macrolote' => $request->Macrolote,
            'Etapa' => $request->Etapa,
            'Seccion' => $request->Seccion,
            'Poligono' => $request->Poligono,
            'Supermanzana' => $request->Supermanzana,
            'Manzana' => $request->Manzana,
            'NumLote' => $request->NumLote,
            'Casa' => $request->Casa,
            'Superficie' => $request->Superficie,
            'Colindancia1' => $request->Colindancia1,
            'Colindancia2' => $request->Colindancia2,
            'Colindancia3' => $request->Colindancia3,
            'Colindancia4' => $request->Colindancia4,
            'Latitud' => $request->Latitud,
            'Longitud' => $request->Longitud,
            'CodigoPostal' => $request->CodigoPostal,
            'Uso' => $request->Uso,
            'AltoRiesgo' => $request->AltoRiesgo,
            'Afectacion' => $request->Afectacion,
            'Subdivision' => $request->Subdivision,
            'Fusion' => $request->Fusion,
            'Actualizacion' => $request->Actualizacion,
            'ConflictoLegal' => $request->ConflictoLegal,
            'ObservacionesLote' => $request->ObservacionesLote,
            'users_id' => auth()->user()->id
        ];

        if(($request->file('Croquis')) != NULL){
            $Croquis = $request->file('Croquis')->store('public/croquis/' . $request->ClaveLote);
            $urlCroquis = Storage::url($Croquis);
            $data = array_merge($data, ['Croquis' => $urlCroquis]); 
        }

        
        $lote->update($data);
        
        return redirect()->route('lotes.show', $lote)->with('mensaje', 'Registro actualizado');
            
    }

    
    public function destroy(Lote $lote){
        $lote->delete();

        return redirect()->route('lotes.index')->with('eliminar','ok');
    }

    public function print(Lote $lote){
    
        return view('lotes.print' , compact('lote'));
    }
}
