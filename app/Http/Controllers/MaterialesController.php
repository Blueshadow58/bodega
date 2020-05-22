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
    public function index()
    {
        //
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
        //
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
        //
       // $datosMaterial=request()->all();
        $datosMaterial=request()->except('_token');
        Materiales::insert($datosMaterial);
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
        //
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
        //
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
        //
        Materiales::destroy($id);
        return redirect('materiales');
       
    }
}
