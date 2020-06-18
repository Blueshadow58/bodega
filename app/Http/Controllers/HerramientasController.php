<?php

namespace App\Http\Controllers;

use App\Herramientas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


//codigo de mi compañero lo comentare de todas formas

class HerramientasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //llamado a las herramientas
    public function index()
    {
        $datos['herramientas']=Herramientas::paginate(6);
        return view('herramientas.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //redireccionar a la pagina de creacion
    public function create()
    {
        return view('herramientas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     //crear herramienta
    public function store(Request $request)
    {
        //

        $campos=[
            'imagen'=>'required|mimes:jpeg,png,jpg',
            'descripcion'=>'required|string',
            'nombre'=>'required|string',
            'categoria'=>'required|string',
        ];
        $Mensaje=["required"=>'El:attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);



        $datosHerramienta=request()->all();
        $datosHerramienta=request()->except('_token');

        if($request->hasFile('imagen')){
            $datosHerramienta['imagen']=$request->file('imagen')->store('uploads','public');
        }

        Herramientas::create($datosHerramienta);
        //return response()->json($datosHerramienta);
        return redirect('herramientas')->with('Mensaje','Herramienta agregada');

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

     //usar la id para llamar a la herraienta que tenga esa id y enviarla a la pagina edit
    public function edit($id)
    {
        //
        $herramienta= Herramientas::findOrFail($id);
        return view('herramientas.edit',compact('herramienta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Herramientas  $herramientas
     * @return \Illuminate\Http\Response
     */

     //actulizar la herramienta 
    public function update(Request $request,$id)
    {
        //

        $campos=[
            
            'descripcion'=>'required|string',
            'nombre'=>'required|string',
            'categoria'=>'required|string',
        ];
        if($request->hasFile('imagen')){
            $campos+=['imagen'=>'required|mimes:jpeg,png,jpg'];
        }
        $Mensaje=["required"=>'El:attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);


        $datosHerramienta=request()->except('_token','_method');
        if($request->hasFile('imagen')){

            $herramienta= Herramientas::findOrFail($id);

            Storage::delete('public/'.$herramienta->imagen);

            $datosHerramienta['imagen']=$request->file('imagen')->store('uploads','public');

        }


        Herramientas::where('id','=',$id)->update($datosHerramienta);

        //$herramienta= Herramientas::findOrFail($id);
        //return view('herramientas.edit',compact('herramienta'));
        return redirect('herramientas')->with('Mensaje','Herramienta modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Herramientas  $herramientas
     * @return \Illuminate\Http\Response
     */

     //eliminar una herramienta por id
    public function destroy($id)
    {
        //

        $herramienta= Herramientas::findOrFail($id);

        if(Storage::delete('public/'.$herramienta->imagen)){
        Herramientas::destroy($id);
        }

 
        return redirect('herramientas')->with('Mensaje','Herramienta eliminada');
    }
}
