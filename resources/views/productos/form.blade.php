@extends('layouts.app')

@section('content')
<div class="container">

<h2>{{$modo}} producto</h2>
@if (count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
 @foreach($errors->all() as $error)
    <li>{{$error}}</li>
 @endforeach
@endif
    </ul>
</div>
<div class="form group">

<label for="Nombre"> Nombre</label>
<input type=" text" class="form-control" name="Nombre" value="{{isset($productos->Nombre)?$productos->Nombre:old('Nombre')}}" id="Nombre">

</div>
<div class="form group">
<label for="Marca"> Marca</label>
<input type=" text" class="form-control" name="Marca" value="{{isset($productos->Marca)?$productos->Marca:old('Marca')}}" id="Marca">

</div>
<div class="form group">
<label for="Modelo"> Modelo</label>
<input type=" text" class="form-control" name="Modelo" value="{{isset($productos->Modelo)?$productos->Modelo:old('Modelo')}}" id="Modelo">

</div>
<div class="form group">
<label for="Valor"> Valor</label>
<input type=" text"class="form-control" name="Valor" value="{{isset($productos->Valor)?$productos->Valor:old('Valor')}}" id="Valor">

<div class="form group">
<label for="Imagen"> </label>
@if (isset($productos->Imagen))
<img src="{{asset('storage').'/'.$productos->Imagen}}"  width="100" alt="">
@endif


<input type="file" class=""  name="Imagen" value="" id="Imagen">
</div>

<input type="submit" class="btn btn-success" value="{{$modo}} datos">
<a href="{{url('productos/')}}" class="btn btn-primary">volver</a>
</div>
@endsection

