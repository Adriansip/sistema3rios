<?php

use Illuminate\Database\Seeder;
use App\Tarifas;

class TarifasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tarifa=new Tarifas();
        $tarifa->idCliente=1;
        $tarifa->camioneta=1.10;
        $tarifa->thorton=0.60;
        $tarifa->tracto=0.46;
        $tarifa->save();
    }
}
