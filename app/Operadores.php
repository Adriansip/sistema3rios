<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operadores extends Model
{
	protected $table='operadores';

    protected $fillable=['idOperador','idPlaca','nombre','apellido'];

    public function placa()
    {
    	return $this->belongsTo(Placas::class,'idPlaca');
    }
}
