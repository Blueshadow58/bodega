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
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button" style="background-color: #c67e06;color: rgb(255,255,255);">
            <div class="container"><a class="navbar-brand" href="#">Nombre</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="background-color: #ffffff;"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1" style="color: rgb(255,255,255);">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="home-bodega" style="color: #ffffff;">Home</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="perfil" style="color: #ffffff;">Perfil</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="mensajes" style="color: #ffffff;">Mensajes</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="pedidoHerramienta" style="color: #ffffff;">Generar pedido</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="registro-ordenes" style="color: #ffffff;">Registro de ordenes</a></li>
                    </ul><span class="navbar-text actions"> </span></div>
            </div>
        </nav>
    </header>
    <div class="contact-clean" style="background-color: transparent;">
        <div class="container">

            <div class="table-responsive">
    <table class="table table-striped" style="color:#ffffff;">
        <thead style="background-color:#c67e06;">
            <tr>
                <th>Fecha de envio</th>
                <th>Nombre</th>                
                <th>Asunto</th>
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
              <td>
                <form action="pedido.detalle" method="post" style="background-color: #002d47;padding:10px">
                  @csrf
                  <button class="btn-primary" style="border: 1px solid;" name="btnId" value="{{$pedido->id}}"  >Ver detalle</button>
                </form>
              </td>
            
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div></div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
</body>

</html>