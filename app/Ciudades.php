<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Estados;

class Ciudades extends Model
{
	protected $table="ciudades";

	protected $fillable=[
		'idEstado','ciudad',
	];

	protected $primaryKey='idCiudad';


    public function estado(){
    	return $this->belongsTo('App\Estados','idEstado');
    }
}
