<?php

namespace App\Http\Controllers;

use App\Herramientas;
use App\Pedido;
use App\PedidoHerramienta;
use App\RegistrarHerramientasPedido;
use App\User;
use Illuminate\Http\Request;

class RegistrarHerramientasPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


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

        //seleccionar el pedido segun la id
        $pedido = Pedido::all()->where('id', '=', $request->btnId);

        //seleccionar id y nombre de usuario
        $usuario = User::select(array('id', 'name'))->get();

        //seleccionar la lista de herramientas del pedido segun la id del pedido
        $pedidoHerramientas = PedidoHerramienta::select('*')->where('id_pedido', '=', $request->btnId)->get();

        //seleccioar herramientas 
        $herramientas = Herramientas::all();

        return view('crear-registro-herramientas-pedido')->with('pedidoHerramientas', $pedidoHerramientas)
            ->with('pedido', $pedido)->with('usuario', $usuario)->with('herramientas', $herramientas);




    }


    public function generar(){



        return $this->index();

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
