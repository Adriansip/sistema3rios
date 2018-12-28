<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarifas extends Model
{
    protected $table='tarifas';

    protected $fillable=['idTarifa','idCliente','camioneta','thorton','tracto','otro'];

    public function cliente()		
    {
    	return $this->hasOne(Clientes::class,'idCliente');
    }


}
