<?php

use Illuminate\Database\Seeder;
use App\Placas;

class PlacasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $placa=new Placas();
        $placa->noPlaca="KW68484";
        $placa->idTipoUnidad=1;
        $placa->save();


        $placa=new Placas();
        $placa->noPlaca="LC-14-648";
        $placa->idTipoUnidad=2;
        $placa->save();


        $placa=new Placas();
        $placa->noPlaca="68AG8K";
        $placa->idTipoUnidad=3;
        $placa->save();



    }
}
