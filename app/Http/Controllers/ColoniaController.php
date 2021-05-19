<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Colonia;
use Illuminate\Http\Request;
use App\Http\Requests\StoreColonia;
use Illuminate\Validation\Rule;


class ColoniaController extends Controller
{
    public function index(){
        $municipios = Municipio::all();
        $colonias = Colonia::all();
        
      
        return view('colonias.index', compact('municipios','colonias'));
    }

    public function store(StoreColonia $request){

              
        $colonia = new Colonia();

        $colonia->NombreColonia = $request->NombreColonia;
        $colonia->TipoColonia = $request->TipoColonia;
        $colonia->ClaveColonia = $request->ClaveColonia;
        $colonia->ValorMetroCuadrado = $request->ValorMetroCuadrado;
        $colonia->TituloPropiedad = $request->TituloPropiedad;
        $colonia->Lotificacion = $request->Lotificacion;
        $colonia->SuperficieAdquirida = $request->SuperficieAdquirida;
        $colonia->ObservacionesColonia = $request->ObservacionesColonia;
        $colonia->municipios_id = $request->municipios_id;
        $colonia->users_id = auth()->user()->id;
 
        $colonia->save();

        return back()->with('mensaje', 'Colonia agregada');
    }

    public function show(Colonia $colonia){
        return view('colonias.show' , compact('colonia'));
    }

    public function edit(Colonia $colonia){
        $municipios = Municipio::all();
        return view('colonias.edit', compact('municipios','colonia'));
    }

    public function update(Request $request, Colonia $colonia){
        
        $request->validate([
            'NombreColonia' => 'required',
            'TipoColonia' => 'required',
            'municipios_id' => 'required',
            'ClaveColonia' => ['required',
                                'max:9',
                                'min:7', 
                                Rule::unique('Colonias')->ignore($colonia->id)
                            ],
            'ValorMetroCuadrado' => 'required|regex:/^\d*(\.\d{1,2})?$/',
        ]);

        $colonia->NombreColonia = $request->NombreColonia;
        $colonia->TipoColonia = $request->TipoColonia;
        $colonia->ClaveColonia = $request->ClaveColonia;
        $colonia->ValorMetroCuadrado = $request->ValorMetroCuadrado;
        $colonia->TituloPropiedad = $request->TituloPropiedad;
        $colonia->Lotificacion = $request->Lotificacion;
        $colonia->SuperficieAdquirida = $request->SuperficieAdquirida;
        $colonia->ObservacionesColonia = $request->ObservacionesColonia;
        $colonia->municipios_id = $request->municipios_id;
        $colonia->users_id = auth()->user()->id;

        $colonia->update();
        
        return redirect()->route('colonias.show', $colonia)->with('mensaje', 'Registro actualizado');
            
    }

    public function destroy(Colonia $colonia){
        $colonia->delete();

        return redirect()->route('colonias.index')->with('eliminar','ok');
    }
}
