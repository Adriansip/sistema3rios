<?php

use Illuminate\Database\Seeder;
use App\Ciudades;

class CiudadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ciudad=new Ciudades();
        $ciudad->idEstado=1;
        $ciudad->ciudad="Aguascalientes";
        $ciudad->save();
    }
}
