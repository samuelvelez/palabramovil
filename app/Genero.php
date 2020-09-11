<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $fillable = [
        'name'
    ];

    public function libros() {
        //return $this->hasMany('App\Libro');
       return $this->belongsToMany(Libro::class);
      }

}
