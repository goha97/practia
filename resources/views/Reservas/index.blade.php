@extends('layouts.app')

@section('content')
<div class="container">

@if (Session::has('mensaje'))
{{Session::get('mensaje')}}

@endif

<a href="{{url('Reservas/create')}}" class="btn btn-primary">registrar nueva reserva</a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Rut</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Producto</th>
            <th>Ajustes</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($reservas as $reserva)
            <tr>
                <td>{{ $reserva->id }}</td>
                <td>{{ $reserva->Nombre }}</td>
                <td>{{ $reserva->Marca }}</td>
                <td>{{ $reserva->Apellido }}</td>

                <td>

                </td>
                <td>
                    <a href="{{ url('Reservas/'.$reserva->id.'/edit') }}" class="btn btn-warning"> Editar
                    </a>
                    <br>
                    <form action="{{ url('Reservas/' .$reserva->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{method_field('delete')}}
                        <input type="submit" onclick="return confirm('¿que quieres borrar?')" value="Borrar" class="btn btn-danger">
                    </form>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
