<?php

namespace App;

use App\Cliente;
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
		'user_id',
		'cliente_id',
		'status'


	];

	//muchos a uno con user
    public function user(){

    return $this->belongsTo(User::class);

	}

	// MUCHOS A uno con tramites
    public function tramite(){

      return $this->belongsTo(Tramite::class);
    }

    // MUCHOS A uno con estados
    public function estado(){

      return $this->belongsTo(Estado::class);
    }

    public function cliente(){

      return $this->belongsTo(Cliente::class);
    }


}
