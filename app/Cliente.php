<?php

namespace App;

use App\Solicitud;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

protected $table= 'clientes';

protected $fillable = [

	'user_id'

];

public function solicitudes(){

	return $this->hasMany(Solicitud::class);
}

public function user(){

	return $this->belongsTo(User::class);

}

}
