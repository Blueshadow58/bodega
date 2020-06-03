<?php

namespace App\Http\Controllers;

use App\Herramientas;
use App\Pedido;
use App\PedidoHerramienta;
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
        $datos['herramientas']=Herramientas::paginate(6);
        $usuario = Auth::user()->id;
        return view('pedidoHerramienta',$datos)->with('usuario',$usuario);
        
        

    }

    public function insert(Request $request){

        // $id = $request->id;
        // for($count =0;$count < count($id);$count++){
        //     $data = array(
        //         'id' => $id[$count],
        //     );
        //     $insert_data[] = $data;
        // }
        // PedidoHerramienta::create($insert_data);
        // return response()->json([
        //     'success' => 'Data Added successfully' 
        // ]);



    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agregar(Request $request)
    {
        
        //$users = DB::table('herramientas')->select('name', 'email as user_email')->get();

         $herramienta = Herramientas::where('id','=',$request->btnId)->get();   

         
        //$categoria = Herramientas::table('   where id = ',$request->id)->get();   

        //$categoria = Herramientas::select('categoria')->where('id', '=', $request->id)->get();



        $categoria = DB::table('herramienta')->select('categoria')->where('id', '=', $request->btnId)->value('categoria');

        // $nombreCategoria = "";

        // foreach ($categoria as $o) {
        //     $nombreCategoria = $o;
        // }

         $countH = Herramientas::where('categoria','=','martillos')->count();   

        table_temporal::create(
            ['id_producto' => $request->btnId,
            'id_usuario' => Auth::user()->id,            
            'cantidad' => $countH,
            'tipo_producto' => $categoria]
        ) ;

        return back();        
    }


    public function volcar(Request $request){
    
        // ::create(
        //     ['id_producto' => $request->btnId,
        //     'id_usuario' => Auth::user()->id,            
        //     'cantidad' => $countH,
        //     'tipo_producto' => $categoria]
        // ) ;

        Pedido::create(
            ['id_usuario' => $request->idUser,
            'asunto' => $request->asunto,
            'fecha_entrega' => $request->fechaEntrega,                               
            ]
        );


        $herramietasPorUser = DB::table('table_temporals')->select('*')->where('id_usuario','=',Auth::user()->id)->get();


        $ultimaId = Pedido::select('select id from pedido')->max('id');

        foreach ($herramietasPorUser as $herramienta){

        PedidoHerramienta::create(
            ['id_pedido' => $ultimaId,
             'id_herramienta' => $herramienta->id_producto,            
            //'fecha_devolución' => $request->fechaEntrega,                               
            //'estado_herramienta' => $request->asunto,            
            ]
        );
        };
        
        table_temporal::destroy('delete * table_temporal where id_usuario','=',Auth::user()->id);


        return 'Lista ingresada';

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
