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