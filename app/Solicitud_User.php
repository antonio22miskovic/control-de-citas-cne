<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud_User extends Model
{
	protected $table = 'solicitud_user';

	protected $fillable = [

		'user_id',
		'solicitud_id',

	];

}
