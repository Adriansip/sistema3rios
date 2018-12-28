<?php

use Illuminate\Database\Seeder;
use App\TipoUnidades;
use App\Transportistas;

class TipoUnidadesTableSeeder extends Seeder
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



        $tipoUnidad=new TipoUnidades();
        $tipoUnidad->tipoUnidad="Camioneta";
        $tipoUnidad->max=3;
        $tipoUnidad->save();
        $tipoUnidad->transportistas()->attach($acuma->idTransportista);

        $tipoUnidad=new TipoUnidades();
        $tipoUnidad->tipoUnidad="Thorton";
        $tipoUnidad->min=3;
        $tipoUnidad->max=14;
        $tipoUnidad->save();
        $tipoUnidad->transportistas()->attach($auntrasportesMoce->idTransportista);

        $tipoUnidad=new TipoUnidades();
        $tipoUnidad->tipoUnidad="Tracto";
        $tipoUnidad->min=14;
        $tipoUnidad->save();
        $tipoUnidad->transportistas()->attach($mJLogistica->idTransportista);
    }
}
