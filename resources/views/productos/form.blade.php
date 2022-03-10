formuario que tendra datos en comun coon create y edit
<br>
<label for="Nombre"> Nombre</label>
<input type=" text" name="Nombre" value="{{isset($productos->Nombre)?$productos->Nombre:''}}" id="Nombre">
<br>
<label for="Marca"> Marca</label>
<input type=" text" name="Marca" value="{{isset($productos->Marca)?$productos->Marca:''}}" id="Marca">
<br>
<label for="Modelo"> Modelo</label>
<input type=" text" name="Modelo" value="{{isset($productos->Modelo)?$productos->Modelo:''}}" id="Modelo">
<br>
<label for="Valor"> Valor</label>
<input type=" text" name="Valor" value="{{isset($productos->Valor)?$productos->Valor:''}}" id="Valor">
<br>
<label for="Imagen"> Imagen</label>
@if (isset($productos->Imagen))
<img src="{{asset('storage').'/'.$productos->Imagen}}" width="100" alt="">
@endif


<input type="file" name="Imagen" value="" id="Imagen">
<br>
<input type="submit" value="Guardar datos">
<a href="{{url('productos/')}}">volver</a>
