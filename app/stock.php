<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    protected $fillable = [
        'id', 'categoria', 'stock_total', 'stock_disponible'
    ];
}
