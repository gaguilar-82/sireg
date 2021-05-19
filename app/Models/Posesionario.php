<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posesionario extends Model
{
    use HasFactory;
    protected $fillable = ['NombrePosesionario',
                             'ApellidoPaterno',
                             'ApellidoMaterno',
                             'LugarNacimiento',
                             'FechaNacimiento',
                             'EstadoCivil',
                             'Ocupacion',
                             'Telefono',
                             'ActaNacimiento',
                             'ActaMatrimonio',
                             'ActaHijos',
                             'IdentificacionOficial',
                             'ComprobanteDomicilio',
                             'ConstanciaNoPropiedad',
                             'ConstanciaSolteria',
                             'PoderNotarial',
                             'ObservacionesPosesionario'
                            ];
                            
    //Relación uno a uno
    public function asignados(){
        return $this->hasOne(Asignado::class);
    }

    //Relación uno a muchos (inversa)
    public function users(){
        return $this->belongsTo(User::class);
    }
}
