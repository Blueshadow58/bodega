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
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button" style="background-color: #c67e06;color: rgb(255,255,255);">
            <div class="container"><a class="navbar-brand" href="#">Nombre</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="background-color: #ffffff;"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1" style="color: rgb(255,255,255);">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="home-bodega" style="color: #ffffff;">Home</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="perfil" style="color: #ffffff;">Perfil</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="notificaciones" style="color: #ffffff;">Notificaciones</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="registro-ordenes" style="color: #ffffff;">Registro de ordenes</a></li>
                    </ul><span class="navbar-text actions"> </span></div>
            </div>
        </nav>
    </header>
    <div class="contact-clean" style="background-color: transparent;">
        <div class="container">

            {{-- <div class="form-group">
                <div class="dropdown"><button class="btn btn-primary dropdown-toggle border rounded border-white" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: #002d47;">Asunto</button>
                    <div class="dropdown-menu" role="menu" style="background-color: #002d47;color: rgb(198,125,7);"><a class="dropdown-item" role="presentation" href="#" style="background-color: #002d47;color: rgb(255,255,255);">Solicitud de herramientas</a><a class="dropdown-item" role="presentation" href="#" style="background-color: #002d47;color: rgb(255,255,255);">Mensaje</a></div>
                </div>
            </div><div class="table-responsive"> --}}
<br>
                <form class="form-inline" action="mensajes.store" method="post" style="color:white">
                    @csrf
                    <div class="form-group">
                    
                      <input type="text" placeholder="Mensaje" name="mensaje" class="form-control" id="mensaje">
                    </div>

                    <select name="destinatario_id" >
                    <option value="">Selecciona el destinatario</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach

        </select>
        <button class="btn-success" type="submit" style="border: 1px solid;" >Enviar</button>
                    
                  </form> 
<br>
    <table class="table table-striped" style="color:#ffffff">
        <thead style="background-color: #c67e06;">
            <tr>
                {{-- <th><strong>Fecha de envio</strong></th> --}}
                <th>usuario</th>
                <th>mensaje</th>                
            </tr>
        </thead>
        <tbody>

            @foreach($mensajes as $mensaje)
            <tr>
                <td>{{$mensaje->remitente_id}}</td>   
              <td>{{$mensaje->contenido_mensaje}}</td>                                       
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