<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class table_temporal extends Model
{
    protected $fillable = [
        'id', 'categoria', 'id_usuario', 'cantidad', 'tipo_producto'
    ];
}
