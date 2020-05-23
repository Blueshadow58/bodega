<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Pedido</h1>

    
    <form action="pedido.store" method="post">
         {{ csrf_field() }}


<input type="date" name="fecha_entrega" id="">

<input type="date" name="fecha_devolucion" id="">

<input type="text" name="estado">


<!-- ID sacada desde el controlador-->
<!--<input type="text" name="id_usuario">-->


@can('confirmar-pedido')
<select name="id_usuario" value="" required>
    <option value="">Selecciona Empleado</option>
    @foreach ($users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
</select>
@endcan

<!--<input type="hidden" name="Auth::user()->id">-->


    <button type="submit">Confirmar</button>


</form>



</body>
</html>