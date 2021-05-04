<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escritura extends Model
{
    use HasFactory;

    //Asignación Masiva Update
    protected $fillable = [ 'FolioEscritura',
                          'FechaEscritura',
                          'FirmaPosesionario',
                          'FirmaDirector',
                          'Forma3DCC',
                          'FechaIngresoRPP',
                          'OficioRPP',
                          'FolioRealElectronico',
                          'FechaInscripcionRPP',
                          'FechaEntrega',
                          'ObservacionesEscritura',
                          'asignados_id',
                          'directors_id'
                        ];


     //Relación uno a uno (inversa)
     public function asignados()
     {
       return $this->belongsTo(Asignado::class);
     }

     //Relación uno a muchos
    public function directors(){
        return $this->belongsTo(Director::class);
      }
}
