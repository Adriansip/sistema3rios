<?php

use Illuminate\Database\Seeder;
use App\Unidades;
use App\Transportistas;

class UnidadesTableSeeder extends Seeder
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

        $unidad=new Unidades();
        $unidad->idTipoUnidad=1;        
        $unidad->max=3;
        $unidad->save();
        $unidad->transportistas()->attach($acuma->idTransportista);


        $unidad=new Unidades();
        $unidad->idTipoUnidad=1;        
        $unidad->max=3;
        $unidad->save();
        $unidad->transportistas()->attach($auntrasportesMoce->idTransportista);


        $unidad=new Unidades();
        $unidad->idTipoUnidad=3;
        $unidad->min=14;        
        $unidad->save();
        $unidad->transportistas()->attach($mJLogistica->idTransportista);
    }
}
