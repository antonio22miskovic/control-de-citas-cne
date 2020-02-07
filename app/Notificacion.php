<?php

namespace App;

use App\Estado;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{

	protected $table = 'notificacions';

	protected $fillable = [

		'asunto',
		'descripcion',


	];


    // MUCHOS A uno con estados
    public function estado(){

      return $this->belongsTo(Estado::class);
    }

}
