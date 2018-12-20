<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Observaciones;

class Observaciones extends Model
{
     protected $table="observaciones";

	protected $fillable=[
		'observacion',
	];

	protected $primaryKey='idObservacion';
	
	public function estatus(){		
		return $this->belongsTo(Estatus::class);
	}	
}
