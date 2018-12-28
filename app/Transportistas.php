<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportistas extends Model
{
    protected $table='transportistas';

    protected $fillable=['idTransportista','transportista'];

    protected $primaryKey='idTransportista';

    public function placas()
    {
    	return $this->belongsToMany(Placas::class,'transportistas_placas','idTransportista','idPlaca')->withTimestamps();
    }
}
