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
        
        <div class="container-fluid">
        <div class="row">

            <div class="col-4">

            <div class="form-group">
                {{-- <a class="btn btn-primary border-light" role="button" href="Registro%20Ordenes.html" style="background-color: #002d47;">Volver</a><a class="btn btn-primary border-light float-right" role="button" href="Registro%20Ordenes.html" style="background-color: #002d47;">Registrar</a> --}}
            </div>
            <div class="card">
                <div class="card-body" style="background-color: #002d47;color: rgb(255,255,255);opacity: 1;">
                    
                    <div class="container">
                       
                            
                    @foreach($pedido as $pedido)
                    
                    
                        <h4 class="card-title">Asunto: {{$pedido->asunto}}</h4>                    
                        <div class="row">
                            <div class="col">
                                <span>Fecha entrega: {{$pedido->fecha_entrega}}</span>
                            </div>
                            <div class="col">


                    
                    @foreach ($usuario as $usuario)                        
                    @if ($pedido->id_usuario == $usuario->id)
                    <div class="form-group"><span>Nombre: {{$usuario->name}}</span></div>    
                    @endif                                            
                    @endforeach
                            </div>



                        
                        
</div>
                    @endforeach
                        
                    </div>

                    <div>                        
                        <div class="table-responsive table-striped mt-2">
    <table class="table" style="color: #eff1f4">
        <thead style="background-color: #c67e06;">
            <tr>
                <th>Categoria</th>                
                <th>Cantidad</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
          
           
@foreach($pedidoHerramientas as $pedidoHerramienta)
<tr>

    
    <td>{{$pedidoHerramienta->categoria}}</td>        
    <td>{{$pedidoHerramienta->cantidad}}</td>        
    <td>{{$pedidoHerramienta->estado_herramienta}}</td>    
    
  {{-- <td>
  <img src="{{ asset('storage').'/'.$producto->imagen}}" class="img-thumbnail img-fliud" alt="" width="100">
  </td> --}}
  
</tr>
@endforeach
              {{-- <td>
              <img src="{{ asset('storage').'/'.$producto->imagen}}" class="img-thumbnail img-fliud" alt="" width="100">
              </td> --}}
              
            </tr>
          
        </tbody>
    </table>
</div></div>
                </div>
        </div>
    </div>
    









            
        {{-- TABLA HERRAMIENTAS---------------------------------------------------------------------- --}}
            <div class="col "  >

                {{-- Asignar herramientas de forma automatica --}}
                <form action="rh-pedido-generar" method="post" style="background-color: transparent;padding-top: 0px">
                    @csrf
                    <button class="btn btn-primary" type="submit">Asignar herramientas automaticamente </button>
                </form>
                {{-- Asignar herramientas de forma automatica --}}












                {{-- Generar lista de las herramientas que seran registradas en el pedido --}}

                <div class="" style="background-color: transparent;">
                    <div class="container">
                        <div class="form-group">
                            {{-- <a class="btn btn-primary border-light" role="button" href="Registro%20Ordenes.html" style="background-color: #002d47;">Volver</a><a class="btn btn-primary border-light float-right" role="button" href="Registro%20Ordenes.html" style="background-color: #002d47;">Registrar</a> --}}
                        </div>
                        <div
                            class="card">
                            <div class="card-body" style="background-color: #002d47;color: rgb(255,255,255);opacity: 1;">
                                
                                <div class="container">
                                    <div class="row">
                                    <div class="col text-center">
                                        
                                        <h2>Asignar Herramientas</h2>
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
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      

                        {{-- @foreach($herramientas as $herramienta)
                        <tr>
                            
                            <td><img src="{{ asset('storage').'/'.$herramienta->imagen}}" class="img-thumbnail img-fliud" alt="" width="100"></td>
                            <td>{{$herramienta->nombre}}</td>  
                                
                            <td>{{$herramienta->descripcion}}</td>        
                            <td>{{$herramienta->categoria}}</td>    


                            <form action="crear-registro-herramientas-agregar" method="post">
                                @csrf
                                <td><button class="btn btn-success" type="submit">Eliminar</button></td>    
                            </form>

                        </tr>
                        @endforeach --}}


                    </tbody>
                </table>
            </div></div>
                            </div>
                    </div>
                </div>
                </div>
                {{-- Generar lista de las herramientas que seran registradas en el pedido --}}






















                <div class="" style="background-color: transparent;">
                    <div class="container">
                        <div class="form-group">
                            {{-- <a class="btn btn-primary border-light" role="button" href="Registro%20Ordenes.html" style="background-color: #002d47;">Volver</a><a class="btn btn-primary border-light float-right" role="button" href="Registro%20Ordenes.html" style="background-color: #002d47;">Registrar</a> --}}
                        </div>
                        <div
                            class="card">
                            <div class="card-body" style="background-color: #002d47;color: rgb(255,255,255);opacity: 1;">
                                
                                <div class="container">
                                    <div class="row">
                                    <div class="col text-center">
                                        
                                        <h2>Lista de Herramientas</h2>
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
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        @foreach($herramientas as $herramienta)
                        <tr>
                            
                            <td><img src="{{ asset('storage').'/'.$herramienta->imagen}}" class="img-thumbnail img-fliud" alt="" width="100"></td>
                            <td>{{$herramienta->nombre}}</td>  
                                
                            <td>{{$herramienta->descripcion}}</td>        
                            <td>{{$herramienta->categoria}}</td>    


                            <form action="crear-registro-herramientas-agregar" method="post">
                                @csrf
                                <td><button class="btn btn-success" type="submit">Agregar</button></td>    
                            </form>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div></div>
                            </div>
                    </div>
                </div>
                </div>





            </div>{{--  fin column --}}

        </div>

    </div>






   
</body>
</html>