<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignado extends Model
{
    use HasFactory;

    //Asignación Masiva Update
    protected $fillable = ['posesionarios_id',
                             'lotes_id',
                              'ClaveContrato',
                              'CostoLote',
                              'CostoEscrituras',
                              'TipoContrato',
                              'FechaContrato',
                              'Mensualidades',
                              'ObservacionesAsignado'];


    //Relación uno a uno (inversa)
    public function posesionarios()
    {
      return $this->belongsTo(Posesionario::class);
    }
    public function lotes()
    {
      return $this->belongsTo(Lote::class);
    }

    //Relación uno a muchos
    public function pagos(){
      return $this->hasMany(Pago::class);
    }

    public function inspeccions(){
      return $this->hasMany(Inspeccion::class);
    }

    //Relación uno a uno
    public function escrituras(){
      return $this->hasOne(Escritura::class);
  }
}
