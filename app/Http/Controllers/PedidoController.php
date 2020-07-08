<?php

namespace App\Http\Controllers;

use App\Exports\PedidosExport;
use App\Herramientas;
use App\Pedido;
use App\PedidoHerramienta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use Excel;


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


        //llamar a todos los pedidos
        $pedidos = Pedido::all();
        //generar una consulta de solo id y nombre como array
        $usuarios = User::select(array('id', 'name'))->get();


        //enviar estos datos a la vista registro-ordenes
        return view('registro-ordenes')->with('pedidos', $pedidos)->with('usuarios', $usuarios);
    }

    //Generar un pdf de html
    public function PDF()
    {

        $pdf = App::make('dompdf.wrapper');

        $pdf->loadHTML($this->dataPedidoAHTML());

        //return $pdf->stream();
        return $pdf->download();
    }


    //Generar pdf de los pedidos
    public function dataPedidoAHTML()
    {

        $pedidos = Pedido::select('*')->get();
        $usuarios = User::select(array('id', 'name'))->get();

        $output = ' <table class="table table-striped" >
        <thead style="background-color:#c67e06;">
            <tr>
                <th>Fecha de envio</th>
                <th>Nombre</th>                
                <th>Asunto</th>              
            </tr>
        </thead>
        <tbody>';
        foreach ($pedidos as $pedido) {
            $output .= '
            <tr>
            <td>' . $pedido->created_at . '</td>';

            foreach ($usuarios as $usuario) {
                if ($pedido->id_usuario == $usuario->id) {
                    $output .= '<td>' . $usuario->name . '</td>';
                } else {
                }
            }
            $output .= '  <td>' . $pedido->asunto . '</td>                        
        </tr>';
        }
        $output .= ' </tbody>
            </table>';


        return $output;
    }

    //generar un pdf de el detalle de un pedido
    public function detallePDF(Request $request)
    {

        //seleccionar el pedido segun la id
        $pedido = Pedido::select('*')->where('id', '=', $request->idPedido)->get();
        //seleccionar id y nombre de usuario
        $usuario = User::select(array('id', 'name'))->get();
        //seleccionar la lista de herramientas del pedido segun la id del pedido
        $pedidoHerramientas = PedidoHerramienta::select('*')->where('id_pedido', '=', $request->idPedido)->get();
        //seleccioar herramientas 
        $herramientas = Herramientas::select('*')->get();


        $output = ' <div class="container">
        <div class="row">
        <div class="col ">';
        foreach ($pedido as $pedido) {
            $output .= ' <h4 class="card-title">Asunto:' . $pedido->asunto . '</h4>                    
                 <div class="form-group"><span>Fecha entrega:' . $pedido->fecha_entrega . '</span></div>';
            foreach ($usuario as $usuario) {
                if ($pedido->id_usuario == $usuario->id) {
                    $output .= ' <div class="form-group"><span>Nombre:' . $usuario->name . '</span></div>';
                }
            }
        }
        $output .= '
        </div>        
    </div>
    </div>';

    // <th>Imagen</th>
    $output .=' <div class="table-responsive table-striped">
    <table class="table" >
        <thead style="background-color: #c67e06;">
            <tr>
                
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>';
          

        // F
        // <td><img src="'.asset('storage').'/'.$herramienta->imagen.'" class="img-thumbnail img-fliud" alt="" width="100"></td>

            foreach($pedidoHerramientas as $pedidoHerramienta){

           $output.= '<tr>';
                foreach ($herramientas as $herramienta){
                    
                    if ($pedidoHerramienta->id_herramienta == $herramienta->id){
                        $output .= '
                            
                            <td>'.$herramienta->nombre.'</td>
                            <td>'.$pedidoHerramienta->cantidad.'</td>';
                    }
                }

           $output .= '<td>'.$pedidoHerramienta->estado_herramienta.'</td>                  
             
            </tr>';

              }

           $output .= '   
        </tbody>
    </table>
</div>';





        //funca! $output = '<h1>' . $request->idPedido . '</h1>';
        //generar el pdf
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($output);

        //return $pdf->stream();
        return $pdf->download();
    }


    public function descargarExcelPedidos(){
        //generando el Excel
        $pedidoExport = new PedidosExport;
        //retornar la descarga
        return $pedidoExport->download('pedido.xlsx');

    }

    
    //Filtrar pedidos segun nombre de usuario
    public function filtrarNombre(Request $request){

        //si al filtrar por nombre esta vacio y = a "todo" retornar lo normal como e index
        if ($request->filtrarNombre== '' || $request->filtrarNombre == 'todo') {            
        //vacio
        $pedidos = Pedido::select('*')->get();
        $usuarios = User::select(array('id', 'name'))->get();
        return view('registro-ordenes')->with('pedidos', $pedidos)->with('usuarios', $usuarios);

        }else{

            //Si sale bien la consulta (si el usuario escribe en el filtrador algo aparte de "todo")
            //filtrar el usuario con un like y % entre la palabra ingresada por el input para filtrar
        $idUsuarioFiltro = User::select('id')->where('name','=',$request->filtrarNombre)
        ->orWhere('name','like','%'.$request->filtrarNombre.'%')->value('id');

        //llamar a todos los pedidos cuando la id del usuario sea igual a la del usuario filtrado
        $pedidos = Pedido::select('*')->where('id_usuario','=',$idUsuarioFiltro)->get();
        //llamara los usuarios en forma de un array con las columnas id y nombre
        $usuarios = User::select(array('id', 'name'))->get();

        return view('registro-ordenes')->with('pedidos', $pedidos)->with('usuarios', $usuarios);

        }

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

    public function detalle(Request $request)
    {



        //seleccionar el pedido segun la id
        $pedido = Pedido::select('*')->where('id', '=', $request->btnId)->get();

        //seleccionar id y nombre de usuario
        $usuario = User::select(array('id', 'name'))->get();

        //seleccionar la lista de herramientas del pedido segun la id del pedido
        $pedidoHerramientas = PedidoHerramienta::select('*')->where('id_pedido', $request->btnId)->get();

        //seleccioar herramientas 
        //$herramientas = Herramientas::select('*')->get();



        return view('pedido-detalle')->with('pedidoHerramientas', $pedidoHerramientas)
            ->with('pedido', $pedido)->with('usuario', $usuario);

            //->with('herramientas', $herramientas)
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //pasar la requesta  una variable simple
        $idUsuario = $request->id_usuario;

        //si el que realiza el formulario no es un admin usar la id del usuario conectado
        if ($request->id_usuario == "") {
            $idUsuario = Auth::user()->id;
        }

        //crear un pedido
        Pedido::create(
            [
                'fecha_entrega' => $request->fecha_entrega,
                'fecha_devolucion' => $request->fecha_devolucion,
                'estado' => $request->estado,
                'id_usuario' => $idUsuario
            ]

        );



        //traer a los usuarios menos a el usuario conectado

        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('pedido')->with('users', $users);
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
