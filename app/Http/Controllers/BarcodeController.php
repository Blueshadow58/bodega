<?php

namespace App\Http\Controllers;

use App\Herramientas;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Picqer;
use Illuminate\Support\Facades\App;



class BarcodeController extends Controller
{
    public function index(){

        //todas las herramientas
        $herramientas = Herramientas::all();
        //todas las id
        $ids = Herramientas::all()->pluck('id');
        //largo del json
        $largo = sizeof($ids);
        //Generra barcode png
        $barcode_generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        //recorrer el arreglo y enviar a el blade un array de codigos de barras
        foreach ($ids as $id){
            $barcode[] = $barcode_generator->getBarcode($id,$barcode_generator::TYPE_CODE_128);
        }
        return view('barcode',['barcode' => $barcode,'herramientas' => $herramientas,'largo' => $largo]);
    }

    public function filtrarBC(Request $request){

        $select = $request->selectFiltroBC;
        $input = $request->inputFiltroBC;

        

        if($input == "todo" || $input == "todos"){

            return $this->index();

        }else{


            if($select == "nombre"){
                //todas las herramientas
           $herramientas = Herramientas::select('*')->where('nombre','like',$input.'%')->get();
           //todas las id
           $ids = Herramientas::select('id')->where('nombre','like',$input.'%')->pluck('id');
           //largo del json
           $largo = sizeof($ids);
           //Generra barcode png
           $barcode_generator = new Picqer\Barcode\BarcodeGeneratorPNG();
           //recorrer el arreglo y enviar a el blade un array de codigos de barras
           foreach ($ids as $id){
               $barcode[] = $barcode_generator->getBarcode($id,$barcode_generator::TYPE_CODE_128);
           }
           return view('barcode',['barcode' => $barcode,'herramientas' => $herramientas,'largo' => $largo]);
   
           }elseif($select == "id"){
                //todas las herramientas
           $herramientas = Herramientas::select('*')->where('id',$input)->get();
           //todas las id
           $ids = Herramientas::select('id')->where('id',$input)->pluck('id');
           //largo del json
           $largo = sizeof($ids);
           //Generra barcode png
           $barcode_generator = new Picqer\Barcode\BarcodeGeneratorPNG();
           //recorrer el arreglo y enviar a el blade un array de codigos de barras
           foreach ($ids as $id){
               $barcode[] = $barcode_generator->getBarcode($id,$barcode_generator::TYPE_CODE_128);
           }
           return view('barcode',['barcode' => $barcode,'herramientas' => $herramientas,'largo' => $largo]);
           }   
        }
    }


   

    //Generar un pdf de html
    public function PDFBarcode( Request $request )
    {
       
        //  //todas las herramientas
        $herramientas = json_decode($request->btnHerramientas);    
            
        // guardar las ids en una variable
        foreach ($herramientas as $herramienta){
            $ids[] = $herramienta->id;
        }

        //largo 
        $largo = sizeof($herramientas);

         //Generra barcode png
         $barcode_generator = new Picqer\Barcode\BarcodeGeneratorPNG();
         //recorrer el arreglo y enviar a el blade un array de codigos de barras
         foreach ($ids as $id){
             $barcode[] = $barcode_generator->getBarcode($id,$barcode_generator::TYPE_CODE_128);
         }
       

        $data = [
            'largo' => $largo,
            'barcode' => $barcode,
            'herramientas' => $herramientas
        ];
    
        $pdf = PDF::loadView('select-barcode', $data);
        //return $pdf->stream();
        return $pdf->download('barcode.pdf');

    }



}
