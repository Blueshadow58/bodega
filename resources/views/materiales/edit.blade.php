<form action="{{url('/materiales/'.$material->id)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}

<label for="nombre">{{'Nombre'}}</label>
<input type="text" name="nombre" id="nombre" value="{{$material->nombre}}">

<label for="fecha_ingreso">{{'Fecha Ingreso'}}</label>
<input type="date" name="fecha_ingreso" id="fecha_ingreso" value="{{$material->fecha_ingreso}}">

<input type="submit" value="editar">
<a href="{{url('materiales')}}">Regresar</a>
</form>