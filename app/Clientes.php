<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table="clientes";

	protected $fillable=[
		'idCliente','nombre','correo','telefono','idCiudad','direccion','distancia',
	];

	protected $primaryKey='idCliente';

	public function bitacoras()
	{
		return $this->hasMany(Bitacoras::class,'idCliente');
	}

	public function ciudad()
	{
		return $this->belongsTo(Ciudades::class,'idCiudad');
	}

	public function tarifa()
	{
		return $this->belongsTo(Tarifas::class);
	}

}
