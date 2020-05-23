<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    

</head>
<body>
    

    
    <br>
    <br>
    <table class="table table-light table-hover">
    <thead class="thead-light">
      <tr>
        <th>#</th>
        <th>imagen</th>
        <th>descripcion</th>
        <th>nombre</th>
      
        <th>accion</th>
      </tr>
      </thead>
    
      <tbody>
      @foreach($herramientas as $herramienta)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>
        <img src="{{ asset('storage').'/'.$herramienta->imagen}}" class="img-thumbnail img-fliud" alt="" width="100">
        </td>
        <td>{{$herramienta->descripcion}}</td>
        <td>{{$herramienta->nombre}}</td>
    
        <td>

        <form method="post" action="pedidoHerramienta.agregar/{{$herramienta->id}}">
         @csrf
        <button class="btn btn-danger" type="submit">Agregar</button>

    </form>
        </td>
      </tr>
      @endforeach
      </tbody>
    
    </table>
    {{$herramientas->links()}}
    </div>
    
<button type="buton" id="getRequest">getRequest</button>

<div id="getRequestData"></div>

<!-- Script probando ajax-->
<!-- trayento ajax de asset en public-->
<script type="text/javascript" src="{{ asset('js/app.js') }}" ></script>

<script type="text/javascript" >
    $(document).ready(function(){
        $('#getRequest').click(function(){
            $.get('getRequest',function(data){
                $.get('#getRequestData').append(data);
                console.log(data);

            });
        });
    });
</script>

</body>
</html>