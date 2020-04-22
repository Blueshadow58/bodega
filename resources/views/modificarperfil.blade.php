@extends('plantilla')


@section('seccion')

<br>
<div class="container">
<div class="row">
<div class="col-sm-4">
<br>
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
Perfil  </a>
  <a href="#" class="list-group-item list-group-item-action">Modificar Perfil</a>
</div>
</div>

<div class="col-sm-8">  
<br>
<div class="border container">
<br>
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Rut</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nombre</label>
    <input type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Apellido</label>
    <input type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Telefono</label>
    <input type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Correo</label>
    <input type="email" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Especialidad</label>
    <input type="text" class="form-control" id="exampleInputPassword1">
  </div>

</form>
<br>
</div><br><br>


</div>

</div>

</div>
   
@endsection