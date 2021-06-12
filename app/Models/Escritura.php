<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Escritura extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

     //Relación uno a uno (inversa)
    public function asignados(){
       return $this->belongsTo(Asignado::class)->withTrashed();
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
