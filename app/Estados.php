<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ciudades;

class Estados extends Model
{
	protected $table="estados";

	protected $fillable=[
		'estado',
	];

	protected $primaryKey='idEstado';


    public function ciudades(){
    	return $this->hasMany('App\Ciudades','idEstado');
    }
}
