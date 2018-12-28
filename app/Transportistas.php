<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportistas extends Model
{
    protected $table='transportistas';

    protected $fillable=['idTransportista','transportista'];

    protected $primaryKey='idTransportista';

    public function tipoUnidades()
    {
    	return $this->belongsToMany(TipoUnidades::class,'transportistas_unidad','idTransportista','idTipoUnidad')->withTimestamps();
    }
}
