<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'id', 'id_usuario', 'asunto', 'fecha_entrega','estado_pedido'
    ];


    /*
    public function usuario(){

            return $this->belongsTo('User');
    }
    */


}
