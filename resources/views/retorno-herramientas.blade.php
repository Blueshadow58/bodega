<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>Document</title>
</head>

<body style="background-color: #002d47;">
    <header style="background-color: #ffffff;color: rgb(255,255,255);">
        {{-- Llamando la navbar de carpeta --}}
        @include('layouts.navbarMenu')
    </header>

    <div class="contact-clean mt-5" style="background-color: transparent;">

        <div class="container text-white">
            <div class="row">

                <div class="col text-center">


                    {{-- Formulario --}}
                    <form method="POST" action="actualizar-estado-retorno" style="background-color: transparent" class="text-white">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="font-weight-bold" >Codigo identificador</label>
                            <input type="text" name="idHerramienta" class="form-control text-center font-weight-bold" style="color: black;font-size: 24px;letter-spacing: 2px" placeholder="Codigo" />
                                                        
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Estado</button>
                    </form>
                    {{-- fin formulario --}}


                </div>
                <div class="col text-center">
                    @if ($herramientas->isEmpty())
                        <h4>No se han encontrado registros</h4>
                    @else

                        {{-- Tabla con las herramientas con el estado de finalizado --}}


                        <div class="table-responsive table-striped">
                            <!-- Tabla elementos seleccionados -->
                            <table class="table  " style="color:white">
                              <thead style="background-color: #c67e06;color: #eff1f4;">
                                <tr>
                
                                  <th>Imagen</th>
                                  <th>Descipcion</th>
                                  <th>Nombre</th>
                                  <th>Categoria</th>
                                  <th>Estado</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                
                                  @foreach($herramientas as $h)
                                <tr>
                                  <td>
                                    <img src="{{ asset('storage').'/'.$h->imagen}}" class="img-thumbnail img-fliud" alt=""
                                      width="100">
                                  </td>
                
                                  <td>{{$h->descripcion}}</td>
                                  <td>{{$h->nombre}}</td>
                                  <td>{{$h->categoria}}</td>
                                  <td>{{$h->estado}}</td>
                                               
                                </tr>
                                @endforeach
                                </tr>
                              </tbody>
                            </table>
                          </div>
                



                        {{-- Fin tabla --}}
                    @endif
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