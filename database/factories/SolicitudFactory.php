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

       	'fecha' => Carbon::now()->month($faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12])),
       	'solicitud' => $faker->name,
		'respuesta' => $faker->name,
		'descripcion' => $faker->name,
		'status' => $faker->randomElement(['atendido', 'pendiente']),
		'tramite_id' => Tramite::all()->random()->id,
		'user_id' => User::where('rol_id',2)->get()->random()->id,
		'cliente_id' => Cliente::all()->random()->id,


    ];
});
