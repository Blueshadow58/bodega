<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\RegistrarHerramientasPedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MisPedidosController extends Controller
{
    
    public function index(){


        $pedidos = Pedido::select('*')->where('id_usuario',Auth::user()->id)->get();
        $nombre = Auth::user()->name;





        return view('mis-pedidos')->with('pedidos',$pedidos)->with('nombre',$nombre);



    }


    public function probar(){


        return 'contron mis pedidos';

    }



}
