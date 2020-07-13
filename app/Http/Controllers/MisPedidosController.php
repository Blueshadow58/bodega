<?php

namespace App\Http\Controllers;

use App\Herramientas;
use App\Pedido;
use App\PedidoHerramienta;
use App\RegistrarHerramientasPedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MisPedidosController extends Controller
{

    public function index()
    {


        $pedidos = Pedido::select('*')->where('id_usuario', Auth::user()->id)->get();
        $nombre = Auth::user()->name;





        return view('mis-pedidos')->with('pedidos', $pedidos)->with('nombre', $nombre);
    }




    public function detalleMisPedidos(Request $request){


        //id del pedido
        $request->btnId;

        //seleccionar el pedido por la id
        $pedido = Pedido::select('*')->where('id',$request->btnId)->get();

        //seleccionar los pedidos herramientas que pertenzcan a la id del pedido
        $pedidoHerramientas = PedidoHerramienta::select('*')->where('id_pedido',$request->btnId)->get();


        //sacar las ids de la sherramientas que perteneces a ese pedidp
        $idsHerramientas = RegistrarHerramientasPedido::select('id_herramienta')->where('id_pedido',$request->btnId)->get();

        //herramientas que pertecen a ese pedido
        $herramientas = Herramientas::select('*')->whereIn('id',$idsHerramientas)->get();



        return view('detalle-mis-pedidos')->with('pedido',$pedido)->with('pedidoHerramientas',$pedidoHerramientas)->with('herramientas',$herramientas);

    }














    public function probar()
    {


        return 'contron mis pedidos';
    }







}
