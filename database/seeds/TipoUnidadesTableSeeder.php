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
        $tipoUnidad->save();

        $tipoUnidad=new TipoUnidades();
        $tipoUnidad->tipoUnidad="Thorton";
        $tipoUnidad->save();

        $tipoUnidad=new TipoUnidades();
        $tipoUnidad->tipoUnidad="Tracto";
        $tipoUnidad->save();
    }
}
