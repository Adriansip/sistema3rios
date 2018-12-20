<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estatus', function (Blueprint $table) {
            $table->increments('idEstatus');
            $table->Integer('idBitacora');
            $table->Integer('idCapturador');            
            $table->string('lugar');
            $table->Integer('noTransito');
            $table->date('fecha');
            $table->time('hora');
            $table->Integer('idObservacion');
            $table->text('otro')->nullable();
            $table->boolean('entregado')->nullable();
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
        Schema::dropIfExists('estatus');
    }
}
