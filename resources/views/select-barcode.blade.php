

<div class="row" style="text-align: center">
    @for ($i = 0; $i < $largo ; $i++)    
    <div class="col-4 text-center pb-4 " >
        <h4>{{$herramientas[$i]->nombre}}</h4>
        <img src="data:image/png;base64,{{ base64_encode($barcode[$i]) }}"  style="height: 75px">                     
        <h4>{{$herramientas[$i]->id}}</h4>
    </div>
    @endfor
</div>
