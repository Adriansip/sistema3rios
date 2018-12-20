<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capturistas extends Model
{
    protected $table="capturadores";

	protected $fillable=[
		'idCapturador','nombre','correo','telefono','idCiudad','direccion',
	];

}
