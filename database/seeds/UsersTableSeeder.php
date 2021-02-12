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

        	'name' => 'Pablo' ,
            'apellido' => 'Perez',
            'usuario' => 'administrador',
            'ci' => 12345098,
            'avatar' => 'defect.jpg' ,
            'email' =>  'pablo@gmail.com',
            'password' => bcrypt(1234),
            'rol_id' => 1,

    	]);

    	//usuario encargado de registrar las visitas
    	User::create([

        	'name' => 'Maria' ,
            'apellido' => 'Marino',
            'usuario' => 'Maria22',
             'ci' => 12379506,
            'avatar' => 'defect.jpg' ,
            'email' =>  'maria@gmail.com',
            'password' => bcrypt(1234),
            'rol_id' => 2,

    	]);

    	//usuario encargado de registrar las visitas
    	User::create([

        	'name' => 'gabriel' ,
            'apellido' => 'viloria',
            'usuario' => 'vilo',
             'ci' => 1960783,
            'avatar' => 'defect.jpg' ,
            'email' =>  'vilo@gmail.com',
            'password' => bcrypt(1234),
            'rol_id' => 2,

    	]);

    	//usuario encargado de registrar las visitas
    	User::create([

        	'name' => 'Carlos' ,
            'apellido' => 'bompesa',
            'usuario' => 'Bompensa12',
             'ci' => 98595724,
            'avatar' => 'defect.jpg' ,
            'email' =>  'carlos@gmail.com',
            'password' => bcrypt(1234),
            'rol_id' => 2,

    	]);

    	//usuario encargado de registrar las visitas
    	User::create([

        	'name' => 'Jesus' ,
            'apellido' => 'Salazar',
            'usuario' => 'Jesus1',
             'ci' => 340503221,
            'avatar' => 'defect.jpg' ,
            'email' =>  'jesus@gmail.com',
            'password' => bcrypt(1234),
            'rol_id' => 2,

    	]);

    	factory(User::class, 200)->create();
    }
}
