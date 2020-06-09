@extends('layouts.navbar')

@section('contenido')
<br>
<div class="container" style="color: white">

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif

<form action="{{url('/herramientas')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
{{csrf_field()}}
@include('herramientas.form',['Modo'=>'crear'])

</form>

</div>
@endsection