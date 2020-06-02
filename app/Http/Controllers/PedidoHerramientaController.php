<?php

namespace App\Http\Controllers;

use App\Herramientas;
use App\PedidoHerramienta;
use App\table_temporal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('pedidoHerramienta',$datos);
        
        

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
    public function agregar($id)
    {
        
        //$users = DB::table('herramientas')->select('name', 'email as user_email')->get();

        $herramienta = Herramientas::where('id','=',$id)->get();   

         $countH = Herramientas::where('categoria','=','martillos')->count();   

         

        table_temporal::create(
            ['id_producto' => $id,
            'id_usuario' => Auth::user()->id,            
            'cantidad' => $countH,
            'tipo_producto' => $herramienta->categoria,]
        ) ;

        

        $datos['herramientas']=Herramientas::paginate(6);
        return view('pedidoHerramienta',$datos);
        

        
        
        
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
