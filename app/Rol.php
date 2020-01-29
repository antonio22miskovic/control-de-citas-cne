<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
	protected $table = 'rols';

	protected $fillable = [

		'rol',

	];

	 // de uno a muchos con usuarios
    public function usuarios(){

       return $this->hasMany(User::class);

    }


}
