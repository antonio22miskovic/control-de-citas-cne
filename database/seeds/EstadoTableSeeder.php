<?php

use App\Estado;
use Illuminate\Database\Seeder;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	Estado::create([

       		'estado' => 'activo'

       	]);

       	Estado::create([

       		'estado' => 'desabilitado'

       	]);

       	Estado::create([

       		'estado' => 'en espera'

       	]);

       		Estado::create([

       		'estado' => 'urgencia'

       	]);

    }
}
