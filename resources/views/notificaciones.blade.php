<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Mensajes</title>
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
    
        <div class="container" style="padding-top: 25px">

            <div class="row">

            <div class="col text-center">
                    <div>                    
                        <button class="btn btn-success font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseCrearMensaje" aria-expanded="false" aria-controls="collapseCrearMensaje">
                            Crear mensaje
                        </button>
                    </div>
                    <br/>

                    <div style="">                    
                        <form action="filtrarMensajes" method="post">
                            @csrf
                            <input type="text" class="text-center" name="filtrarNombre" placeholder="Nombre" style="margin-bottom: 15px">                            
                            <button class="btn-primary btn font-weight-bold" style="border-radius: 5px;">Filtrar</button>
                        </form>
                    </div>
                    
            </div>




            <div class="col-9">



              <div class="collapse" id="collapseCrearMensaje" style="padding-bottom: 15px;" >
                <div class="card card-body" style="background-color: #c67e06;border: 1px solid;border-color: white">
                    <form class="form-inline" action="mensajes.store" method="post" style="color:white">
                        @csrf

                        <div class="container text-center">
                            <div class="row" style="padding-bottom: 15px">

                                <div class="col">

                                    <div class="form-group"> 

                                        {{-- <div>
                                            <input type="text" placeholder="Mensaje" name="mensaje" class="form-control input-block" id="mensaje">
                                        </div> --}}

                                        <div style="padding-inline: 15px">
                                            <select name="destinatario_id" >
                                                    <option value="">Selecciona el destinatario</option>
                                                @foreach ($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach  
                                            </select>
                                        </div>

                                        <div class="">
                                            <button class="btn btn-success font-weight-bold" type="submit" style="border: 1px solid;border-radius:5px" >Enviar</button>  
                                        </div>    
                                    </div>
                                
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <textarea name="mensaje" placeholder="texto" id="" cols="30" rows="10" style="width: 100%;border-radius: 5px;min-height: 100px"></textarea>
                                </div>
                            </div>
                        </div>


                          
                            
                        
                      </form> 
                </div>
                        </div> 





                        @foreach($mensajes as $mensaje)
                      
                        <div class="accordion" id="ID" style="padding-bottom: 15px">
                            <div class="card" style="background-color: #c67e06;">
                              <div class="card-header" id="headingOne">

                              
                                  <div class="inline">
                                    <form action="mensajes.read"  method="post" style="padding: 0px">
                                      @csrf
                                  <button class="btn btn-link  font-weight-bold" type="button" data-toggle="collapse" data-target="#ID{{$mensaje->id}}" aria-expanded="true" aria-controls="collapseOne" style="color: white;">                                    
                                    @foreach ($users as $usuario)
                                        @if ($mensaje->remitente_id == $usuario->id)
                                        De: {{$usuario->name}} | Fecha: {{$mensaje->created_at}}         
                                        @endif
                                    @endforeach                                    
                                  </button>
                               
                                 
                                      <button type="submit" name="idMensaje" value="{{$mensaje->id}}" class="btn btn-danger float-right">Eliminar</button>
                                  </form>

                                </div>

                              
                              </div>                      
                              <div id="ID{{$mensaje->id}}" class="collapse" aria-labelledby="headingOne" >
                                <div class="card-body" style="color: white;font-size: 18px">
                                  {{$mensaje->contenido_mensaje}}
                                </div>
                              </div>
                            </div>                
                          </div>

                        @endforeach
                   
            </div>




     {{--        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
                <div class="toast-header">
                  <img src="..." class="rounded mr-2" alt="...">
                  <strong class="mr-auto">Bootstrap</strong>
                  <small>11 mins ago</small>
                  <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="toast-body">
                  Hello, world! This is a toast message.
                </div>
              </div>

              <button id="dialog">dsd</button>
--}}    
         </div><!-- container -->
      {{-- sdfsd --}}

{{-- 
<script>
    $(document).ready(function(){
        $('.toast').toast('show');
        
    });
    
</script> --}}



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
</body>

</html>