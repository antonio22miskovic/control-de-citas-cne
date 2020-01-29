<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Estado;
use App\Solicitud;
use App\Tramite;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Solicitud::class, function (Faker $faker) {
    return [

       	'fecha' => Carbon::now(),
		'respuesta' => $faker->name,
		'descripcion' => $faker->name,
		'tramite_id' => Tramite::all()->random()->id,
		'estado_id' => Estado::all()->random()->id,

    ];
});
