<?php

namespace App\Http\Controllers;

use App\Herramientas;
use App\Pedido;
use App\PedidoHerramienta;
use App\stock;
use App\table_temporal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class PedidoHerramientaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //seleccionar usuario actual
        $usuario = Auth::user()->id;

        //seleccionar herramientas por grupo nombre sin repetir
        $herramientas = Herramientas::select('*')->groupBy('nombre')->get();
    
        $stockHerramientas = stock::select('*')->get();

        //llamar todos los productos
        $productos = table_temporal::select('*')->join('herramienta','table_temporals.id_producto','=','herramienta.id')->where('id_usuario','=',Auth::user()->id)->get();



        return view('pedidoHerramienta')->with('herramientas',$herramientas)->with('usuario',$usuario)
        ->with('productos',$productos)->with('stockHerramientas',$stockHerramientas);
        
        
    }

    public function insert(Request $request){

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agregar(Request $request)
    {
        
        

        $herramienta = Herramientas::where('id','=',$request->btnId)->get();   
        
        $categoria = DB::table('herramienta')->select('categoria')->where('id', '=', $request->btnId)->value('categoria');


//Disminuir Stock-------------------------------------------------------------------------------------
        
        //capturar el nombre de la herramienta por la id del item seleccionado por el boton
        $herramientaNombre = Herramientas::select('nombre')->where('id','=',$request->btnId)->value('nombre') ; 

        //seleccionar el stock dependiendo de su nombre 
        $stockDisponible = stock::select('stock_disponible')->where('nombre','=',$herramientaNombre)->value('stock_disponible');

        
        // stock de la herramienta seleccionada menos la cantidad que seleccionamos
        stock::where('nombre','=',$herramientaNombre)->update(['stock_disponible'=> $stockDisponible - $request->cantidad]);

//


//Aumentar stock-----------------------------------------------------------------------------------------
         //Agrupar la cantidad   
        $countH = Herramientas::where('categoria','=','martillos')->count();   

        //verificar si la herramienta que hemos agregado a nuestro pedido existe, sino aumentar la cantidad
        if (table_temporal::where('id_producto','=',$request->btnId)->where('id_usuario','=',Auth::user()->id)->exists()) {
            //Si existe
            

            //cantidad de ese producto
            $cantidadTableTemporal = table_temporal::select('cantidad')->where('id_producto','=',$request->btnId)->where('id_usuario','=',Auth::user()->id)->value('cantidad');
            //actulizar cantidad en table_temporal
            table_temporal::where('id_producto','=',$request->btnId)->where('id_usuario','=',Auth::user()->id)->update(['cantidad'=> $cantidadTableTemporal + $request->cantidad]);
        } else {
            //No existe
            table_temporal::create(
                ['id_producto' => $request->btnId,
                'id_usuario' => Auth::user()->id,            
                'cantidad' => $request->cantidad,
                'tipo_producto' => $categoria]
            );
        }
        
        //Arreglar problema se suma el item a greado a este usuario a la otra lista
        

        

        return back();        
    }



    public function eliminar(Request $request){

        //seleccionar el nombre de la herramienta segun el id
        $herramientaNombre = Herramientas::select('nombre')->where('id','=',$request->btnId)->value('nombre') ; 

        //seleccionar la cantidad del producto segun id
        $cantidadTableTemporal = table_temporal::select('cantidad')->where('id_producto','=',$request->btnId)->where('id_usuario','=',Auth::user()->id)->value('cantidad');

        //consulta cantidad en stock disponible en la tabla stock segun el nombre
        $stockDisponible = stock::select('stock_disponible')->where('nombre','=',$herramientaNombre)->value('stock_disponible');
        //actualizar la tabla stock agregando la cantidad eliminada en table_temporals
        stock::where('nombre','=',$herramientaNombre)->update(['stock_disponible'=>  $stockDisponible + $cantidadTableTemporal]);

        //eliminar el dato de la tabla temporal
        DB::table('table_temporals')->where('id_producto','=',$request->btnId)->delete();

        return back();       
    }

    public function volcar(Request $request){



        //seleccionar el numero de elementos que a ingresado este usuario a el pedido
         $herramietasPorUser = DB::table('table_temporals')->select('*')->where('id_usuario','=',Auth::user()->id)->count();


        // if ($herramietasPorUser == 0) {
        //     return back();
        //     $estado = "fail";
        //     $notificacion = "Debe ingresar elementos para generar un pedido";
        // } else {
        //     $notificacion = "Pedido Generado correctamente";
        //     $estado = "success";
        // }
        


        Pedido::create(
            ['id_usuario' => $request->idUser,
            'asunto' => $request->asunto,
            'fecha_entrega' => $request->fechaEntrega,                               
            ]
        );

        //seleccioanr todo de la tabla temporal de lo que haya ingresado el usuario
        $herramietasPorUser = DB::table('table_temporals')->select('*')->where('id_usuario','=',Auth::user()->id)->get();

        //seleccioanr ultima id
        $ultimaId = Pedido::select('select id from pedido')->max('id');



        foreach ($herramietasPorUser as $herramienta){

            $cantidadHerramienta = table_temporal::select('cantidad')->where('id_producto','=',$herramienta->id_producto)->value('cantidad');

        PedidoHerramienta::create(
            ['id_pedido' => $ultimaId,
             'id_herramienta' => $herramienta->id_producto,            
             'cantidad' => $cantidadHerramienta,  
            //'fecha_devolución' => $request->fechaEntrega,                               
            //'estado_herramienta' => $request->asunto,            
            ]
        );
        };
        

        table_temporal::destroy('delete * table_temporal where id_usuario','=',Auth::user()->id);


        
        return back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function lista(Request $request)
    {
        $selecHerramientas = $request->herramientas;
       return view('registro-ordenes')->with('herramientas',$selecHerramientas);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Herramientas  $herramientas
     * @return \Illuminate\Http\Response
     */
    public function show(Herramientas $herramientas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Herramientas  $herramientas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Herramientas  $herramientas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Herramientas  $herramientas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $herramienta= Herramientas::findOrFail($id);

        if(Storage::delete('public/'.$herramienta->imagen)){
        Herramientas::destroy($id);
        }

 
        return redirect('pedidoHerramienta')->with('Mensaje','Herramienta eliminada');
    }
}
