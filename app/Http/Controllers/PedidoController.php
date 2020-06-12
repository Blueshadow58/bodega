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

        
         //$pedidos = DB::table('pedidos')->get();

        //en este caso se llama registro de ordenes

        //$idUsuarioPedido = DB::table('pedidos')->get('id_usuario')->values('id_usuario');


        $pedidos = Pedido::select('*')->get();

        $usuarios = User::select(array('id','name'))->get();        

        

        return view('registro-ordenes')->with('pedidos',$pedidos)->with('usuarios',$usuarios);

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

        
        
        //seleccionar el pedido segun la id
        $pedido = Pedido::select('*')->where('id','=',$request->btnId)->get();

        //seleccionar id y nombre de usuario
        $usuario = User::select(array('id','name'))->get();

        //seleccionar la lista de herramientas del pedido segun la id del pedido
        $pedidoHerramientas = PedidoHerramienta::select('*')->where('id_pedido','=',$request->btnId)->get();

        //seleccioar herramientas 
        $herramientas = Herramientas::select('*')->get();

        return view('pedido-detalle')->with('pedidoHerramientas',$pedidoHerramientas)
        ->with('pedido',$pedido)->with('usuario',$usuario)->with('herramientas',$herramientas);


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
