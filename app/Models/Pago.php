<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    //Relación uno a muchos (inversa)
    public function asignados(){
        return $this->belongsTo(Asignado::class)->withTrashed();
    }

    //Relación uno a muchos (inversa)
    public function conceptos(){
        return $this->belongsTo(Concepto::class);
    }

    //Relación uno a muchos (inversa)
    public function users(){
        return $this->belongsTo(User::class);
    }
}
