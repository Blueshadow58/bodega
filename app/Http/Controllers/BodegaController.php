<?php

namespace App\Http\Controllers;

use App\Herramientas;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;


//solo pruebas nada importante revisare si es util de lo contrario lo eliminare

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bodeguero/confirmarPedido');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {

        $herramientas = Herramientas::all();


        return view('home-bodega')->with('herramientas',$herramientas);
    }



    public function filtro(Request $request){

         
         $bool = Herramientas::select('*')->where('nombre','like',$request->inputFiltro.'%')->exists();


        if (!$bool) {
            return $this->view();
        }


        $herramientas = Herramientas::select('*')->where('nombre','like',$request->inputFiltro.'%')->get();


        return view('home-bodega')->with('herramientas',$herramientas);

    }


public function herramientasPDF(Request $request){

     //  //todas las herramientas
     $herramientas = array($request->btnHerramientas);    
            
    //  // guardar las ids en una variable
    //  foreach ($herramientas as $herramienta){
    //      $ids[] = $herramienta->id;
    //  }

    //   $herramientas = Herramientas::whereIn('id',$ids)->get();

        $largo = $request->herramientas->count();


    

    $data = [
        'largo' => $largo,        
        'herramientas' => $herramientas
    ];


    $pdf = PDF::loadView('herraFiltro',compact('herramientas',$data));
    //return $pdf->stream();
    return $pdf->download('herramientas.pdf');

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
