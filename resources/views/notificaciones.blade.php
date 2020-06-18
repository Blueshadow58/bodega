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
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left font-weight-bold" type="button" data-toggle="collapse" data-target="#ID{{$mensaje->id}}" aria-expanded="true" aria-controls="collapseOne" style="color: white;">                                    

                                    @foreach ($users as $usuario)
                                        @if ($mensaje->remitente_id == $usuario->id)
                                        De: {{$usuario->name}} | Fecha: {{$mensaje->created_at}}         
                                        @endif
                                    @endforeach
                                    
                                  </button>
                                </h2>
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

         </div>
         

            {{-- <div class="form-group">
                <div class="dropdown"><button class="btn btn-primary dropdown-toggle border rounded border-white" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: #002d47;">Asunto</button>
                    <div class="dropdown-menu" role="menu" style="background-color: #002d47;color: rgb(198,125,7);"><a class="dropdown-item" role="presentation" href="#" style="background-color: #002d47;color: rgb(255,255,255);">Solicitud de herramientas</a><a class="dropdown-item" role="presentation" href="#" style="background-color: #002d47;color: rgb(255,255,255);">Mensaje</a></div>
                </div>
            </div><div class="table-responsive"> --}}


            {{-- Crear mensaje --}}
                {{-- importante --}}
                {{-- <form class="form-inline" action="mensajes.store" method="post" style="color:white">
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
                  </form>  --}}



                {{-- Tabla antigua --}}
{{-- 
                <table class="table table-striped" style="color:#ffffff">
          <thead style="background-color: #c67e06;">
               <tr>
                <th><strong>Fecha de envio</strong></th> 
                <th>usuario</th>
                <th>mensaje</th>                
            </tr>
          </thead>
             <tbody>
            @foreach($mensajes as $mensaje)
            <tr>
                <td>{{$mensaje->remitente_id}}</td>   
              <td>{{$mensaje->contenido_mensaje}}</td>                                       
              <td>{{$mensaje->created_at}}</td>  
            </tr>
            @endforeach 
             </tbody>
                </table>
  --}}


  


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
</body>

</html>