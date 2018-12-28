<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Placas extends Model
{
	protected $table='placas';

    protected $fillable=['idPlaca','noPlaca','idTipoUnidad'];

    public function unidad()
    {
    	return $this->belongsTo(Unidades::class,'idTipoUnidad');
    }

    public function operador()
    {
    	return $this->belongsTo(Operadores::class);
    }
}
