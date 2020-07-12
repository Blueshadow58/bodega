<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title></title>
</head>
<body style="background-color: #d5d5d5">
    <header >
        {{-- Llamando la navbar de carpeta --}}
        @include('layouts.navbarMenu')
    </header>


<div class="container">

    <div class="row justify-content-md-center pb-5 pt-5" >
        <form class="form-inline" method="POST" action="barcode-filtro">
            @csrf
            <div class="col">
                <div class="input-group ">                    
                    <select class="custom-select" name="selectFiltroBC" required>
                      <option selected disabled>Elige...</option>
                      <option value="nombre">Nombre</option>
                      <option value="id">Id</option>                      
                    </select>
                  </div>
            </div>
            <div class="col">
            <div class="form-group input-group-lg" >              
                <input type="text"   class="form-control " name="inputFiltroBC"  required/>              
            </div>
            </div>            
        <div class="col">
            <button type="submit" class="btn btn-primary btn-block" >Filtrar</button>
        </div>                
        </form>        
           
        <form class="form-inline" action="PDFBarcode" method="post">
            @csrf                             

            <div class="col">
                <button type="submit" name="btnHerramientas" value="{{$herramientas}}" class="btn btn-primary">PDF Barcode</button>
            </div>
            
        </form>
        

    </div>

    {{-- <div class="row ">
        @for ($i = 0; $i < $largo ; $i++)
        <div class="col-4 text-center pb-4 " >
            <h4>{{$herramientas[$i]->nombre}}</h4>
            <img src="data:image/png;base64,{{ base64_encode($barcode[$i]) }}"  style="height: 80px">                     
            <h4>{{$herramientas[$i]->id}}</h4>
        </div>
        @endfor
    </div> --}}


    @include('select-barcode')

</div>


</body>
</html>