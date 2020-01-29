<?php

namespace App;

use App\Solicitud;
use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $table = 'tramites';

    protected $fillable = [

    	'tramite',

    ];

      // de uno a muchos con solicitudes
    public function solicitudes(){

       return $this->hasMany(Solicitud::class);
    }



}
