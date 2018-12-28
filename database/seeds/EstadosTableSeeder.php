<?php

use Illuminate\Database\Seeder;
use App\Estados;
class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado=new Estados();
        $estado->estado="Aguascalientes";
        $estado->abreviacion="Ags";
        $estado->save();
    }
}
