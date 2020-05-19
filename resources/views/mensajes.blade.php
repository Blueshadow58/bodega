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

        <select name="destinatarioId" >
            <option value="">Selecciona el destinatario</option>

            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach

        </select>

       

        <button type="submit" class="btn btn-primary">
        Enviar           
        </button>



        <select name="" >
            <option value="">Selecciona el destinatario</option>

        @foreach ($messages as $message)
            <option value="{{$message->data}}">{{($message->data)}}</option>
        @endforeach
        </select>

        


    </form>


    



</body>

</html>