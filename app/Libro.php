<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Libro extends Model
{
    protected $fillable = [
        'titulo', 'descripcion', 'estado','imagen','user_id','paginas','autor'
    ];

    public function generos() {
  	      //return $this->hasMany('App\Genero');
    	return $this->belongsToMany(Genero::class);
  
      }
}

