<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    //Asignación Masiva Update
    protected $fillable = ['ClaveLote',
                             'Macrolote',
                              'Etapa',
                              'Seccion',
                              'Poligono',
                              'Supermanzana',
                              'Manzana',
                              'NumLote',
                              'Casa',
                              'Superficie',
                              'Colindancia1',
                              'Colindancia2',
                              'Colindancia3',
                              'Colindancia4',
                              'Latitud',
                              'Longitud',
                              'CodigoPostal',
                              'Uso',
                              'AltoRiesgo',
                              'Afectacion',
                              'Subdivision',
                              'Fusion',
                              'Actualizacion',
                              'ConflictoLegal',
                              'ObservacionesLote',
                              'Croquis',
                              'colonias_id'
                            ];

    //Relación uno a muchos (inversa)
    public function colonias(){
        return $this->belongsTo(Colonia::class);
    }

    //Relación uno a uno
    public function asignados(){
        return $this->hasOne(Asignado::class);
    }
}
