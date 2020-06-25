<?php

use App\Mensaje;
use Illuminate\Support\Facades\Auth;

$unReadCount = Mensaje::where('destinatario_id','=',Auth::user()->id)->where('leer',1)->count();

echo $unReadCount;

?>