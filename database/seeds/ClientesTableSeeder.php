<?php

use Illuminate\Database\Seeder;
use App\Clientes;
class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cliente=new Clientes();
        $cliente->nombre="Kimberly Clark";
        $cliente->correo="kimberly@gmail.com";
        $cliente->telefono="12345678";
        $cliente->idCiudad=1;
        $cliente->direccion="Av Las Torres 87, Col. Olimpica Jajalpa, Ecatepec de Morelos, México, CP 55090";
        $cliente->distancia=22;
        $cliente->save();
    }
}
