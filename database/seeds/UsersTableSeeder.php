<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//usuario administrador
    	User::create([

    	'name' => 'ramon' ,
        'apellido' => 'villalobos',
        'usuario' => 'antonio',
        'avatar' => 'defect.jpg' ,
        'email' =>  'villalobosantonio79@gmail.com',
        'password' => bcrypt(1234),
        'rol_id' => 1,

    	]);

    	//usuario encargado de registrar las visitas
    	User::create([

    	'name' => 'deyker' ,
        'apellido' => 'gil',
        'usuario' => 'eldeyker',
        'avatar' => 'defect.jpg' ,
        'email' =>  'deykergil@gmail.com',
        'password' => bcrypt(1234),
        'rol_id' => 2,

    	]);

    	//usuario encargado de registrar las visitas
    	User::create([

    	'name' => 'gabriel' ,
        'apellido' => 'viloria',
        'usuario' => 'vilo',
        'avatar' => 'defect.jpg' ,
        'email' =>  'vilo@gmail.com',
        'password' => bcrypt(1234),
        'rol_id' => 2,

    	]);

    	//usuario encargado de registrar las visitas
    	User::create([

    	'name' => 'giancarlos' ,
        'apellido' => 'bompesa',
        'usuario' => 'risa',
        'avatar' => 'defect.jpg' ,
        'email' =>  'giancarlos@gmail.com',
        'password' => bcrypt(1234),
        'rol_id' => 2,

    	]);

    	//usuario encargado de registrar las visitas
    	User::create([

    	'name' => 'jesus' ,
        'apellido' => 'soto',
        'usuario' => 'sotosaurio',
        'avatar' => 'defect.jpg' ,
        'email' =>  'soto@gmail.com',
        'password' => bcrypt(1234),
        'rol_id' => 2,

    	]);

    	factory(User::class, 200)->create();
    }
}
