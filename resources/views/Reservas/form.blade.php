<div class="form group">

    <label for="Rut"> Nombre</label>
    <input type=" text" class="form-control" name="Rut" value="{{isset($reservas->Rut)?$reservas->Rut:old('Rut')}}" id="Rut">

    </div>
    <div class="form group">
    <label for="Nombre"> Marca</label>
    <input type=" text" class="form-control" name="Nombre" value="{{isset($reservas->Nombre)?$reservas->Nombre:old('Nombre')}}" id="Nombre">

    </div>
    <div class="form group">
    <label for="Apellido"> Apellido</label>
    <input type=" text" class="form-control" name="Apellido" value="{{isset($reservas->Apellido)?$reservas->Apellido:old('Apellido')}}" id="Apellido">

    </div>
    <div class="form group">
    <label for="productos">Productos</label>





    <select>

    </select>
    </div>

    <input type="submit" class="btn btn-success" value="{{$modo}} datos">
    <a href="{{url('productos/')}}" class="btn btn-primary">volver</a>
