
<nav class="navbar navbar-light navbar-expand-md navigation-clean-button" style="background-color: #c67e06;color: rgb(255,255,255);">
    <div class="container"><a class="navbar-brand" href="#">Nombre</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="background-color: #ffffff;"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div
            class="collapse navbar-collapse" id="navcol-1" style="color: rgb(255,255,255);">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" href="home-bodega" style="color: #ffffff;">Home</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="perfil" style="color: #ffffff;">Perfil</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="mensajes" style="color: #ffffff;">Mensajes</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="pedidoHerramienta" style="color: #ffffff;">Generar pedido</a></li>
                {{-- Solo permirile esta ruta al que tenga el permiso bodeguero --}}
                @can('bodeguero')
                <li class="nav-item" role="presentation"><a class="nav-link" href="registro-ordenes" style="color: #ffffff;">Registro de ordenes</a></li>
                @endcan
            
            
            
                
            </ul>
            
                <span class="nav-item " role="presentation"><a class="nav-link"  style="color: #ffffff;">Bienvenido: <span class="font-weight-bold">{{Auth::user()->name}}</span></a></span>
            
            <span class="navbar-text actions"> </span></div>
    </div>
</nav>    
