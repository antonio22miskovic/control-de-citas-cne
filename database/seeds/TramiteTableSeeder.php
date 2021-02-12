<?php

use App\Tramite;
use Illuminate\Database\Seeder;

class TramiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tramite::create([

        	'tramite' => 'Pasaporte'

        ]);

         Tramite::create([

        	'tramite' => 'Documentos Legales'

        ]);

          Tramite::create([

        	'tramite' => 'Tramite de Legalización'

        ]);

          Tramite::create([

        	'tramite' => 'Soliciut de Documentos'

        ]);
    }
}
