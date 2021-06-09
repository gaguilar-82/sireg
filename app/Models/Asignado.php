<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asignado extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    //Relación uno a uno (inversa)
    public function posesionarios()
    {
      return $this->belongsTo(Posesionario::class)->withTrashed();
    }
    public function lotes()
    {
      return $this->belongsTo(Lote::class)->withTrashed();
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

    //Relación uno a muchos (inversa)
    public function users(){
      return $this->belongsTo(User::class);
    }
}
