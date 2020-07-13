

<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
<link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
<link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
<link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
<link rel="stylesheet" href="assets/css/Data-Table-1.css">
<link rel="stylesheet" href="assets/css/Data-Table.css">
<link rel="stylesheet" href="assets/css/Footer-Basic.css">
<link rel="stylesheet" href="assets/css/Footer-Clean.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
<link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
<link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
<link rel="stylesheet" href="assets/css/styles.css">
<div class="form-group">
<label for="imagen" class="control-label">{{'imagen'}}</label>
@if(isset($herramienta->imagen))
<img class="img-thumbnail img-fliud" src="{{ asset('storage').'/'.$herramienta->imagen}}" alt="" width="100">
@endif
<input type="file" class="form-control" name="imagen" id="imagen" value="">
</div>

<div class="form-group">
<label for="descripcion" class="control-label">{{'descripcion'}}</label>
<input type="text" class="form-control" name="descripcion" id="descripcion" 
value="{{ isset($herramienta->descripcion)?$herramienta->descripcion:old('descripcion')}}">
</div>

<div class="form-group">
<label for="nombre" class="control-label">{{'nombre'}}</label>
<input type="text" class="form-control" name="nombre" id="nombre" 
value="{{ isset($herramienta->nombre)?$herramienta->nombre:old('nombre')}}">
</div>

<div class="form-group">
<label for="categoria" class="control-label" >{{'categoria'}}</label>
<input type="text" class="form-control" name="categoria" id="categoria"
value="{{ isset($herramienta->categoria)?$herramienta->categoria:old('categoria')}}"> 
</div>

<input type="submit" class="btn btn-success" value="{{$Modo=='crear'?'Agregar':'Modificar '}}
">
<a class="btn btn-primary" href="{{url('herramientas')}}">Regresar</a>
