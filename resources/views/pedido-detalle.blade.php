<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Detalle pedido</title>
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

<body style="background-color: #002d47;color: rgb(255,255,255);">
    <header style="background-color: #ffffff;color: rgb(255,255,255);">
        {{-- Llamando la navbar de carpeta --}}
        @include('layouts.navbarMenu')
    </header>
    <div class="contact-clean" style="background-color: transparent;">
        <div class="container">
            <div class="form-group">
                {{-- <a class="btn btn-primary border-light" role="button" href="Registro%20Ordenes.html" style="background-color: #002d47;">Volver</a><a class="btn btn-primary border-light float-right" role="button" href="Registro%20Ordenes.html" style="background-color: #002d47;">Registrar</a> --}}
            </div>
            <div
                class="card">
                <div class="card-body" style="background-color: #002d47;color: rgb(255,255,255);opacity: 1;">
                    
                    <div class="container">
                        <div class="row">
                        <div class="col ">
                            
                    @foreach($pedido as $pedido)
                    <h4 class="card-title">Asunto: {{$pedido->asunto}}</h4>                    
                    <div class="form-group"><span>Fecha entrega: {{$pedido->fecha_entrega}}</span></div>
                    @foreach ($usuario as $usuario)                        
                    @if ($pedido->id_usuario == $usuario->id)
                    <div class="form-group"><span>Nombre: {{$usuario->name}}</span></div>    
                    @endif                        
                    @endforeach
                    @endforeach
                        </div>
                        <div class="col text-right">
                            {{-- <a href="{{url('descargarDetallePDF')}}" style="border: 1px solid;" class="btn btn-success">Imprimir PDF</a> --}}

                            
                            <form action="detallePDF" method="post" style="background-color: #002d47;padding:10px">
                                @csrf

                                <button class="btn-success" style="border: 1px solid;" name="idPedido" value="{{$pedido->id}}">Generar PDF</button>    
                                
                              </form>
                            

                        </div>
                    </div>
                    </div>

                    <div>                        
                        <div class="table-responsive table-striped">
    <table class="table" style="color: #eff1f4">
        <thead style="background-color: #c67e06;">
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
          
            @foreach($pedidoHerramientas as $pedidoHerramienta)
            <tr>

                @foreach ($herramientas as $herramienta)
                    
                    @if ($pedidoHerramienta->id_herramienta == $herramienta->id)
                    
                    <td><img src="{{ asset('storage').'/'.$herramienta->imagen}}" class="img-thumbnail img-fliud" alt="" width="100"></td>
                    <td>{{$herramienta->nombre}}</td>
                    <td>{{$pedidoHerramienta->cantidad}}</td>
                    @endif    
                @endforeach

                <td>{{$pedidoHerramienta->estado_herramienta}}</td>    
                
              {{-- <td>
              <img src="{{ asset('storage').'/'.$producto->imagen}}" class="img-thumbnail img-fliud" alt="" width="100">
              </td> --}}
              
            </tr>
            @endforeach
        </tbody>
    </table>
</div></div>
                </div>
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