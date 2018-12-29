<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranPlacas extends Model
{
    protected $table='transportistas_placas';

    protected $fillable=['id','idTransportista','idPlaca'];

    protected $primaryKey='id';

    public function placas()
    {
    	return $this->belongsTo(Placas::class,'idPlaca');
    }

    public function transportistas()
    {
    	return $this->belongsTo(Transportistas::class,'idTransportista');	
    }
}
