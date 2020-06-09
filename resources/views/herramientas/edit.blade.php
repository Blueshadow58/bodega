@extends('layouts.navbar')

@section('contenido')
<br>
<div class="container" style="color: white">

<form action="{{url('/herramientas/'.$herramienta->id)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}
@include('herramientas.form',['Modo'=>'editar'])

</form>

</div>
@endsection