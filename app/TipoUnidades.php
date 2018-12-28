<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUnidades extends Model
{
    protected $table='tipo_unidades';

    protected $fillable=['idTipoUnidad','tipoUnidad','min','max'];

    protected $primaryKey='idTipoUnidad';


     //Cada unidad tiene asignado un numero de placa
    public function placas()
    {
    	return $this->belongsTo(Placas::class,'idTipoUnidad');	
    }

   
}
