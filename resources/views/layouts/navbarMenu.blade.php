<nav class="navbar navbar-light navbar-expand-md navigation-clean-button"
    style="background-color: @can('bodeguero') #343a40 @else() #c67e06 @endcan ;color: rgb(255,255,255);">
    <div class="container"><a class="navbar-brand" href="#">Adout</a><button data-toggle="collapse"
            class="navbar-toggler" data-target="#navcol-1" style="background-color: #ffffff;"><span
                class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1" style="color: rgb(255,255,255);">
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
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white font-weight-bold" href="#"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <span>Bienvenido: </span> {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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