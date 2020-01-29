<?php

namespace App;

use App\Notificacion;
use App\Solicitud;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';

    protected $fillable = [

    	'estado'

    ];

     // de uno a muchos con solicitudes
    public function solicitudes(){

       return $this->hasMany(Solicitud::class);

    }

     // de uno a muchos con notificaciones
    public function notificaciones(){

       return $this->hasMany(Notificacion::class);

    }

}
