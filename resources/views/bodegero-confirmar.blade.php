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

<body style="background-color: #002d47;color: rgb(255,255,255);">
    <header style="background-color: #ffffff;color: rgb(255,255,255);">
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button" style="background-color: #c67e06;color: rgb(255,255,255);">
            <div class="container"><a class="navbar-brand" href="#">Nombre</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="background-color: #ffffff;"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1" style="color: rgb(255,255,255);">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="HomeBodega.html" style="color: #ffffff;">Home</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="Perfil.html" style="color: #ffffff;">Perfil</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="Notificaciones.html" style="color: #ffffff;">Mensajes</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="registro-ordenes" style="color: #ffffff;">Registro de ordenes</a></li>
                    </ul><span class="navbar-text actions"> </span></div>
            </div>
        </nav>
    </header>
    <div class="contact-clean" style="background-color: transparent;">
        <div class="container">
            <div class="form-group">
                {{-- <a class="btn btn-primary border-light" role="button" href="Registro%20Ordenes.html" style="background-color: #002d47;">Volver</a><a class="btn btn-primary border-light float-right" role="button" href="Registro%20Ordenes.html" style="background-color: #002d47;">Registrar</a> --}}
            </div>
            <div
                class="card">
                <div class="card-body" style="background-color: #002d47;color: rgb(255,255,255);opacity: 1;">
                    <h4 class="card-title">Asunto</h4>
                    <div class="form-group"><span>Fecha:</span></div>
                    <div class="form-group"><span>Nombre:</span></div>
                    
                    <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                    <div><div class="table-responsive table-striped">
    <table class="table" style="color: #eff1f4">
        <thead style="background-color: #c67e06;">
            <tr>
                <th><strong>Id herramienta</strong></th>
                
                <th>Estado</th>
                
            </tr>
        </thead>
        <tbody>
          
            @foreach($pedidoHerramientas as $pedidoHerramienta)
            <tr>
              <td>{{$pedidoHerramienta->id_herramienta}}</td>
              {{-- <td>
              <img src="{{ asset('storage').'/'.$producto->imagen}}" class="img-thumbnail img-fliud" alt="" width="100">
              </td> --}}
              
              <td>{{$pedidoHerramienta->estado_herramienta}}</td>    
              
            
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