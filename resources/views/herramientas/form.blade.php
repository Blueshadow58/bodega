

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
<label for="stock" class="control-label" >{{'stock'}}</label>
<input type="text" class="form-control" name="stock" id="stock"
value="{{ isset($herramienta->stock)?$herramienta->stock:old('stock')}}"> 
</div>

<input type="submit" class="btn btn-success" value="{{$Modo=='crear'?'Agregar':'Modificar '}}
">
<a class="btn btn-primary" href="{{url('herramientas')}}">Regresar</a>
