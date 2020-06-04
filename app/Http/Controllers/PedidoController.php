<?php

namespace App\Http\Controllers;

use App\Herramientas;
use App\Pedido;
use App\PedidoHerramienta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //traer a los usuarios menos a mi
        //$users = User::where('id','!=',Auth::user()->id)->get(); 

        
        $pedidos = DB::table('pedidos')->get();

        //en este caso se llama registro de ordenes
        return view('registro-ordenes')->with('pedidos',$pedidos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function detalle(Request $request){

        //$pedidoHerramientas = DB::table('pedido_herramientas')->where('id_pedido','=',$request->btnId);

        //$pedidoHerramientas = PedidoHerramienta::select('id_pedido')->where('id_pedido',$request->btnId)->value('id_pedido');


        //$pedidoHerramientas = PedidoHerramienta::select('*')->join('herramienta','pedido_herramientas.id_herramienta','=','herramienta_id')->get();

        $pedidoHerramientas = PedidoHerramienta::select('*')->where('id_pedido','=',$request->btnId)->get();


            // $herramientas = DB::table('herramienta')
            // ->join('pedido_herramientas', 'herramienta.id', '=', 'pedido_herramienta.id_pedido')            
            // ->select('*')->where('id_pedido from pedido_herramienta',$request->id)->get();



        return view('bodegero-confirmar')->with('pedidoHerramientas',$pedidoHerramientas);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         $idUsuario = $request->id_usuario;

         //si el que realiza el formulario no es un admin usar la id del usuario conectado
         if ($request->id_usuario == "") {
            $idUsuario = Auth::user()->id;
         }
     

         Pedido::create(
            ['fecha_entrega' => $request->fecha_entrega,
            'fecha_devolucion' => $request->fecha_devolucion,
            'estado' => $request->estado,
            'id_usuario' => $idUsuario                       
            ]

        ) ;



        //traer a los usuarios menos a mi

        $users = User::where('id','!=',Auth::user()->id)->get(); 
        return view('pedido')->with('users',$users);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
