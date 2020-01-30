<?php

namespace App;

use App\Estado;
use App\Tramite;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
	protected $table = 'solicituds';

	protected $fillable = [

		'fecha',
		'solicitud',
		'respuesta',
		'descripcion',
		'tramite_id',
		'estado_id',

	];

	//muchos a muchos
    public function usuarios(){

    return $this->belongsToMany(User::class);

	}

	// MUCHOS A uno con tramites
    public function tramite(){

      return $this->belongsTo(Tramite::class);
    }

    // MUCHOS A uno con estados
    public function estado(){

      return $this->belongsTo(Estado::class);
    }


}
