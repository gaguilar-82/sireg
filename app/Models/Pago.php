<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    //Asignación Masiva Update
    protected $fillable = ['asignados_id',
                             'FolioPago',
                              'FechaPago',
                              'conceptos_id',
                              'CantidadPago',
                              'ObservacionesPago'
                            ];

    //Relación uno a muchos (inversa)
    public function asignados(){
        return $this->belongsTo(Asignado::class);
    }

    //Relación uno a muchos (inversa)
    public function conceptos(){
        return $this->belongsTo(Concepto::class);
    }
}
