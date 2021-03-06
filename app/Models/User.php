<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use JeroenNoten\LaravelAdminLte\AdminLte;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function adminlte_desc(){
        return "Administrador";
    }

    //Relación uno a muchos
    public function colonias(){
        return $this->hasMany(Colonia::class);
    }

    //Relación uno a muchos
    public function lotes(){
        return $this->hasMany(Lote::class);
    }

    //Relación uno a muchos
    public function posesionarios(){
        return $this->hasMany(Posesionario::class);
    }

    //Relación uno a muchos
    public function asignados(){
        return $this->hasMany(Asignado::class);
    }

    //Relación uno a muchos
    public function inspeccions(){
        return $this->hasMany(Inspeccion::class);
    }

    //Relación uno a muchos
    public function pagos(){
        return $this->hasMany(Pago::class);
    }

    //Relación uno a muchos
    public function escrituras(){
        return $this->hasMany(Escritura::class);
    }    
}
