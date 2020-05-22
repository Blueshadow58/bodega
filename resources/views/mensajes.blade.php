<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    BLADE Mensajes

    <form method="POST" action="mensajes.store">
        @csrf

        <label for="texto">Texto</label>

        <input name="mensaje" type="text" placeholder="Mensaje">

        <select name="destinatario_id" >
            <option value="">Selecciona el destinatario</option>

            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach

        </select>

       

        <button type="submit" class="btn btn-primary">
        Enviar           
        </button>



    </form>




        @foreach ($mensajes as $mensaje)
        <table>
            <thead>
<tr>
                <th>                    
                    nada
                </th>
            </tr>
            </thead>

            <tbody>
                <tr>
                <td><label for="">{{$mensaje->contenido_mensaje}}</label></td>
                <tr>
                <tr>
                <td>

                    <form action="mensajes.leer/{{$mensaje->id}}" method="post">  
                        @csrf                                      
                        <button type="submit" >Leido</button>
                    </form>

                </td>
                <tr>
            </tbody>

        </table>

<label for="">{{


$mensajes->count()

}}</label>

        @endforeach





</body>

</html>