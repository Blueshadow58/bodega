<?php

namespace App\Http\Controllers;

use App\Herramientas;
use App\Pedido;
use App\PedidoHerramienta;
use App\RegistrarHerramientasPedido;
use App\stock;
use Illuminate\Http\Request;

class RetornoHerramientasController extends Controller
{



    public function index()
    {

        //seleccion de las herramientas que tienen el estado de finalizado
        $herramientas = Herramientas::select('*')->where('estado', 'prestado')->get();

        return view('retorno-herramientas')->with('herramientas', $herramientas);
    }


    public function actualizarEstado(Request $request)
    {



        if (empty($request->idHerramienta)) {
            return $this->index();
        }

        //Determinar si esa herramienta tiene el estado de prestado y si existe
        $boolean = Herramientas::where('id', $request->idHerramienta)->where('estado', 'prestado')->exists();



        if (!$boolean) {
            //no existe
            return $this->index();
        } else {

            //Cambiar estados herramientas y registro-----------------------------------------------------------------------------------------------------


            //cambiar estado de la herramienta segun su id
            Herramientas::where('id', $request->idHerramienta)->update(['estado' => 'disponible']);
            //cambiar el estado del registro de la herramienta segun su id
            RegistrarHerramientasPedido::where('id_herramienta', $request->idHerramienta)->update(['estado_herramienta' => 'finalizado']);




            //Cambiar estados pedido y pedido herra------------------------------------------------------------------------------------------------------------

            //Conseguir el identificador del pedido
            $idDelPedido = RegistrarHerramientasPedido::select('id_pedido')->where('id_herramienta', $request->idHerramienta)->max('id_pedido');

            //seleccionar la cantidad de herramientas asociadas a ese pedido
            $cantidadTotal = RegistrarHerramientasPedido::where('id_pedido', $idDelPedido)->count();


            //Seleccionar la cantidad de herramientas que tienen estado finalizado cuando la herramienta pertenezca a un pedido
            $cantidadFinalizados = RegistrarHerramientasPedido::where('id_pedido', $idDelPedido)->where('estado_herramienta', 'finalizado')->count();


            if ($cantidadTotal == $cantidadFinalizados) {

                //cambiar estado del pedido con la id que ya la sabemos y todas las del pedido de herramientas que sean parte de ese pedido                
                Pedido::where('id', $idDelPedido)->update(['estado_pedido' => 'finalizado']);
                //cambiar estado del pedido herramientas a el grupo de herramientas que es parte del pedido
                PedidoHerramienta::where('id_pedido', $idDelPedido)->update(['estado_herramienta' => 'finalizado']);
            }







            //modificar el stock-----------------------------------------------------------------------------------------------------------------------------

            //Conseguir la categoria de la herramienta
            $categoriaH = Herramientas::select('categoria')->where('id', $request->idHerramienta)->value('categoria');


            $stockDisponible = stock::select('stock_disponible')->where('categoria',$categoriaH)->value('stock_disponible');

            //Cambiar stock

            stock::where('categoria', $categoriaH)->update(['stock_disponible' => $stockDisponible + 1]);

            //FIN modificar el stock-----------------------------------------------------------------------------------------------------------------------------


            return $this->index();
        }




        //cambiar el estado de la herramienta y el estado del registro del pedido



    }
}
