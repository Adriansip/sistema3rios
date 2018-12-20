<?php

use Illuminate\Database\Seeder;
use App\Roles;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol=new Roles();
        $rol->rol='admin';
        $rol->descripcion='Administrador';
        $rol->save();

        $rol=new Roles();
        $rol->rol='invitado';
        $rol->descripcion='Invitado';
        $rol->save();
    }
}
