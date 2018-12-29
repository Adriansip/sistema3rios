<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Placas extends Model
{
	protected $table='placas';

    protected $fillable=['idPlaca','noPlaca','idTipoUnidad'];

    protected $primaryKey='idPlaca';

     public function transportistas()
    {
        return $this->belongsToMany(Transportistas::class,'transportistas_placas','idPlaca','idTransportista')->withTimestamps();
    }

    public function operador()
    {
    	return $this->belongsTo(Operadores::class,'idOperador');
    }

    public function unidad()
    {
        return $this->belongsTo(TipoUnidades::class,'idTipoUnidad');   
    }
}
