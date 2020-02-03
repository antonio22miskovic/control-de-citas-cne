<?php

use App\Solicitud_User;
use Illuminate\Database\Seeder;

class SolicitudUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Solicitud_User::class,40)->create();
    }
}
