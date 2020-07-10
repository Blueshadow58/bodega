<?php

namespace App\Http\Controllers;

use App\Herramientas;
use App\Pedido;
use App\PedidoHerramienta;
use App\RegistrarHerramientasPedido;
use App\tabla_temporal_asignar_herramientas;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class RegistrarHerramientasPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //tabla pedido
        $pedidos = Pedido::all()->where('estado_pedido','Por confirmar');
        $usuarios = User::all();




        return view('registrar-herramientas-pedido')->with('pedidos',$pedidos)->with('usuarios',$usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request )
    {

        //Primera tabla-----------------------------------------------------------------------------

        $idPedido = $request->btnPedidoId;
        session(['idPedido' => $idPedido]);

        //seleccionar el pedido segun la id
        $pedido = Pedido::all()->where('id', '=', $idPedido);
        //seleccionar id y nombre de usuario
        $usuario = User::select(array('id', 'name'))->get();
        //seleccionar la lista de herramientas del pedido segun la id del pedido
        $pedidoHerramientas = PedidoHerramienta::select('*')->where('id_pedido',$idPedido)->get();
        
        // Segunda tabla-----------------------------------------------------------------------------



        //Herramientas del pedido----------------------------------------------------------------------------------


    $idsHerramientasAsignadas = tabla_temporal_asignar_herramientas::select('id_herramienta')->get();

    $herramientasAsignadas = Herramientas::whereIn('id',$idsHerramientasAsignadas)->where('estado','Procesando')->get();


        //seleccioar herramientas 
        $categorias = PedidoHerramienta::select('categoria')->where('id_pedido',$idPedido)->get('categoria');
        $herramientas = Herramientas::select('*')->whereIn('categoria',$categorias)->where('estado','disponible')->get();














    //      $cantidadHerramientas = tabla_temporal_asignar_herramientas::select('id_herramienta')->get();

    //   $cantHerramientasAsignar = Herramientas::select('categoria')->whereIn('id',$cantidadHerramientas)->get('categoria');

        
     






       

        return view('crear-registro-herramientas-pedido')->with('pedidoHerramientas', $pedidoHerramientas)
            ->with('pedido', $pedido)->with('usuario', $usuario)->with('herramientas', $herramientas)
            ->with('idPedido',$idPedido)->with('herramientasAsignadas',$herramientasAsignadas);
    }












    public function generar(){

        $idPedido = session('idPedido');


         $pedidoHerramientas = PedidoHerramienta::select('*')->where('id_pedido',$idPedido)->get();


         //cantidad de herramientas 


        $cantidad =  tabla_temporal_asignar_herramientas::count();

        //retornar a la pagina sin modificar datos
        if($cantidad >= 1){

            return $this->ver($idPedido);

        }



        foreach ($pedidoHerramientas as $ph){

            
            //ingresar herramientas de forma automatica
            for ($i = 0; $i < $ph->cantidad  ;$i++){

                $herramienta = Herramientas::select('*')->where('categoria',$ph->categoria)->where('estado','disponible')->first();               
                                   
                    //Ingresar herramientas a tabla temporal asignar herramientas
                    tabla_temporal_asignar_herramientas::create(['id_herramienta' => $herramienta->id]);
                    //Cambiar estado
                    Herramientas::where('id', $herramienta->id)->update(['estado' => 'Procesando']);
                
            }

        }


          //Cambiar estado
       //   Herramientas::where('id', $idHerramienta)->update(['estado' => 'Procesando']);


        // tabla_temporal_asignar_herramientas::create(
        //     ['id_herramienta' => $idHerramienta]
        // );

         return $this->ver($idPedido);


    }





    public function volcarRegistroHerramientas(){

        //id del pedido
         $idPedido = session('idPedido');


         //cantidad de herramientas 
        $cantidad =  tabla_temporal_asignar_herramientas::count();

        //retornar a la pagina sin modificar datos
        if($cantidad < 1 or empty($cantidad)){

            return $this->ver($idPedido);
        }



        //seleccionar todas las herramientas de la tabla temporal asignar herramientas
         $cantidad =  tabla_temporal_asignar_herramientas::select('id_herramienta')->get();

        //seleccionar las herramientas cuando la ids sean las que esten en la tabla temporal de registro de herramientas
         $herramientasARegistrar = Herramientas::select('*')->whereIn('id',$cantidad)->get();


         

//------------------------------------------------------------------------------------------------------------------------------------------------------


         //repetir este ciclo segun la cantidad de herramientas
         foreach($herramientasARegistrar as $herramientas){
            
            //crear un pedido
            tabla_temporal_asignar_herramientas::create(
            [
                'id_pedido' => $idPedido,
                'id_herramienta' => $herramientas->id,
                'estado_herramienta' => 'prestado'                
            ]);    
         }


//------------------------------------------------------------------------------------------------------------------------------------------------------


         //Eliminar todos los datos de la tabla_temporal_asignar_herramientas 

         tabla_temporal_asignar_herramientas::truncate();


//------------------------------------------------------------------------------------------------------------------------------------------------------

        //  Cambiar estado de la herramienta
        foreach($herramientasARegistrar as $herramienta){

            Herramientas::where('id', $herramienta->id)->update(['estado' => 'prestado']);
        }

        // Cambiar el estado del pedido
            Pedido::where('id',$idPedido)->update(['estado_pedido' => 'prestado']);

        
        //seleccioar pedido herramientas segun el pedido

          $pedidoHerramientas =  PedidoHerramienta::select('*')->where('id_pedido',$idPedido)->get();

            foreach($pedidoHerramientas as $PH){
                PedidoHerramienta::where('id_pedido',$idPedido)->where('id',$PH->id)->update(['estado_herramienta' => 'prestado']);
            }


//------------------------------------------------------------------------------------------------------------------------------------------------------

         //llamar a todos los pedidos
        $pedidos = Pedido::all();
        //generar una consulta de solo id y nombre como array
        $usuarios = User::select(array('id', 'name'))->get();

        //enviar estos datos a la vista registro-ordenes
        return view('registro-ordenes')->with('pedidos', $pedidos)->with('usuarios', $usuarios);



    }






    public function editar(Request $request){


        

        $idHerramienta = $request->idHerramienta;

        session(['idHerramienta' => $idHerramienta]);

        //Herramienta seleccionada para cambiar
        $herramienta = Herramientas::select('*')->where('id',$idHerramienta)->get();

        $categoria = Herramientas::select('categoria')->where('id',$idHerramienta)->value('categoria');

        $herramientasFiltradas = Herramientas::select('*')->where('categoria',$categoria)->where('estado','!=','Procesando')->get();


        return view('cambiar-registro-herramientas-pedido')->with('herramienta',$herramienta)->with('herramientasFiltradas',$herramientasFiltradas);

    }













    //cambiar herramienta desde nueva ventana para el cambio de herramientas en el registro al cual sera asignado
        public function cambiarHerramienta(Request $request){

            //idHerramienta
            $nuevaHerramienta = $request->idHerramienta;


            //herramienta a cambiar
            $idHerramienta = session('idHerramienta');

            //idPedido
            $idPedido = session('idPedido');

            //cambiar estado
            Herramientas::where('id', $idHerramienta)->update(['estado' => 'disponible']);

            //eliminar la herramienta anteriormente asignada
            tabla_temporal_asignar_herramientas::where('id_herramienta',$idHerramienta)->delete();



            //Ingresar herramientas a tabla temporal asignar herramientas
            tabla_temporal_asignar_herramientas::create(['id_herramienta' => $nuevaHerramienta]);

            //Cambiar estado
            Herramientas::where('id', $nuevaHerramienta)->update(['estado' => 'Procesando']);
        


            
            
            return $this->ver($idPedido);

        


        }












    public function ver($idPedido){

 //Primera tabla-----------------------------------------------------------------------------

 $idPedido = $idPedido;

 session(['idPedido' => $idPedido]);






//-----------------------------------------------------------------------------

 //seleccionar el pedido segun la id
 $pedido = Pedido::all()->where('id', '=', $idPedido);
 //seleccionar id y nombre de usuario
 $usuario = User::select(array('id', 'name'))->get();
 //seleccionar la lista de herramientas del pedido segun la id del pedido
 $pedidoHerramientas = PedidoHerramienta::select('*')->where('id_pedido',$idPedido)->get();
 
 // Segunda tabla-----------------------------------------------------------------------------


 //seleccioar herramientas 

 $categorias = PedidoHerramienta::select('categoria')->where('id_pedido',$idPedido)->get('categoria');


 $herramientas = Herramientas::select('*')->whereIn('categoria',$categorias)->where('estado','disponible')->get();


//Herramientas del pedido----------------------------------------------------------------------------------


    $idsHerramientasAsignadas = tabla_temporal_asignar_herramientas::select('id_herramienta')->get();

    $herramientasAsignadas = Herramientas::whereIn('id',$idsHerramientasAsignadas)->where('estado','Procesando')->get();


//Herramientas del pedido----------------------------------------------------------------------------------


 return view('crear-registro-herramientas-pedido')->with('pedidoHerramientas', $pedidoHerramientas)
     ->with('pedido', $pedido)->with('usuario', $usuario)->with('herramientas', $herramientas)
     ->with('idPedido',$idPedido)->with('herramientasAsignadas',$herramientasAsignadas);

    }


    public function agregar(Request $request){

        //generar validador de cantidad maxima de herramientas asignadas por pedido--------------------------





        $idHerramienta = $request->idHerramienta;

        $idPedido = session('idPedido');
        









        //  $cantidadHerramientas = tabla_temporal_asignar_herramientas::select('id_herramienta')->get();

        // $cantHerramientasAsignar = Herramientas::select('categoria')->whereIn('id',$cantidadHerramientas)->get('categoria');
    
    
        //     $pedidoHerramientasCount = PedidoHerramienta::select('categoria','cantidad')->where('id_pedido',$idPedido)
        //      ->whereIn('categoria',$cantHerramientasAsignar)->get();
    
    
        //     if (!empty($cantHerramientasAsignar)) {
                
        //     } else {
        //         # code...
        //     }
            
    
    



        //Cambiar estado
        Herramientas::where('id', $idHerramienta)->update(['estado' => 'Procesando']);


        tabla_temporal_asignar_herramientas::create(
            ['id_herramienta' => $idHerramienta]
        );

        return $this->ver($idPedido);

    }


    public function eliminar(Request $request){

        $idHerramienta = $request->idHerramienta;

        $idPedido = session('idPedido');
        //cambiar estado          
        Herramientas::where('id', $idHerramienta)->update(['estado' => 'disponible']);

        //eliminar la herramienta
        tabla_temporal_asignar_herramientas::where('id_herramienta',$idHerramienta)->delete();


        return $this->ver($idPedido);

        
        
        
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RegistrarHerramientasPedido  $registrarHerramientasPedido
     * @return \Illuminate\Http\Response
     */
    public function show(RegistrarHerramientasPedido $registrarHerramientasPedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RegistrarHerramientasPedido  $registrarHerramientasPedido
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistrarHerramientasPedido $registrarHerramientasPedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RegistrarHerramientasPedido  $registrarHerramientasPedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistrarHerramientasPedido $registrarHerramientasPedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RegistrarHerramientasPedido  $registrarHerramientasPedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistrarHerramientasPedido $registrarHerramientasPedido)
    {
        //
    }
}
