<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cambiar-registro-herramientas-pedido</title>
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
            <div class="row justify-content-md-center">


                {{-- column-------------------------------------------------------------------------------------------------- --}}
                <div class="col-4 ">


                    {{-- Generar lista de las herramientas que seran registradas en el pedido --}}

                    <div class="" style="background-color: transparent;">
                        <div class="">
                            <div class="form-group">





                            </div>
                            <div class="card">
                                <div class="card-body"
                                    style="background-color: #002d47;color: rgb(255,255,255);opacity: 1;">

                                    <div class="container">
                                        <div class="row">
                                            <div class="col text-center">

                                                <h2>Herramienta </h2>
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
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>



                                                    @foreach($herramienta as $herra)
                                                    <tr>

                                                        <td><img src="{{ asset('storage').'/'.$herra->imagen}}"
                                                                class="img-thumbnail img-fliud" alt="" width="100"></td>
                                                        <td>{{$herra->nombre}}</td>

                                                        <td>{{$herra->descripcion}}</td>
                                                        <td>{{$herra->categoria}}</td>





                                                        {{-- Espacio codigo para el modal---------------------------------------------------------- --}}




                                                        {{-- Espacio codigo para el modal----------------------------------------------------------  --}}
                                                    </tr>
                                                    @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Generar lista de las herramientas que seran registradas en el pedido --}}





                </div>

                {{-- col---------------------------------------------------------------------------------------------------------- --}}




















                {{-- TABLA HERRAMIENTAS---------------------------------------------------------------------- --}}
                <div class="col-6 ">




                    <div class="" style="background-color: transparent;">
                        <div class="">
                            <div class="card">
                                <div class="card-body"
                                    style="background-color: #002d47;color: rgb(255,255,255);opacity: 1;">

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
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($herramientasFiltradas as $herraFilt)
                                                    <tr>

                                                        <td><img src="{{ asset('storage').'/'.$herraFilt->imagen}}"
                                                                class="img-thumbnail img-fliud" alt="" width="100"></td>
                                                        <td>{{$herraFilt->nombre}}</td>

                                                        <td>{{$herraFilt->descripcion}}</td>
                                                        <td>{{$herraFilt->categoria}}</td>

                                                        

                                                        <form action="crear-registro-herramientas-cambiarHerramienta"
                                                            method="post">
                                                            @csrf

                                                           
                                                           
                                                        
                                                            <td><button class="btn btn-success" name="idHerramienta"
                                                                value="{{$herraFilt->id}}"
                                                                type="submit" >Seleccionar</button></td>
                                                        




                                                        </form>


                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>





                </div>{{--  fin column --}}

            </div>

        </div>




        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/smart-forms.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

</body>

</html>