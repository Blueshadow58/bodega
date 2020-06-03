<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoHerramienta extends Model
{
    protected $fillable = [
        'id', 'id_pedido', 'id_herramienta', 'fecha_devolución','estado_herramienta'
    ];

}
