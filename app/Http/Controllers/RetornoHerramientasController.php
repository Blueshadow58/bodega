<?php

namespace App\Http\Controllers;

use App\Herramientas;
use App\Pedido;
use App\RegistrarHerramientasPedido;
use Illuminate\Http\Request;

class RetornoHerramientasController extends Controller
{
    


    public function index(){

        //seleccion de las herramientas que tienen el estado de finalizado
        $herramientas = Herramientas::select('*')->where('estado','finalizado')->get();

        return view('retorno-herramientas')->with('herramientas',$herramientas);

    }


    public function actualizarEstado(Request $request){


        


        if ( empty($request->idHerramienta) ) {
            return $this->index();
        } 

        //Determinar si esa herramienta tiene el estado de prestado y si existe
        $boolean = Herramientas::where('id',$request->idHerramienta)->where('estado','prestado')->exists();



        if (!$boolean) {
                    //no existe
                    return $this->index();
         } else {


            
            //Conseguir el identificador del pedido
            $idDelPedido = RegistrarHerramientasPedido::select('id_pedido')->where('id_herramienta',$request->idHerramienta)->value('id_pedido');

            //seleccionar la cantidad de herramientas asociadas a ese pedido
             $cantidadTotal = RegistrarHerramientasPedido::where('id_pedido',$idDelPedido)->count();


            //Seleccionar la cantidad de herramientas que tienen estado finalizado cuando la herramienta pertenezca a un pedido
            return $cantidadFinalizados = RegistrarHerramientasPedido::where('id_pedido',$idDelPedido)->where('estado_herramienta','finalizado')->count();


            if ($cantidadTotal == $cantidadFinalizados) {

                //cambiar estado del pedido con la id que ya la sabemos y todas las del pedido de herramientas que sean parte de ese pedido
                
                

            }



//DAR VUELTA ESTOOOOOOO---------------------------------------------------------------------------------------------------------------------------------------


            return  'cuidado ';

            //cambiar estado de la herramienta segun su id
            Herramientas::where('id', $request->idHerramienta)->update(['estado' => 'finalizado']);
            //cambiar el estado del registro de la herramienta segun su id
            RegistrarHerramientasPedido::where('id_herramienta',$request->idHerramienta)->update(['estado_herramienta' => 'finalizado']);

            



        }
        

        

        return $pedidos = Pedido::all();


        

        //cambiar el estado de la herramienta y el estado del registro del pedido

       


    }



}
