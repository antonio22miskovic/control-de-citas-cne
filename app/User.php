<?php

namespace App;

use App\Cliente;
use App\Notificacion;
use App\Rol;
use App\Solicitud;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name',
        'apellido',
        'usuario',
        'ci',
        'avatar',
        'email',
        'password',
        'rol_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // MUCHOS A uno con rol
    public function rol(){

      return $this->belongsTo(Rol::class);
    }

     // de uno a muchos con solicitudes
    public function solicitudes(){

        return $this->hasMany(Solicitud::class);
    }

    public function cliente(){

        return $this->hasOne(Cliente::class);
    }

}
