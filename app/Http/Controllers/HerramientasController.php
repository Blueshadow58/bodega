<?php

namespace App\Http\Controllers;

use App\Herramientas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HerramientasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {
        //

        $campos=[
            'imagen'=>'required|mimes:jpeg,png,jpg',
            'descripcion'=>'required|string',
            'nombre'=>'required|string',
            'stock'=>'required|integer',
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
    public function update(Request $request,$id)
    {
        //

        $campos=[
            
            'descripcion'=>'required|string',
            'nombre'=>'required|string',
            'stock'=>'required|integer',
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
