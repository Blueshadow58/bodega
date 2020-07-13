

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


<header >
       
<nav class="navbar navbar-light navbar-expand-md navigation-clean-button" style="background-color: @can('bodeguero') #343a40 @else() #c67e06 @endcan ;color: rgb(255,255,255);">
    <div class="container"><a class="navbar-brand" href="#">Adout</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="background-color: #ffffff;"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div
            class="collapse navbar-collapse" id="navcol-1" style="color: rgb(255,255,255);">
            <ul class="nav navbar-nav mr-auto">
                

                {{-- Solo permirile esta ruta al que tenga el permiso bodeguero --}}
                @can('bodeguero')
                <li class="nav-item" role="presentation"><a class="nav-link" href="home-bodega"
                        style="color: #ffffff;">Inicio</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="registro-ordenes"
                        style="color: #ffffff;">Ver pedidos</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="registrar-herramientas-pedido"
                        style="color: #ffffff;">Registrar Pedidos</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="herramientas"
                        style="color: #ffffff;">Herramientas</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="barcode"
                        style="color: #ffffff;">Codigos de barra</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="retorno-herramientas"
                        style="color: #ffffff;">Retorno herramienta</a></li>
                @endcan

                @cannot('bodeguero')
                <li class="nav-item" role="presentation"><a class="nav-link" href="pedidoHerramienta"
                        style="color: #ffffff;">Generar pedido</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="mis-pedidos"
                        style="color: #ffffff;">Mis pedidos</a></li>
                @endcannot


                <li class="nav-item" role="presentation"><a class="nav-link" href="perfil"
                        style="color: #ffffff;">Perfil</a></li>


                {{-- Mensajes --}}


                <li class="nav-item" role="presentation"><a class="nav-link" href="mensajes"
                        style="color: #ffffff;">Mensajes <span
                            class="badge badge-danger">@include('layouts.unReadMesseges')</span></a></li>
                {{-- Mensajes --}}


            
            </ul>
            
            <span class="nav-item dropdown ">
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                   <span>Bienvenido: </span>  {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Cerrar sesion') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </span>
            
                

            <span class="navbar-text actions"> </span>
        </div>
    </div>
</nav>    

    </header>

<body style="background-color: #002d47">

    <div class="container">
        @yield('contenido')
    </div>
    
</body>

</html>