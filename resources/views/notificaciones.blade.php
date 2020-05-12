<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    BLADE NOTIFICACIONES

    <form method="POST" action="/notificaciones.store">
        @csrf

        <label for="data">Post Title</label>

        <input id="data" name="data" type="text" class="@error('data') is-invalid @enderror">

        <select>
            <option value="">Selecciona el destinatario</option>

            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach

        </select>

        @error('data')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">
        Enviar
           <!-- {{ __('Crear Notificacion') }} -->
        </button>

    </form>


</body>

</html>