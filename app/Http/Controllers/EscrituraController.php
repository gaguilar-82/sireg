<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEscritura;
use App\Models\Asignado;
use App\Models\Director;
use App\Models\Escritura;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade as PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;



class EscrituraController extends Controller
{
    public function index(){
        $directores = Director::all();
        $asignados = Asignado::where('ParaEscriturar','=', 'Sí')->get();
        $escrituras = Escritura::all();
                           
        return view('escrituras.index', compact('directores','asignados','escrituras'));
    }

    public function store(StoreEscritura $request)
    {
        $escritura = new Escritura();

        $escritura->FolioEscritura = $request->FolioEscritura;
        $escritura->FechaEscritura = $request->FechaEscritura;
        $escritura->asignados_id = $request->asignados_id;
        $escritura->directors_id = $request->directors_id;
        $escritura->ObservacionesEscritura = $request->ObservacionesEscritura;
        $escritura->users_id = auth()->user()->id;

        $escritura->save();

        return back()->with('mensaje', 'Escritura guardada');
    }

    public function show(Escritura $escritura){
        return view('escrituras.show' , compact('escritura'));
    }

    public function edit(Escritura $escritura){
        $directores = Director::all();
        $asignados = Asignado::all();
                           
        return view('escrituras.edit', compact('directores','asignados','escritura'));
    }

    public function update(Request $request, Escritura $escritura){
        
        $request->validate([          
            'FolioEscritura' => ['required',
                            Rule::unique('Escrituras')->ignore($escritura->id)
                        ],
            'FechaEscritura' => 'required',
            'asignados_id' => ['required',
                            Rule::unique('Escrituras')->ignore($escritura->id)
                        ],
            'directors_id' => 'required',
        ]);

        $escritura->FolioEscritura = $request->FolioEscritura;
        $escritura->FechaEscritura = $request->FechaEscritura;
        $escritura->asignados_id = $request->asignados_id;
        $escritura->directors_id = $request->directors_id;
        $escritura->ObservacionesEscritura = $request->ObservacionesEscritura;
        $escritura->users_id = auth()->user()->id;

        $escritura->update();
        
        return redirect()->route('escrituras.show', $escritura)->with('mensaje', 'Registro actualizado');
            
    }

    public function destroy(Escritura $escritura){
        $escritura->delete();

        return redirect()->route('escrituras.index')->with('eliminar','ok');
    }

    public function print(Escritura $escritura){
    
        return view('escrituras.print' , compact('escritura'));
    }

    public function pdf(Escritura $escritura){
        
        $pdf = PDF::loadView('escrituras.pdf', compact('escritura'));

        $pdf->setPaper("Legal", "portrait");

        return $pdf->stream('escritura.pdf');
    
        /* return view('escrituras.pdf' , compact('escritura')); */
    }
}
