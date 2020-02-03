<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
/**
* Seed the application's database.
*
* @return void
*/
public function run()
{
    $this->call(RolTableSeeder::class);
    $this->call(UsersTableSeeder::class);
    $this->call(TramiteTableSeeder::class);
// $this->call(EstadoTableSeeder::class);
    $this->call(NotificacionTableSeeder::class);
    $this->call(ClienteTableSeeder::class);

    $this->call(SolicitudTableSeeder::class);
// $this->call(SolicitudUserSeeder::class);


}
}
