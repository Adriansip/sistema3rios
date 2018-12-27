<?php

use Illuminate\Database\Seeder;
use App\Operadores;

class OperadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $operador=new Operadores();
        $operador->idPlaca=1;
        $operador->nombre="Oscar";
        $operador->apellido="Favela";
        $operador->save();


        $operador=new Operadores();
        $operador->idPlaca=2;
        $operador->nombre="Martin";
        $operador->apellido="Lopez";
        $operador->save();


        $operador=new Operadores();
        $operador->idPlaca=3;
        $operador->nombre="Cesar";
        $operador->apellido="Trujillo";
        $operador->save();
    }
}
