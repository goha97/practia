<a href="{{url('productos/create')}}">registrar nevo producto</a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Valor</th>
            <th>Imagen</th>
            <th>Ajustes</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->Nombre }}</td>
                <td>{{ $producto->Marca }}</td>
                <td>{{ $producto->Modelo }}</td>
                <td>{{ $producto->Valor }}</td>
                <td>{{ $producto->Imagen }}
                <img src="{{asset('storage').'/'.$producto->Imagen}}" width="100" alt="">
                </td>
                <td>
                    <a href="{{ url('productos/'.$producto->id.'/edit') }}"> Editar
                    </a> |
                    <form action="{{ url('productos/' .$producto->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{method_field('delete')}}
                        <input type="submit" onclick="return confirm('¿que quieres borrar?')" value="Borrar">
                    </form>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
