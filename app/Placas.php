<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Placas extends Model
{
	protected $table='placas';

    protected $fillable=['idPlaca','noPlaca','idUnidad'];
}
