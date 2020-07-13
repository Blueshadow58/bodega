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
    <header>
        {{-- Llamando la navbar de carpeta --}}
        @include('layouts.navbarMenu')
    </header>


    <div class="contact-clean" style="background-color: transparent;">

        @if ($pedidos->isEmpty())
        <div class="container text-center mt-5 pt-5">

            <h3 class="text-white">No existen nuevos pedidos que deban registrarse</h3>


        </div>

        @else


        <div class="container">
            <div class="table-responsive">
                <table class="table table-striped" style="color:#ffffff;">
                    <thead style="background-color:#c67e06;">
                        <tr>
                            <th>Fecha de envio</th>
                            <th>Nombre</th>
                            <th>Asunto</th>
                            <th>Estado</th>
                            {{-- <th><a href="{{route('descargarPDF')}}" class="btn btn-primary">Imprimir PDF</a></th>
                            --}}
                            {{-- <th><button type="button" onclick="window.location='{{ url('descargarPDF') }}'">Button</button>
                            </th> --}}
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                        <tr style="background-color: #366b36">
                            <td style="vertical-align: middle">{{$pedido->created_at}}</td>
                            {{-- Nombre del usuario de la solicitud   --}}
                            @foreach($usuarios as $usuario)
                            @if ($pedido->id_usuario == $usuario->id)
                            <td style="vertical-align: middle">{{$usuario->name}}</td>
                            @else
                            @endif
                            @endforeach
                            <td style="vertical-align: middle">{{$pedido->asunto}}</td>
                            <td style="vertical-align: middle">{{$pedido->estado_pedido}}</td>
                            <td>
                                {{-- registrar herramientas pedido crear  --}}
                                <form action="rh-pedido-crear" class="text-center" method="post"
                                    style="background-color:transparent;padding:0px!important; box-shadow: none">
                                    @csrf
                                    <button class="btn btn-primary " style="border: 1px solid;border-radius: 5px;"
                                        name="btnPedidoId" value="{{$pedido->id}}"> Editar Pedido</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>{{-- container --}}





        @endif













    </div> {{--  contact clean container --}}




    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

</body>

</html>