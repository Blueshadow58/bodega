<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Herramientas extends Model
{
      
    protected $fillable = [
        'id','imagen','descripcion','nombre','categoria',
    ];

    protected $table = 'herramienta';
}
