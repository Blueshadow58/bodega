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
        $herramientas = Herramientas::select('*')->groupBy('categoria')->get();
    
        $stockHerramientas = stock::all();

        //llamar todos los productos
        //$productos = table_temporal::select('*')->join('herramienta','table_temporals.categoria','=','herramienta.categoria')->where('id_usuario','=',Auth::user()->id)->get();


        $cateTableTemporal = table_temporal::select('categoria')->where('id_usuario',$usuario)->get('categoria');

        $tablaTemporal = table_temporal::select('*')->where('id_usuario',Auth::user()->id)->get();

        $productos = herramientas::select('*')->whereIn('categoria',$cateTableTemporal)->groupBy('categoria')->get();

        return view('pedidoHerramienta')->with('herramientas',$herramientas)->with('usuario',$usuario)
        ->with('stockHerramientas',$stockHerramientas)->with('productos',$productos)->with('tablaTemporal',$tablaTemporal);

        
        
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
               

        $categoria = $request->btnCategoria;

         $categoria;

//Disminuir Stock-------------------------------------------------------------------------------------
        
        // //capturar el nombre de la herramienta por la id del item seleccionado por el boton
        // $herramientaCategoria = Herramientas::select('categoria')->where('id','=',$request->btnId)->value('categoria') ; 

        //seleccionar el stock dependiendo de su nombre 
         $stockDisponible = stock::select('stock_disponible')->where('categoria',$categoria)->value('stock_disponible');

        
        // stock de la herramienta seleccionada menos la cantidad que seleccionamos
         stock::where('categoria',$categoria)->update(['stock_disponible'=> $stockDisponible - $request->cantidad]);

//


//Aumentar stock-----------------------------------------------------------------------------------------
         


        //verificar si la herramienta que hemos agregado a nuestro pedido existe, sino aumentar la cantidad
        if (table_temporal::where('categoria',$categoria)->where('id_usuario',Auth::user()->id)->exists()) {
            //Si existe
            

            //cantidad de ese producto
            $cantidadTableTemporal = table_temporal::select('cantidad')->where('categoria',$categoria)->where('id_usuario',Auth::user()->id)->value('cantidad');
            //actulizar cantidad en table_temporal
            table_temporal::where('categoria',$categoria)->where('id_usuario',Auth::user()->id)->update(['cantidad'=> $cantidadTableTemporal + $request->cantidad]);

        } else {
            //No existe
            table_temporal::create(
                ['categoria' => $categoria,
                'id_usuario' => Auth::user()->id,            
                'cantidad' => $request->cantidad,
                'tipo_producto' => $categoria]
            );
        }
        
        
        

        

        return $this->index();        
    }



    public function eliminar(Request $request){

        $categoria = $request->btnCategoria;

       
        //seleccionar la cantidad del producto segun id
        $cantidadTableTemporal = table_temporal::select('cantidad')->where('categoria',$categoria)->where('id_usuario',Auth::user()->id)->value('cantidad');

        //consulta cantidad en stock disponible en la tabla stock segun el nombre
        $stockDisponible = stock::select('stock_disponible')->where('categoria',$categoria)->value('stock_disponible');
        //actualizar la tabla stock agregando la cantidad eliminada en table_temporals
        stock::where('categoria',$categoria)->update(['stock_disponible'=>  $stockDisponible + $cantidadTableTemporal]);

        //eliminar el dato de la tabla temporal
        table_temporal::where('categoria',$categoria)->where('id_usuario',Auth::user()->id)->delete();

        return $this->index();       
    }



















    public function volcar(Request $request){



        //seleccionar el numero de elementos que a ingresado este usuario a el pedido
         $herramietasPorUser = DB::table('table_temporals')->select('*')->where('id_usuario','=',Auth::user()->id)->count();
        

            //Crear un pedido
        Pedido::create(
            ['id_usuario' => $request->idUser,
            'asunto' => $request->asunto,
            'fecha_entrega' => $request->fechaEntrega,                               
            ]
        );

        //seleccioanr todo de la tabla temporal de lo que haya ingresado el usuario
        $herramietasPorUser = table_temporal::select('*')->where('id_usuario','=',Auth::user()->id)->get();

        //seleccioanr ultima id
        $ultimaId = Pedido::select('select id from pedido')->max('id');


        //crear una tabla de pedidoHerramienta con todas las herramientas seleccionadas
        foreach ($herramietasPorUser as $herramienta){

            //seleccionar la cantidad cuando la id del producto sea igual a la id de la herramienta y sacar su cantidad
            $cantidadHerramienta = table_temporal::select('cantidad')->where('categoria','=',$herramienta->categoria)->value('cantidad');

            //crear un pedido herramienta por cada ciclo
        PedidoHerramienta::create(
            ['id_pedido' => $ultimaId,
             'categoria' => $herramienta->categoria,            
             'cantidad' => $cantidadHerramienta,  
            //'fecha_devolución' => $request->fechaEntrega,                               
            //'estado_herramienta' => $request->asunto,            
            ]
        );
        };
        

        





        //al generar la lista del pedido eliminar los datos agregados ala tabla_temporal
        table_temporal::where('id_usuario','=',Auth::user()->id)->delete();
        
        return $this->index();

    }









    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function lista(Request $request)
    {
        //creando una variable simple con la request y enviarla a registro ordenes
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
        //esto al final no lo estoy usando

        $herramienta= Herramientas::findOrFail($id);

        if(Storage::delete('public/'.$herramienta->imagen)){
        Herramientas::destroy($id);
        }

 
        return redirect('pedidoHerramienta')->with('Mensaje','Herramienta eliminada');
    }
}
