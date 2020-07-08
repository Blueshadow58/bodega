<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoHerramienta extends Model
{
    protected $fillable = [
        'id', 'id_pedido','categoria','cantidad', 'fecha_devolución','estado_herramienta'
    ];

}
