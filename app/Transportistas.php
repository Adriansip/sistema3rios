<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportistas extends Model
{
    protected $table='transportistas';

    protected $fillable=['idTransportista','transportista'];

    public function unidades()
    {
    	return $this->belongsToMany(Unidades::class,'transportistas_unidad','idTransportista','idUnidad')->withTimestamps();
    }
}
