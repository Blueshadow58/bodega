
<form action="{{url('/materiales')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
<label for="nombre">{{'Nombre'}}</label>
<input type="text" name="nombre" id="nombre" value="">

<label for="fecha_ingreso">{{'Fecha Ingreso'}}</label>
<input type="date" name="fecha_ingreso" id="fecha_ingreso" value="">

<input type="submit" value="agregar">
<a href="{{url('materiales')}}">Regresar</a>

</form>