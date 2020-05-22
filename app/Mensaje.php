<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{

    protected $fillable = [
        'id', 'contenido_mensaje', 'remitente_id', 'destinatario_id', 'leer'
    ];

    /*
    protected $id = 'id';
    protected $contenido_mensaje = 'contenido_mensaje';
    protected $remitente_id = 'remitente_id';
    protected $destinatario_id = 'destinatario_id';
    protected $leer = 'leer';
*/


}
