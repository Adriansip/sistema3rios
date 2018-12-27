<?php

use Illuminate\Database\Seeder;
use App\Transportistas;

class TransportistasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transportista=new Transportistas();
        $transportista->transportista="ACUMA";
        $transportista->save();

        $transportista=new Transportistas();
        $transportista->transportista="Auntrasportes Moce";
        $transportista->save();

        $transportista=new Transportistas();
        $transportista->transportista="MJ Logistica";
        $transportista->save();
    }
}
