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

       		'estado' => 'Activo'

       	]);

       	Estado::create([

       		'estado' => 'Desabilitado'

       	]);

       	Estado::create([

       		'estado' => 'En espera'

       	]);

       		Estado::create([

       		'estado' => 'Urgencia'

       	]);

    }
}
