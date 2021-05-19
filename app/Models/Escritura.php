<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escritura extends Model
{
    use HasFactory;

     //Relación uno a uno (inversa)
    public function asignados(){
       return $this->belongsTo(Asignado::class);
     }

     //Relación uno a muchos
    public function directors(){
        return $this->belongsTo(Director::class);
    }

    //Relación uno a muchos (inversa)
    public function users(){
      return $this->belongsTo(User::class);
    }
}
