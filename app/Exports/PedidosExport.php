<?php

namespace App\Exports;

use App\Pedido;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

//Realizar export a excel
class PedidosExport implements FromCollection
{
    
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pedido::all()->where('estado_pedido',"finalizado");
    }
}
