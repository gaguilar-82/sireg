<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Colonia;

class HomeController extends Controller
{
    public function index(){
      $invisur = Colonia::where('TipoColonia','=', 'PATRIMONIO INVISUR')->count();
      $crett = Colonia::where('TipoColonia','=', 'PATRIMONIO CRETT')->count();
      $barrios = Colonia::where('TipoColonia','=', 'BARRIOS HISTÓRICOS')->count();
      $donacion = Colonia::where('TipoColonia','=', 'DONACIÓN CONDICIONAL')->count();
      $veladero = Colonia::where('TipoColonia','=', 'PARQUE NACIONAL EL VELADERO')->count();

        return view('admin.index', compact('invisur','crett','barrios','donacion','veladero'));
    }
}
