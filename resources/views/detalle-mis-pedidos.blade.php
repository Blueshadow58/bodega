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









    <div class="contact-clean" style="background-color: transparent;">
        <div class="container">
            <div class="form-group">
                {{-- <a class="btn btn-primary border-light" role="button" href="Registro%20Ordenes.html" style="background-color: #002d47;">Volver</a><a class="btn btn-primary border-light float-right" role="button" href="Registro%20Ordenes.html" style="background-color: #002d47;">Registrar</a> --}}
            </div>
            <div class="card">
                <div class="card-body" style="background-color: #002d47;color: rgb(255,255,255);opacity: 1;">

                    <div class="container">
                        <div class="row">
                            <div class="col ">

                                @foreach($pedido as $p)
                                <h4 class="card-title">Asunto: {{$p->asunto}}</h4>
                                <div class="form-group"><span>Fecha entrega: {{$p->fecha_entrega}}</span></div>                                                                
                                <div class="form-group"><span>Nombre: {{Auth::user()->name}}</span></div>                                                                
                                @endforeach
                            </div>
                            {{-- <div class="col text-right">
                                 <a href="{{url('descargarDetallePDF')}}" style="border: 1px solid;" class="btn
                                btn-success">Imprimir PDF</a>


                                <form action="detallePDF" method="post"
                                    style="background-color: transparent;padding:10px">
                                    @csrf

                                    <button class="btn btn-success bg-success" style="border: 1px solid;"
                                        name="idPedido" value="{{$pedido->id}}">Generar PDF</button>

                                </form>

                            </div> --}}
                        </div>
                    </div>

                    {{-- Tabla con el pedido --}}
                    <div class="table-responsive table-striped">
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
              <img src="{{ asset('storage').'/'.$producto->imagen}}" class="img-thumbnail img-fliud" alt=""
                                    width="100">
                                    </td> --}}

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- Fin tabla con el pedido --}}





                    {{-- Tabla con las herramientas que han sido asignadas a ese pedido --}}



                    <div class="table-responsive table-striped">
                        <table class="table" style="color: #eff1f4">
                            <thead style="background-color: #c67e06;">
                                <tr>
                                    <th>Imagen</th>
                                    <th>Descripcion</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($herramientas as $herramienta)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage').'/'.$herramienta->imagen}}"
                                            class="img-thumbnail img-fliud" alt="" width="100">
                                    </td>
                                    <td>{{$herramienta->descripcion}}</td>
                                    <td>{{$herramienta->nombre}}</td>
                                    <td>{{$herramienta->categoria}}</td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    {{-- Fin tabla con las herramientas que han sido asignadas a ese pedido --}}




                </div>
            </div>
        </div>
    </div>



</body>
</html>