<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'id', 'id_usuario', 'asunto', 'fecha_entrega'
    ];


    /*
    public function usuario(){

            return $this->belongsTo('User');
    }
    */


}
