holi

<a href="{{url('materiales/create')}}">Agregar Empleado</a>
<table class="table table-light">
<thead class="thead-light">
<tr>
<th>#</th>
<th>Nombre</th>
<th>Fecha Ingreso</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
@foreach($materiales as $material)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$material->nombre}}</td>
<td>{{$material->fecha_ingreso}}</td>
<td>

<a href="{{url('/materiales/'.$material->id.'/edit')}}">
Editar
</a>
<form method="post" action="{{url('/materiales/'.$material->id)}}">
{{csrf_field()}}
{{method_field('DELETE')}}
<button type="submit" onclick="return confirm('Borrar?');">Borrar</button>
</form>

</td>
</tr>
@endforeach
</tbody>
</table>