<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table="bitacora";

	protected $fillable=[
		'idBitacora','idCliente','noEmbarque','kilosBrutos','kilosNetos','numeroTarimas',
	];

	protected $primaryKey='idBitacora';

	public function estatus()
	{
		//Campo que comparten ambos
		return $this->hasMany(Estatus::class,'idBitacora');
	}

	public function cliente()
	{
		return $this->belongsTo(Clientes::class,'idCliente');
	}
	
}
