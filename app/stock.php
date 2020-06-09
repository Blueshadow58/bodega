<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    protected $fillable = [
        'id', 'nombre', 'stock_total', 'stock_disponible'
    ];
}
