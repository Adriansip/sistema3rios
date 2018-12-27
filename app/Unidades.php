<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidades extends Model
{
    protected $table='unidades';

    protected $fillable=['idUnidad','idTipoUnidad','min','max'];

      public function transportistas()
    {
    	return $this->belongsToMany(Transportistas::class,'transportistas_unidad','idUnidad','idTransportista')->withTimestamps();
    }
}
