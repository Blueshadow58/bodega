

<html>

<head>
    <title>App Name - @yield('title')</title>
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>


<header style="background-color: #ffffff;color: rgb(255,255,255);">
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button" style="background-color: #055ada;color: rgb(255,255,255);">
            <div class="container"><a class="navbar-brand" href="#">Nombre</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="background-color: #ffffff;"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1" style="color: rgb(255,255,255);">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="#" style="color: #ffffff;">Home</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color: #ffffff;">Perfil</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color: #ffffff;">Notificaciones</a></li>
                        @can('confirmar-pedido')
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color: #ffffff;">Registro de ordenes</a></li>
                        @endcan

                        
                    </ul><span class="navbar-text actions"> </span></div>
            </div>
        </nav>
    </header>

<body>

    <div class="container">
        @yield('contenido')
    </div>
</body>

</html>