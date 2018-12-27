<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {        
         // La creación de datos de roles debe ejecutarse primero
    	$this->call(RolTableSeeder::class);
    	// Los usuarios necesitarán los roles previamente generados
    	$this->call(UserTableSeeder::class);


        $this->call(TransportistasTableSeeder::class);

        $this->call(TipoUnidadesTableSeeder::class);

        $this->call(UnidadesTableSeeder::class);

        $this->call(PlacasTableSeeder::class);

        $this->call(OperadoresTableSeeder::class);
    }
}
