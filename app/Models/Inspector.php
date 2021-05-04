<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspector extends Model
{
    use HasFactory;

     //Relación uno a muchos
     public function inspeccions(){
        return $this->hasMany(Inspeccion::class);
    }
}
