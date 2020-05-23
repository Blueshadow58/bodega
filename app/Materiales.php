<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiales extends Model
{
       

    protected $fillable = [
      'id','nombre','fecha_ingreso'
  ];
 
  protected $table = 'material';
  
}
