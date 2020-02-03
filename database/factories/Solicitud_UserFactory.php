<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Solicitud;
use App\Solicitud_User;
use App\User;
use Faker\Generator as Faker;

$factory->define(Solicitud_User::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'solicitud_id' => Solicitud::all()->random()->id,
    ];
});
