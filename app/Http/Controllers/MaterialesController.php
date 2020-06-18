<?php

namespace App\Http\Controllers;

use App\Materiales;
use Illuminate\Http\Request;

class MaterialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //codigo de mi compañero lo comentare de todas formas

    public function index()
    {
        //seleccionar los materiales
        $datos['materiales']=Materiales::paginate(5);
        return view('materiales.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //enviar a pagina create
        return view ('materiales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //crear un material
       // $datosMaterial=request()->all();
        $datosMaterial=request()->except('_token');
        Materiales::create($datosMaterial);
        return redirect('materiales');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materiales  $materiales
     * @return \Illuminate\Http\Response
     */
    public function show(Materiales $materiales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materiales  $materiales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //llamar un material al buscarlo por la id y retornar a vista edit
        $material=Materiales::findOrFail($id);
        return view('materiales.edit',compact('material'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materiales  $materiales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //actualizar un material
        $datosMaterial=request()->except(['_token','_method']);
        Materiales::where('id','=',$id)->update($datosMaterial);

        $material=Materiales::findOrFail($id);
        return view('materiales.edit',compact('material'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materiales  $materiales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //eliminar un material
        Materiales::destroy($id);
        return redirect('materiales');
       
    }
}
