@extends('layouts.app')
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

</head>
<body>
    

         
     


{{-- 
    <script> 
    //por defecto
    $(document).ready(function(){

      // for (var i = 0; i < 9; i++) {
      //   $('#estado_tr2'+i).hide();
      // }
        
    });

    let lista = [];
    
    function agregar($id){
        $('#estado_tr'+$id).toggle();

        // var html = $('#estado_tr'+$id);
        // $('#mostrar').get(html);

        $('#estado_tr2'+$id).toggle();
          lista.push($id);

        $('#label').text(lista);

    }

    function eliminar($id){
        $('#estado_tr'+$id).toggle();

        // var html = $('#estado_tr'+$id);
        // $('#mostrar').get(html);

        $('#estado_tr2'+$id).toggle();
          lista.pop($id);          
        $('#label').text(lista);

        
    }
    </script>




<label for="" id="label">000</label> --}}

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
{{-- 
        <form method="post" action="pedidoHerramienta.agregar/{{$herramienta->id}}">
         @csrf
        <button class="btn btn-danger" type="submit">Agregar</button>
        </form> --}}        
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




</body>
</html>