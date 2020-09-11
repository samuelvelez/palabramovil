<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $fillable = [
        'estado','id_emisor','id_receptor','id_libro','mensaje_respuesta','estado_notificacion','estado_conversacion'
    ];
}
