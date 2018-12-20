<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapturadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capturadores', function (Blueprint $table) {
            $table->increments('idCapturador');
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('contrasenia');
            $table->string('telefono',15);
            $table->Integer('idCiudad');
            $table->text('direccion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capturadores');
    }
}
