<?php

use Illuminate\Database\Seeder;
use App\Placas;
use App\Transportistas;

class PlacasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $acuma=Transportistas::where('transportista','ACUMA')->first();
        $auntrasportesMoce=Transportistas::where('transportista','Auntrasportes Moce')->first();
        $mJLogistica=Transportistas::where('transportista','MJ Logistica')->first();


        $placa=new Placas();
        $placa->noPlaca="KW68484";
        $placa->idTipoUnidad=1;
        $placa->save();
        $placa->transportistas()->attach($acuma->idTransportista);


        $placa=new Placas();
        $placa->noPlaca="LC-14-648";
        $placa->idTipoUnidad=2;
        $placa->save();
        $placa->transportistas()->attach($auntrasportesMoce->idTransportista);


        $placa=new Placas();
        $placa->noPlaca="68AG8K";
        $placa->idTipoUnidad=3;
        $placa->save();
        $placa->transportistas()->attach($mJLogistica->idTransportista);



    }
}
