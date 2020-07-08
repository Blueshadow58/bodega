
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
   {{-- <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css"> --}}
    <link rel="stylesheet" href="assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    {{-- <link rel="stylesheet" href="assets/css/Login-Form-Clean.css"> --}}
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>



<body style="background-color: #002d47;">
  <header style="background-color: #ffffff;color: rgb(255,255,255);">
       {{-- Llamando la navbar de carpeta --}}
       @include('layouts.navbarMenu')
  </header>

  
  <div class="contact-clean" style="background-color: transparent;background-position: top;">
      <div class="container">
          <div class="row d-flex justify-content-center">
              

              <!-- <a class="btn btn-primary border rounded border-white" role="button" href="Registro%20Ordenes.html" style="background-color: #002d47;">Enviar Lista</a>-->
<form action="pedidoHerramienta.volcar" class="form-inline " method="post" style="padding: 1%;background-color: #c67e06;border: 1px solid;color:white;margin: 2%;border-radius: 5px">
@csrf
<div class="form-group" style="">    
<input type="text" class="form-control" name="asunto" placeholder="Asunto"  style="color:black;border-radius: 5px" />    
</div>
<div class="form-group" style="padding-inline: 10px">
  <input type="date" name="fechaEntrega"  class="from-control" id="">
</div>

<div class="form-group">
 <button name="idUser" value="{{$usuario}}" type="submit" class="btn btn-primary border rounded border-white"  >Generar lista</button>
</div>


</form>












                  {{-- Tabla con todo --}}
                  <div class="table-responsive table-striped">
                    <table class="table" style="color:white">
                        <thead style="background-color: #c67e06;color: #eff1f4;">
                            <tr >
                            
                                <th>imagen</th>
                                <th>nombre</th>
                                <th>categoria</th>              
                                <th>cantidad</th>
                                <th></th>
                                  
                        </thead>
                        <tbody>
                          @foreach($herramientas as $herramienta)
                          <tr id="estado_tr{{$herramienta->id}}">
                            
                            <td>
                            <img src="{{ asset('storage').'/'.$herramienta->imagen}}" class="img-thumbnail img-fliud" alt="" width="100">
                            </td>
                            <td>{{$herramienta->nombre}}</td>  
                            <td>{{$herramienta->categoria}}</td>
                            
                            <form action="pedidoHerramienta.agregar" method="post" style="background-color: #002d47;padding:10px">
                              @csrf
                            <td style="width: 25%"> 
                              @foreach ($stockHerramientas as $stock)
                    {{-- <label for="" style="color:white">{{$stock->stock_total}}</label>     --}}
                            @if ($herramienta->categoria == $stock->categoria)
                                @if ($stock->stock_disponible > 0)
                                  <input type="number" style="width: 30%"  name="cantidad" id="" max="{{$stock->stock_disponible}}" min="1" value="1">
                            </td>
                            <td>
                              <button class="btn-success" style="border: 1px solid;" name="btnCategoria" value="{{$herramienta->categoria}}"  onclick="agregar({{$herramienta->id}})" >Agregar</button>            
                            </td>
                                @else
                                  <input type="number" name="cantidad" id="" max="{{$stock->stock_disponible}}" min="1" value="0" disabled> 
                            </td>
                            <td>
                              <button class="btn-danger" style="border: 1px solid;" name="btnCategoria" value="{{$herramienta->categoria}}"  onclick="agregar({{$herramienta->id}})" disabled>Sin stock</button>              
                            </td>
                                @endif                
                            @endif
                            @endforeach
                              
                  
                          </form>
                          </tr>
                          @endforeach
                           
                        </tbody>
                    </table>
                  </div>
                  {{-- Tabla con todo --}}
                  
                  
















                  
                  
                  <div class="table-responsive table-striped">
                    <!-- Tabla elementos seleccionados -->
  <table class="table  " style="color:white">
      <thead style="background-color: #c67e06;color: #eff1f4;">
          <tr>
              
              <th>imagen</th>
              <th>nombre</th>
              <th>categoria</th>
              <th>cantidad</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
          <tr>

            @foreach($productos as $producto)
            <tr>              
              <td>
              <img src="{{ asset('storage').'/'.$producto->imagen}}" class="img-thumbnail img-fliud" alt="" width="100">
              </td>
              <td>{{$producto->nombre}}</td>
              <td>{{$producto->categoria}}</td>

              @foreach ($tablaTemporal as $tTemporal)
                  
              @if ($producto->categoria == $tTemporal->categoria)
              <td>{{$tTemporal->cantidad}}</td>
              @endif

              @endforeach


              <td>{{$producto->cantidad}}</td>    
              <td>

                <form action="pedidoHerramienta.eliminar" method="post" style="background-color: #002d47;padding:10px">
                  @csrf
                  <button class="btn-danger" style="border: 1px solid;" name="btnCategoria" value="{{$producto->categoria}}"  >Eliminar</button>
                </form>
              </td>            
            </tr>
            @endforeach
          </tr>
      </tbody>
  </table>
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