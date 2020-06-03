
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    
    <title>Document</title>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
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



{{-- <body>
    
    <br>
    <br>
    <table class="table table-light table-hover">
    <thead class="thead-light">
      <tr>
        <th>Identificador</th>
        <th>imagen</th>
        <th>descripcion</th>
        <th>nombre</th>      
        <th>accion</th>
      </tr>
      </thead>    
      <tbody>
      @foreach($herramientas as $herramienta)
      <tr id="estado_tr{{$herramienta->id}}">
        <td>{{$herramienta->id}}</td>
        <td>
        <img src="{{ asset('storage').'/'.$herramienta->imagen}}" class="img-thumbnail img-fliud" alt="" width="100">
        </td>
        <td>{{$herramienta->descripcion}}</td>
        <td>{{$herramienta->nombre}}</td>    
        <td>
          <form action="pedidoHerramienta.agregar" method="post">
            @csrf
            <button name="btnId" value="{{$herramienta->id}}" onclick="agregar({{$herramienta->id}})">Agregar</button>
          </form>
        </td>
      
      </tr>
      @endforeach
      </tbody>    
    </table>
    {{$herramientas->links()}}    
    <table>
        <thead>
           <tr>
            <th>Identificador</th>
            <th>imagen</th>
            <th>descripcion</th>
            <th>nombre</th>          
            <th>accion</th>
           </tr>
        </thead>
        <tbody>

<form action="pedidoHerramienta.volcar" method="post">
@csrf
  <input type="date" name="fechaEntrega" id="">
  <input type="text" name="asunto" />
  <button name="idUser" value="{{$usuario}}" type="submit">Generar lista</button>
</form>
        </tbody>
    </table>
</body> --}}




<body style="background-color: #002d47;">
  <header style="background-color: #ffffff;color: rgb(255,255,255);">
      <nav class="navbar navbar-light navbar-expand-md navigation-clean-button" style="background-color: #c67e06;color: rgb(255,255,255);">
          <div class="container"><a class="navbar-brand" href="#">Nombre</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="background-color: #ffffff;"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
              <div
                  class="collapse navbar-collapse" id="navcol-1" style="color: rgb(255,255,255);">
                  <ul class="nav navbar-nav mr-auto">
                      <li class="nav-item" role="presentation"><a class="nav-link" href="HomeBodega.html" style="color: #ffffff;">Home</a></li>
                      <li class="nav-item" role="presentation"><a class="nav-link" href="Perfil.html" style="color: #ffffff;">Perfil</a></li>
                      <li class="nav-item" role="presentation"><a class="nav-link" href="Notificaciones.html" style="color: #ffffff;">Notificaciones</a></li>
                      <li class="nav-item" role="presentation"><a class="nav-link" href="Registro%20Ordenes.html" style="color: #ffffff;">Registro de ordenes</a></li>
                  </ul><span class="navbar-text actions"> </span></div>
          </div>
      </nav>
  </header>



  
  <div class="contact-clean" style="background-color: transparent;background-position: top;">
      <div class="container">
          <div class="row">
              <div class="col">

                  {{-- <form class="border rounded border-white" method="post" style="margin-bottom: 20px; background-color: #c67e06;color">
                      <h2 class="text-center" style="padding-top: 15px;color: #ffffff;">Filtrar</h2>
                      <div class="form-group"><input class="border rounded form-control" type="text" name="name" placeholder="Buscar" style="background-color: #002d47;color: rgb(255,255,255);border-color: #002d47!important;"></div>
                      <div class="form-group">
                          <div class="dropdown"><button class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: #002d47;">Tipo</button>
                              <div class="dropdown-menu" role="menu" style="background-color: #002d47;color: rgb(255,255,255);"><a class="dropdown-item" role="presentation" href="#" style="background-color: #002d47;color: rgb(255,255,255);">Taladros</a><a class="dropdown-item" role="presentation" href="#" style="background-color: #002d47;color: rgb(255,255,255);">Sierras</a></div>
                          </div>
                      </div>
                      <div class="form-group"><button class="btn btn-primary btn-block" type="button" style="background-color: #002d47;">Buscar</button></div>
                  </form> --}}
                  
                  <div class="table-responsive table-striped">

                    <!-- Tabla elementos seleccionados -->
  <table class="table" style="color:white">
      <thead style="background-color: #c67e06;color: #eff1f4;">
          <tr>
              <th><strong>Nombre</strong></th>
              <th>Estado</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td>Sierra circular eléctrica 9&quot; 2200 W</td>
              <td>Usada, rotura del material protector e...</td>
              <td><a class="btn btn-danger" style="border: 1px solid" href="BodegueroConfirmar.html">Eliminar</a></td>
          </tr>
      </tbody>
  </table>
</div></div>
              <div class="col">
                  <div class="form-group">
                   <!-- <a class="btn btn-primary border rounded border-white" role="button" href="Registro%20Ordenes.html" style="background-color: #002d47;">Enviar Lista</a>-->

<form action="pedidoHerramienta.volcar" method="post" style="padding: 20px;background-color: #c67e06;border: 1px solid;color:white">
  @csrf

    <input type="date" name="fechaEntrega" id="">
    <input type="text" name="asunto" placeholder="Asunto" />
    <button name="idUser" value="{{$usuario}}" type="submit" class="btn btn-primary border rounded border-white" style="background-color: #002d47;">Generar lista</button>
  </form>
                  </div>
                  <div class="table-responsive table-striped">
  <table class="table" style="color:white">
      <thead style="background-color: #c67e06;color: #eff1f4;">
          <tr >
              <th><strong>imagen</strong></th>
              <th>nombre</th>
              <th>descripcion</th>              
              <th></th>
          </tr>
      </thead>
      <tbody>
        @foreach($herramientas as $herramienta)
        <tr id="estado_tr{{$herramienta->id}}">
          <td>{{$herramienta->id}}</td>
          <td>
          <img src="{{ asset('storage').'/'.$herramienta->imagen}}" class="img-thumbnail img-fliud" alt="" width="100">
          </td>
          <td>{{$herramienta->descripcion}}</td>
          <td>{{$herramienta->nombre}}</td>    
          <td>
            <form action="pedidoHerramienta.agregar" method="post" style="background-color: #002d47;padding:10px">
              @csrf
              <button class="btn-success" style="border: 1px solid;" name="btnId" value="{{$herramienta->id}}"  onclick="agregar({{$herramienta->id}})" >Agregar</button>
            </form>
          </td>
        
        </tr>
        @endforeach
         
      </tbody>
  </table>
</div></div>
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