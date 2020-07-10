
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
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
</head>

<body style="background-color: #002d47;">
    
    <header style="background-color: #ffffff;color: rgb(255,255,255);">

        {{-- Llamando la navbar de carpeta --}}
        @include('layouts.navbarMenu')

    </header>
    <div class="contact-clean" style="background-color: transparent;">
        <div class="container">


            
            <div class="row">
                <div class="col align-self-start">


                    <form action="filtrarNombre"  method="post" style="background-color: #002d47;padding-top:0px;">
                        @csrf



                        <div class="d-inline d-inline-block">
                            <input  class="form-control" style="border-radius: 5px" type="text" name="filtrarNombre" placeholder="Nombre">
                        </div>

                        <div class="d-inline d-inline-block" >
                            <button class="btn btn-primary  "  style="border: 1px solid;border-radius: 5px;margin-top: 0px" name="btnId" value=""  >Filtrar</button>
                        </div>
                        
                        
                    </form>

                </div>     

                <div class="col text-right">
            {{-- Excel --}}
            <a href="{{url('descargarExcel')}}" style="border: 1px solid;" class="btn btn-success">Descargar Excel</a>
            {{-- PDF --}}
            <a href="{{url('descargarPDF')}}" style="border: 1px solid;" class="btn btn-success">Descargar PDF</a>
                </div>
            </div>






            <div class="table-responsive">
    <table class="table table-striped" style="color:#ffffff;">
        <thead style="background-color:#c67e06;">
            <tr>
                <th>Fecha de envio</th>
                <th>Nombre</th>                
                <th>Asunto</th>
                <th>Estado</th>
                {{-- <th><a href="{{route('descargarPDF')}}" class="btn btn-primary">Imprimir PDF</a></th> --}}
                {{-- <th><button type="button" onclick="window.location='{{ url('descargarPDF') }}'">Button</button></th> --}}
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach($pedidos as $pedido)
            <tr>
                <td>{{$pedido->created_at}}</td>
              
                {{-- Nombre del usuario de la solicitud   --}}
                @foreach($usuarios as $usuario)
                    @if ($pedido->id_usuario == $usuario->id)
                    <td>{{$usuario->name}}</td>
                    @else
                    
                    @endif
                @endforeach

                <td>{{$pedido->asunto}}</td>              
                <td>{{$pedido->estado_pedido}}</td>
              <td>
                <form action="pedido.detalle" method="post" style="background-color: #002d47;padding:10px">
                  @csrf
                  <button class="btn-primary " style="border: 1px solid;border-radius: 5px;" name="btnId" value="{{$pedido->id}}"  >Ver detalle</button>
                </form>
              </td>
            
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>



</div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
</body>

</html>