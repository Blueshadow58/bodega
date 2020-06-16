<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{

    
    public function PDF() {
        $pdf = \PDF::loadView('registro-ordenes');
        
        return view('registro-ordenes');
        //$pdf->download('Ordenes.pdf'),back()
    }
}
