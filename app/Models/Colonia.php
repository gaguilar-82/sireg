<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colonia extends Model
{
    use HasFactory;

    //Asignación Masiva Update
    protected $fillable = ['NombreColonia',
                             'TipoColonia',
                              'municipios_id',
                              'ClaveColonia',
                              'ValorMetroCuadrado',
                              'TituloPropiedad',
                              'Lotificacion',
                              'SuperficieAdquirida',
                              'ObservacionesColonia'];

       
    //Relación uno a muchos
    public function lotes(){
        return $this->hasMany(Lote::class);
    }

    //Relación uno a muchos (inversa)
    public function municipios(){
        return $this->belongsTo(Municipio::class);
    }
}
