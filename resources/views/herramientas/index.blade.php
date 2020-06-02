@extends('layouts.navbar')

@section('contenido')
<br>
<div class="container">

@if(Session::has('Mensaje'))
<div class="alert alert-success"role="alert">
{{Session::get('Mensaje')}}
</div>


@endif

<a href="{{url('herramientas/create')}}" class="btn btn-success">Agregar Herramienta</a>
<br>
<br>
<table class="table table-light table-hover">
<thead class="thead-light">
  <tr>
    <th>#</th>
    <th>imagen</th>
    <th>descripcion</th>
    <th>nombre</th>
    <th>categoria</th>
    <th>accion</th>
  </tr>
  </thead>

  <tbody>
  @foreach($herramientas as $herramienta)
  <tr>
    <td>{{$loop->iteration}}</td>
    <td>
    <img src="{{ asset('storage').'/'.$herramienta->imagen}}" class="img-thumbnail img-fliud" alt="" width="100">
    </td>
    <td>{{$herramienta->descripcion}}</td>
    <td>{{$herramienta->nombre}}</td>
    <td>{{$herramienta->categoria}}</td>
    <td>

    <a class="btn btn-warning" href="{{url('/herramientas/'.$herramienta->id.'/edit')}}">
    Editar
    </a>
    
    <form method="post" action="{{url('/herramientas/'.$herramienta->id)}}" style="display:inline">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
    </td>
  </tr>
  @endforeach
  </tbody>

</table>
{{$herramientas->links()}}
</div>
@endsection