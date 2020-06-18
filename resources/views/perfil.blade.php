<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
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
        <div class="row no-gutters">
            <div class="col-xl-2 offset-xl-5 d-md-flex d-lg-flex mx-auto justify-content-xl-center">
                <ul class="list-group border rounded border-white d-md-flex d-lg-flex mb-auto" style="background-color: #ffffff;">
                    <li class="list-group-item border-white" style="background-color: #c67e06;color: #eff1f4;"><span>Perfil</span></li>
                    <li class="list-group-item" style="background-color: #002d47;"><span style="color: rgb(255,255,255);">Modificar Perfil</span></li>
                </ul>
            </div>
            <div class="col-xl-5 offset-xl-1 m-auto">
                <form class="bg-light border rounded shadow" style="background-color: #c67e06!important;">
                    <h2 class="text-center" style="padding-top: 20px;color: rgb(255,255,255);">Perfil</h2>
                    <div class="form-group"><input class="border rounded form-control" type="text" placeholder="Rut" style="background-color: #002d47;color: rgb(255,255,255);border-color: #002d47!important;"></div>
                    <div class="form-group"><input class="border rounded form-control" type="text" placeholder="Nombre" style="background-color: #002d47;color: rgb(255,255,255);border-color: #002d47!important;"></div>
                    <div class="form-group"><input class="border rounded form-control" type="text" placeholder="Apellido" style="background-color: #002d47;color: rgb(255,255,255);border-color: #002d47!important;"></div>
                    <div class="form-group"><input class="border rounded form-control" type="text" placeholder="Telefono" style="background-color: #002d47;color: rgb(255,255,255);border-color: #002d47!important;"></div>
                    
                    <div class="form-group"><button class="btn btn-primary border-white d-xl-flex mx-auto" type="submit" style="background-color: #002d47;">Modificar&nbsp;</button></div>
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