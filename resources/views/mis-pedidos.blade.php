<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    
    <link rel="stylesheet" href="assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body style="background-color: #002d47;">
    <header style="background-color: #ffffff;color: rgb(255,255,255);">
        {{-- Llamando la navbar de carpeta --}}
        @include('layouts.navbarMenu')
    </header>



    <form action="p" method="post">
        @csrf
        <button type="submit">sdfsdf</button>
    </form>


    <div class="contact-clean mt-5" style="background-color: transparent;">
        <div class="container">

            <div class="table-responsive">
    <table class="table table-striped" style="color:#ffffff;">
        <thead style="background-color:#c67e06;">
            <tr>
                <th>Fecha de envio</th>
                <th>Nombre</th>                
                <th>Asunto</th>
                {{-- <th><a href="{{route('descargarPDF')}}" class="btn btn-primary">Imprimir PDF</a></th> --}}
                {{-- <th><button type="button" onclick="window.location='{{ url('descargarPDF') }}'">Button</button></th> --}}
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach($pedidos as $pedido)
            <tr>
                <td>{{$pedido->created_at}}</td>
             
                    <td>{{$nombre}}</td>
             
                <td>{{$pedido->asunto}}</td>       
                
                
                {{--  --}}
              <td>
                <form action="pedido.detalle" method="post" style="background-color: #002d47;padding:10px">
                  @csrf
                  <button class="btn-primary " style="border: 1px solid;border-radius: 5px;" name="btnId" value="{{$pedido->id}}"  >Ver detalle</button>
                </form>
              </td>
            {{--  --}}




            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
</div>
    </div>
                  





    
</body>
</html>