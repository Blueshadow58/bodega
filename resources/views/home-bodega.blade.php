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
        <div class="container">
            <div class="row">
                <div class="col">
                    <form class="border rounded border-white" method="post" style="background-color: #c67e06;">
                        <h2 class="text-center" style="color: rgb(255,255,255);padding: 15px;">Filtrar</h2>
                        <div class="form-group"><input class="border rounded form-control" type="text" name="name" placeholder="Buscar" style="background-color: #002d47;color: #ffffff;border-color: #002d47!important;"></div>
                        <div class="form-group">
                            <div class="dropdown"><button class="btn btn-primary btn-block dropdown-toggle border-white" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: #002d47;">Tipo</button>
                                <div class="dropdown-menu" role="menu" style="background-color: #002d47;color: rgb(255,255,255);"><a class="dropdown-item" role="presentation" href="#" style="background-color: #002d47;color: rgb(255,255,255);">Herramientas</a><a class="dropdown-item" role="presentation" href="#" style="background-color: #002d47;color: rgb(255,255,255);">Materiales</a></div>
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary btn-block border-white" type="button" style="background-color: #002d47;">Buscar</button></div>
                    </form>
                </div>
                <div class="col"><div class="table-responsive table-striped">
    <table class="table" style="color:#ffffff">
        <thead style="background-color: #c67e06;color: #ffffff;">
            <tr>
                <th><strong>Nombre</strong></th>
                <th>Tipo</th>
                <th>Estado</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Taladro GBM 13 RE 750 W Bosch</td>
                <td>Taladros eléctricos</td>
                <td>Nuevo, sin detalles</td>                
            </tr>
            <tr>
                <td>Sierra circular eléctrica 9&quot; 2200 W</td>
                <td>Sierra Circular</td>
                <td>Usada, rotura del material protector e...</td>                
            </tr>
        </tbody>
    </table>
</div></div>
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