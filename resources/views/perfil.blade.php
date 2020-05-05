@extends('layouts.navbar')

@section('contenido')



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
   
    <div class="contact-clean" style="background-color: #ffffff;">
        <div class="row">
            <div class="col-xl-3 offset-xl-5 d-md-flex d-lg-flex mx-auto justify-content-xl-center">
                <ul class="list-group d-md-flex d-lg-flex mb-auto" style="background-color: #ffffff;">
                    <li class="list-group-item" style="background-color: #ffffff;"><span>CrearPerfil</span></li>
                    <li class="list-group-item"><span>List Group Item 2</span></li>
                    <li class="list-group-item"><span>List Group Item 3</span></li>
                </ul>
            </div>
            <div class="col-xl-6 offset-xl-3 m-auto">
                <form class="bg-light border rounded shadow" style="color: #505e6c;background-color: rgba(0,0,0,0.1);">
                    <h2 class="text-center">Contact us</h2>
                    <div class="form-group"><label>Rut</label><input class="form-control" type="text"></div>
                    <div class="form-group"><label>Nombre</label><input class="form-control" type="text"></div>
                    <div class="form-group"><label>Apellido</label><input class="form-control" type="text"></div>
                    <div class="form-group"><label>Telefono</label><input class="form-control" type="text"></div>
                    <div class="form-group"><label>Especialidad</label><input class="form-control" type="text"></div>
                    <div class="form-group"><button class="btn btn-primary d-xl-flex mx-auto" type="submit">Crear&nbsp;</button></div>
                </form>
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
@endsection