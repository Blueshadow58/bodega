<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'id', 'fecha_entrega', 'fecha_devolucion', 'estado', 'id_usuario'
    ];

    /*
    public function usuario(){

            return $this->belongsTo('User');
    }
    */


}
