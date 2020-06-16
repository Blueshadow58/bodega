<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{

    
    public function PDF(){
        $pdf = \PDF::loadView('registro-ordenes');
        $pdf->download('Ordenes.pdf');
    }
}
