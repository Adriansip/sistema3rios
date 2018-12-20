<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Observaciones;
use App\Bitacora;

class Estatus extends Model
{
    protected $table="estatus";

	protected $fillable=[
		'idEstatus','idBitacora','idCapturador','lugar','noTransito','fecha','hora','idObservacion','otro',
	];

	protected $primaryKey='idEstatus';

	public function observacion(){		
		return $this->belongsTo(Observaciones::class,'idObservacion');
	}

	public function bitacora(){		
		return $this->belongsTo(Bitacora::class,'idBitacora');
	}
}
