<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table='roles';

    protected $fillable=[
    	'rol','descripcion',
    ];
    

    public function users()
    {
    	return $this->belongsToMany(User::class,'idUsuario')->withTimestamps();
    }
}
