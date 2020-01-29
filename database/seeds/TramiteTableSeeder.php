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

        	'tramite' => 'tramite1'

        ]);

         Tramite::create([

        	'tramite' => 'tramite2'

        ]);

          Tramite::create([

        	'tramite' => 'tramite3'

        ]);

          Tramite::create([

        	'tramite' => 'tramite4'

        ]);
    }
}
