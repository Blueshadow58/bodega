<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrarHerramientasPedido extends Model
{
    protected $fillable = [
        'id', 'id_pedido','id_herramienta','estado_herramienta'
    ];
}
