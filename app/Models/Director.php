<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    //Relación uno a muchos (inversa)
    public function escrituras(){
        return $this->hasMany(Escritura::class);
    }
}
