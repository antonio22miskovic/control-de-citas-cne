<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Estado;
use App\Notificacion;
use Faker\Generator as Faker;

$factory->define(Notificacion::class, function (Faker $faker) {
    return [

       	'asunto' => $faker->name,
		'descripcion' => $faker->name,
		'estado_id' => Estado::all()->random()->id,

    ];
});
