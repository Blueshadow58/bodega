<?php

namespace App\Http\Controllers;

use App\Herramientas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Picqer;

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

}
