<?php

use App\Notificacion;
use Illuminate\Database\Seeder;

class NotificacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Notificacion::class, 10)->create();
    }
}
