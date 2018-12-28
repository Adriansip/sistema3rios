<?php

use Illuminate\Database\Seeder;
use App\TipoUnidades;

class TipoUnidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoUnidad=new TipoUnidades();
        $tipoUnidad->tipoUnidad="Camioneta";
        $tipoUnidad->max=3;
        $tipoUnidad->save();        

        $tipoUnidad=new TipoUnidades();
        $tipoUnidad->tipoUnidad="Thorton";
        $tipoUnidad->min=3;
        $tipoUnidad->max=14;
        $tipoUnidad->save();        

        $tipoUnidad=new TipoUnidades();
        $tipoUnidad->tipoUnidad="Tracto";
        $tipoUnidad->min=14;
        $tipoUnidad->save();        
    }
}
