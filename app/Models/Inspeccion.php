<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspeccion extends Model
{
    use HasFactory;

    //Asignación Masiva Update
    protected $guarded = [];

    //Relación uno a muchos (inversa)
    public function asignados(){
        return $this->belongsTo(Asignado::class);
    }

    //Relación uno a muchos (inversa)
    public function inspectors(){
        return $this->belongsTo(Inspector::class);
    }
    
}
