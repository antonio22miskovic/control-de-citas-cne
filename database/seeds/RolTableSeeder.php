<?php

use App\Rol;
use Illuminate\Database\Seeder;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Rol::create([

        	'rol' => 'administrador'

        ]);

        Rol::create([

        	'rol' => 'encargado'

        ]);

         Rol::create([

        	'rol' => 'persona natural'

        ]);

    }

}
