<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use App\Estado;
use App\Solicitud;
use App\Tramite;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Solicitud::class, function (Faker $faker) {
    return [

       	'fecha' => Carbon::now(),
       	'solicitud' => $faker->name,
		'respuesta' => $faker->name,
		'descripcion' => $faker->name,
		'status' => $faker->name,
		'tramite_id' => Tramite::all()->random()->id,
		'user_id' => User::where('rol_id',2)->get()->random()->id,
		'cliente_id' => Cliente::all()->random()->id,


    ];
});
