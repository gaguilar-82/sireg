<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Concepto;

class ConceptoController extends Controller
{
    public function index()
    {
        $conceptos = Concepto::all();
        return view('admin.conceptos.index', compact('conceptos'));
    }

    public function edit(Concepto $concepto)
    {
        return view('admin.conceptos.edit', compact('concepto'));
    }

    public function update(Request $request, Concepto $concepto)
    {
        $request->validate([
            'Clave' => 'required|max:255',
            'NombreConcepto' => 'required|max:255',
            'ValorConcepto' => 'required',
        ]);


        $concepto->Clave = $request->Clave;
        $concepto->NombreConcepto = $request->NombreConcepto;
        $concepto->ValorConcepto = $request->ValorConcepto;

        $concepto->update();

        return back()->with('mensaje', 'Concepto actualizado');
    }
}
