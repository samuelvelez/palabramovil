<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'edad','celular','direccion','imagen','user_id'
    ];
}
