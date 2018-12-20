<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Roles;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol_usuario=Roles::where('rol','invitado')->first();
        $rol_admin=Roles::where('rol','admin')->first();

        $usuario=new User();
        $usuario->name="Invitado";
        $usuario->email='example@gmail.com';
        $usuario->password=bcrypt('1234');
        $usuario->save();
        $usuario->roles()->attach($rol_usuario);

        $usuario=new User();
        $usuario->name="Adrian";
        $usuario->email='adrian@gmail.com';
        $usuario->password=bcrypt('a8795%()');
        $usuario->save();
        $usuario->roles()->attach($rol_admin);
    }
}
